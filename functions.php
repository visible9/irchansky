<?php
function add_theme_styles()
{
	include(locate_template('theme-styles.php'));
}
add_action('wp_head', 'add_theme_styles');

include(locate_template('shortcodes.php'));


/**
 * Carbon Fields - powers the editable fields of each section.
 * Installed with composer, so the library lives in the theme itself.
 */
function boot_carbon_fields()
{
	if (!file_exists(get_template_directory() . '/vendor/autoload.php')) {
		return;
	}
	require_once get_template_directory() . '/vendor/autoload.php';
	\Carbon_Fields\Carbon_Fields::boot();
}
add_action('after_setup_theme', 'boot_carbon_fields');

function register_theme_fields()
{
	include(locate_template('includes/fields.php'));
}
add_action('carbon_fields_register_fields', 'register_theme_fields');

/**
 * Reads a section field. Keeps the templates flat.
 *
 * Demo mode: while a section has no content at all the defaults are printed, so a
 * fresh install never looks empty. The moment any field of that same section is
 * filled the section goes live and an empty field renders as empty, which is how
 * the client hides an element - clear the text and it disappears.
 * Without Carbon Fields the theme always falls back to the defaults.
 *
 * $post_id lets a template read a field from a page other than the one being
 * rendered - the footer's social icons read from the front page this way, since
 * they mirror what home_social shows rather than carrying their own copy.
 */
function section_field($name, $default = '', $post_id = 0)
{
	if (!function_exists('carbon_get_post_meta')) {
		return $default;
	}
	$post_id = $post_id ?: get_the_ID();
	$value = carbon_get_post_meta($post_id, $name);
	if ($value !== '' && $value !== null && $value !== array()) {
		return $value;
	}
	return section_has_content($name, $post_id) ? $value : $default;
}

/**
 * The colours the client is allowed to change, mapped to the :root variables in
 * theme-styles.php. Deliberately partial: --color-bg and --color-inverse stay in
 * code, because a dark page background needs the whole palette rethought rather
 * than one value swapped.
 */
function theme_palette()
{
	return array(
		'color_1' => array('variable' => '--color-1', 'default' => '#16170f', 'label' => 'Text and dark sections', 'description' => 'Body text, the dark footer and the dark panels.'),
		'color_2' => array('variable' => '--color-2', 'default' => '#d0f828', 'label' => 'Accent', 'description' => 'Links, hover states and buttons. Dark ink text sits on this colour, so keep it light enough to read against.'),
		'color_3' => array('variable' => '--color-3', 'default' => '#5c5e51', 'label' => 'Muted text', 'description' => 'Intro paragraphs, captions and labels.'),
		'color_surface' => array('variable' => '--color-surface', 'default' => '#ebebe4', 'label' => 'Light section background', 'description' => 'The tinted bands between white sections.'),
		'color_border' => array('variable' => '--color-border', 'default' => '#d6d6d2', 'label' => 'Hairlines', 'description' => 'Field outlines and the thin dividers.'),
	);
}

/**
 * Colour pickers under Appearance > Customize > Colours.
 */
function register_theme_colors($wp_customize)
{
	$wp_customize->add_section('theme_colors', array(
		'title' => 'Colours',
		'priority' => 25,
		'description' => 'The palette the whole site is built from. Every section reuses these, so a change here reaches the entire page.',
	));

	foreach (theme_palette() as $name => $color) {
		$wp_customize->add_setting($name, array(
			'default' => $color['default'],
			'sanitize_callback' => 'sanitize_hex_color',
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $name, array(
			'label' => $color['label'],
			'description' => $color['description'],
			'section' => 'theme_colors',
		)));
	}
}
add_action('customize_register', 'register_theme_colors');

/**
 * A second :root block holding only the colours the client actually changed.
 * Printed at the end of theme-styles.php, so it wins on source order without
 * touching the palette the theme ships with.
 */
function palette_overrides()
{
	$rules = '';
	foreach (theme_palette() as $name => $color) {
		$value = get_theme_mod($name);
		if (!$value || $value === $color['default']) {
			continue;
		}
		$rules .= $color['variable'] . ': ' . $value . '; ';
	}
	return $rules ? ':root{' . trim($rules) . '}' : '';
}

/**
 * Renders a form the client pasted into a section as a shortcode.
 * The theme ships no form of its own - any form plugin will do - so this only
 * expands whatever tag is in the field. If the plugin is gone do_shortcode()
 * hands the tag straight back, and printing a raw [tag] on the page would be
 * worse than printing nothing.
 */
function section_form($name)
{
	$shortcode = section_field($name);
	if (!$shortcode) {
		return '';
	}
	$rendered = do_shortcode($shortcode);
	return $rendered === $shortcode ? '' : $rendered;
}

/**
 * Has the client put anything into this field's section yet?
 * Field names are crb_<section>_<name>, so everything sharing the crb_<section>_
 * prefix counts. Carbon Fields stores its meta with a leading underscore.
 */
function section_has_content($name, $post_id = 0)
{
	static $cache = array();
	$id = $post_id ?: get_the_ID();
	if (!$id) {
		return false;
	}
	$parts = explode('_', $name);
	if (count($parts) < 3) {
		return false;
	}
	$prefix = '_' . $parts[0] . '_' . $parts[1] . '_';
	if (isset($cache[$id . $prefix])) {
		return $cache[$id . $prefix];
	}
	$cache[$id . $prefix] = false;
	foreach (get_post_meta($id) as $meta_key => $meta_values) {
		if (strpos($meta_key, $prefix) !== 0) {
			continue;
		}
		if (substr($meta_key, -5) === '_note') {
			continue;
		} /*the html notes in the admin are not content*/
		foreach ($meta_values as $meta_value) {
			if ($meta_value === '' || $meta_value === null) {
				continue;
			}
			$cache[$id . $prefix] = true;
			break 2;
		}
	}
	return $cache[$id . $prefix];
}

/**
 * English and Ukrainian live on two separate pages, linked manually in the
 * admin's Custom Fields box: has_translation on the English page holds the
 * Ukrainian page ID, is_translation on the Ukrainian page holds the English
 * page ID. Each page keeps its own Carbon Fields content in its own
 * language - this only establishes the relationship between the two pages
 * and is used to pick the right hardcoded UI text (CTA, footer, 404/search
 * strings) and to build the language switcher links.
 */
function get_translation_data()
{
	$current_id = get_the_ID();
	$is_translation = $current_id ? get_post_meta($current_id, 'is_translation', true) : '';

	if ($is_translation) {
		return array(
			'language' => 'ukrainian',
			'english_page' => $is_translation,
			'translated_page' => $current_id,
		);
	}

	return array(
		'language' => 'english',
		'english_page' => $current_id,
		'translated_page' => $current_id ? get_post_meta($current_id, 'has_translation', true) : '',
	);
}

/**
 * The social networks a section can offer. One place for the label, the icon and
 * the admin option list, so a new network is added here and nowhere else.
 * Icons are inline SVG using currentColor, sized by the section's own CSS.
 */
function social_networks()
{
	return array(
		'instagram' => array(
			'label' => 'Instagram',
			'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1.2" fill="currentColor" stroke="none"/></svg>',
		),
		'linkedin' => array(
			'label' => 'LinkedIn',
			'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-.95 1.83-1.95 3.77-1.95 4.03 0 4.78 2.5 4.78 5.76V21h-4v-5.6c0-1.34-.03-3.07-1.9-3.07-1.9 0-2.2 1.46-2.2 2.97V21H9z"/></svg>',
		),
		'facebook' => array(
			'label' => 'Facebook',
			'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5h1.65V3.6c-.29-.04-1.27-.12-2.41-.12-2.39 0-4.02 1.46-4.02 4.13V9.9H7.5V13h2.77v8z"/></svg>',
		),
		'x' => array(
			'label' => 'X',
			'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.53 3H20.5l-6.49 7.42L21.5 21h-5.9l-4.62-6.04L5.7 21H2.72l6.94-7.93L2.5 3h6.05l4.18 5.52zm-1.04 16.2h1.65L7.6 4.72H5.83z"/></svg>',
		),
		'youtube' => array(
			'label' => 'YouTube',
			'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 12s0-3.4-.43-5.03a2.6 2.6 0 0 0-1.83-1.84C19.1 4.7 12 4.7 12 4.7s-7.1 0-8.74.43c-.9.24-1.6.95-1.83 1.84C1 8.6 1 12 1 12s0 3.4.43 5.03c.24.9.94 1.6 1.83 1.84 1.64.43 8.74.43 8.74.43s7.1 0 8.74-.43a2.6 2.6 0 0 0 1.83-1.84C23 15.4 23 12 23 12zM9.75 15.02V8.98L15.5 12z"/></svg>',
		),
		'telegram' => array(
			'label' => 'Telegram',
			'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M21.9 4.3 18.8 19c-.23 1.03-.85 1.28-1.72.8l-4.76-3.5-2.3 2.21c-.25.26-.47.47-.96.47l.34-4.85 8.84-7.99c.38-.34-.09-.53-.6-.19L6.7 12.3 1.99 10.8c-1.02-.32-1.04-1.02.21-1.51L20.6 2.77c.85-.31 1.6.2 1.3 1.53z"/></svg>',
		),
		'tiktok' => array(
			'label' => 'TikTok',
			'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M16.5 3c.4 2.3 1.9 3.8 4.5 4v3c-1.6 0-3.1-.5-4.4-1.4v6.7a5.7 5.7 0 1 1-5.7-5.7c.3 0 .6 0 .9.1v3.1a2.6 2.6 0 1 0 1.8 2.5V3z"/></svg>',
		),
		'whatsapp' => array(
			'label' => 'WhatsApp',
			'icon' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.5 15.2L2 22l4.9-1.5A10 10 0 1 0 12 2zm0 18a8 8 0 0 1-4.1-1.1l-.3-.2-2.9.9.9-2.8-.2-.3A8 8 0 1 1 12 20zm4.4-5.9c-.2-.1-1.4-.7-1.6-.8-.2-.1-.4-.1-.6.1-.2.2-.6.8-.8 1-.1.2-.3.2-.5.1-.2-.1-1-.4-1.9-1.2-.7-.6-1.2-1.4-1.3-1.6-.1-.2 0-.4.1-.5.1-.1.2-.3.4-.4.1-.1.2-.2.2-.4.1-.1 0-.3 0-.4 0-.1-.6-1.4-.8-1.9-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.8-.8 1.9s.8 2.2.9 2.4c.1.2 1.6 2.5 4 3.5.6.2 1 .4 1.3.5.6.2 1.1.2 1.5.1.5-.1 1.4-.6 1.6-1.1.2-.5.2-1 .1-1.1-.1-.1-.2-.2-.4-.3z"/></svg>',
		),
	);
}

function social_icon($network)
{
	$networks = social_networks();
	return isset($networks[$network]) ? $networks[$network]['icon'] : '';
}

function social_label($network)
{
	$networks = social_networks();
	return isset($networks[$network]) ? $networks[$network]['label'] : $network;
}

/**
 * Option list for the network select in includes/fields.php.
 */
function social_network_options()
{
	$options = array();
	foreach (social_networks() as $key => $network) {
		$options[$key] = $network['label'];
	}
	return $options;
}

/**
 * Disable the emoji's
 */
function disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
	add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
	if ('dns-prefetch' == $relation_type) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

		$urls = array_diff($urls, array($emoji_svg_url));
	}

	return $urls;
}

function smartwp_remove_wp_block_library_css()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);


add_action('after_setup_theme', 'add_theming_support');
function add_theming_support()
{
	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
     * Let WordPress manage the document title.
     * This theme does not use a hard-coded <title> tag in the document head,
     * WordPress will provide it for us.
     */
	add_theme_support('title-tag');

	/**
	 * Add post-formats support.
	 */
	add_theme_support(
		'post-formats',
		array(
			'link',
			'aside',
			'gallery',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		)
	);
	/*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(1568, 9999);

	// Logo is set in Appearance > Customize > Site Identity; falls back to the site name.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 300,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary'    => 'Primary Menu',
			'primary_uk' => 'Primary Menu (Ukrainian)',
			'footer'     => 'Footer Menu',
			'footer_uk'  => 'Footer Menu (Ukrainian)',
		)
	);
	/*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	// Add support for Block Styles.
	add_theme_support('wp-block-styles');
	// Add support for responsive embedded content.
	add_theme_support('responsive-embeds');

	// Add support for custom line height controls.
	add_theme_support('custom-line-height');

	// Add support for experimental link color control.
	add_theme_support('experimental-link-color');

	// Add support for experimental cover block spacing.
	add_theme_support('custom-spacing');

	// Add support for custom units.
	// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
	add_theme_support('custom-units');

	// Remove feed icon link from legacy RSS widget.
	add_filter('rss_widget_feed_link', '__return_false');
}

function my_excerpt_length($length)
{
	return 25;
}
add_filter('excerpt_length', 'my_excerpt_length');

function new_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function tgm_io_shortcode_empty_paragraph_fix($content)
{
	$array = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']'
	);
	return strtr($content, $array);
}
add_filter('the_content', 'tgm_io_shortcode_empty_paragraph_fix');

function add_theme_changes()
{
	include(locate_template('includes/theme-changes.php'));
}
add_action('wp_footer', 'add_theme_changes');

// change src to data-url if any in the content
add_filter('the_content', 'filter_url');
function filter_url($content)
{
	return str_replace('src="', 'data-url="', $content);
}

// disable srcset on frontend
function disable_wp_responsive_images()
{
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');

//disable lazyloading of images
add_filter('wp_lazy_loading_enabled', '__return_false');

// Removes the decoding attribute from images added inside post content.
add_filter('wp_img_tag_add_decoding_attr', '__return_false');

// Remove the decoding attribute from featured images and the Post Image block.
add_filter('wp_get_attachment_image_attributes', function ($attributes) {
	unset($attributes['decoding']);
	return $attributes;
});

function add_theme_fonts()
{
	$fonts_css_version = filemtime(get_template_directory() . '/fonts/site-fonts.css');
?>
	<link rel="preload" as="style" href="<?= get_template_directory_uri(); ?>/fonts/site-fonts.css?ver=<?= $fonts_css_version; ?>">
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/fonts/site-fonts.css?ver=<?= $fonts_css_version; ?>">
<?php }
add_action('wp_head', 'add_theme_fonts');

/**
 * Replace Formidable Forms' default invalid submission message with the
 * Ukrainian version used by the contact form. Limited to form ID 3 so other
 * Formidable forms keep their default validation message.
 */
function irchansky_change_invalid_error_message($invalid_msg, $args)
{
	if (empty($args['form']->id)) {
		return $invalid_msg;
	}

	if (3 !== (int) $args['form']->id) {
		return $invalid_msg;
	}

	return 'Будь ласка, перевірте обов\'язкові поля.';
}
add_filter('frm_invalid_error_message', 'irchansky_change_invalid_error_message', 10, 2);
