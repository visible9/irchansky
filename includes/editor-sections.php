<?php

/**
 * Puts the theme's sections in the block editor's inserter, as their own
 * "Page Sections" category, so the client can browse and insert them instead
 * of typing shortcode tags by hand. Each entry becomes a tiny custom block
 * (ir4/home-banner, ir4/home-about, ...) whose save() writes out nothing but
 * the plain shortcode text - [home_banner] - so the page content, and every
 * existing shortcode.php/do_shortcode() render path, stays exactly as it was.
 *
 * Only sections with real fields belong in ir4_editor_sections(): add a
 * shortcode here once its tab exists in includes/fields.php, not before.
 */

/**
 * Small wireframe icons, one shape per layout pattern and reused wherever two
 * sections read the same way (Home About and the About page's own About both
 * use "split"). Same drawing convention as social_networks() in
 * functions.php: 24x24 viewBox, currentColor, no fill unless noted.
 */
function ir4_section_icon_shapes()
{
	return array(
		'hero' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.5" y="3.5" width="19" height="17" rx="2"/><line x1="7" y1="9" x2="17" y2="9"/><line x1="6" y1="13" x2="18" y2="13"/><rect x="9" y="16" width="6" height="2.6" rx="1" fill="currentColor" stroke="none"/></svg>',
		'split' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.5" y="4" width="8.5" height="16" rx="1.5" fill="currentColor" fill-opacity=".2"/><line x1="13.5" y1="8" x2="21.5" y2="8"/><line x1="13.5" y1="12" x2="20" y2="12"/><line x1="13.5" y1="16" x2="21.5" y2="16"/></svg>',
		'split-form' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><line x1="2.5" y1="7" x2="9.5" y2="7"/><line x1="2.5" y1="11" x2="10.5" y2="11"/><line x1="2.5" y1="15" x2="8" y2="15"/><rect x="13" y="4" width="8.5" height="3" rx="1"/><rect x="13" y="9" width="8.5" height="3" rx="1"/><rect x="13" y="14" width="8.5" height="3" rx="1" fill="currentColor" fill-opacity=".2"/></svg>',
		'tags' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.5" y="4" width="4.5" height="2.4" rx="1"/><line x1="9" y1="5.2" x2="19" y2="5.2"/><rect x="2.5" y="11" width="4.5" height="2.4" rx="1"/><line x1="9" y1="12.2" x2="21.5" y2="12.2"/><rect x="2.5" y="18" width="4.5" height="2.4" rx="1"/><line x1="9" y1="19.2" x2="17" y2="19.2"/></svg>',
		'grid' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.5" y="5" width="5.5" height="14" rx="1"/><rect x="9.5" y="5" width="5.5" height="14" rx="1"/><rect x="16.5" y="5" width="5.5" height="14" rx="1"/></svg>',
		'columns' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.5" y="8" width="5.5" height="11" rx="1"/><rect x="9.5" y="3.5" width="5.5" height="15.5" rx="1" fill="currentColor" fill-opacity=".2"/><rect x="16.5" y="8" width="5.5" height="11" rx="1"/></svg>',
		'gallery' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.5" y="3.5" width="8.5" height="8" rx="1"/><rect x="13" y="3.5" width="8.5" height="8" rx="1"/><rect x="2.5" y="13.5" width="8.5" height="7" rx="1"/><rect x="13" y="13.5" width="8.5" height="7" rx="1"/></svg>',
		'cards' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.2" y="5" width="5.8" height="14" rx="1"/><rect x="3.1" y="6" width="4" height="3.4" fill="currentColor" fill-opacity=".2" stroke="none"/><rect x="9.1" y="5" width="5.8" height="14" rx="1"/><rect x="10" y="6" width="4" height="3.4" fill="currentColor" fill-opacity=".2" stroke="none"/><rect x="16" y="5" width="5.8" height="14" rx="1"/><rect x="16.9" y="6" width="4" height="3.4" fill="currentColor" fill-opacity=".2" stroke="none"/></svg>',
		'stats' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><line x1="2.5" y1="20" x2="21.5" y2="20"/><rect x="4" y="12" width="3.4" height="6" fill="currentColor" stroke="none"/><rect x="10.3" y="7" width="3.4" height="11" fill="currentColor" stroke="none"/><rect x="16.6" y="10" width="3.4" height="8" fill="currentColor" stroke="none"/></svg>',
		'avatars' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="6" cy="8" r="3"/><line x1="3" y1="17" x2="9" y2="17"/><circle cx="16" cy="8" r="3" fill="currentColor" fill-opacity=".2"/><line x1="13" y1="17" x2="19" y2="17"/></svg>',
		'strip' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><line x1="2.5" y1="12" x2="21.5" y2="12"/><circle cx="5" cy="12" r="2.2" fill="currentColor" stroke="none"/><circle cx="12" cy="12" r="2.2" fill="currentColor" stroke="none"/><circle cx="19" cy="12" r="2.2" fill="currentColor" stroke="none"/></svg>',
		'quote' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M5 8c-1.7 0-3 1.3-3 3s1.3 3 3 3c0 1.8-1.2 3-3 3"/><path d="M15 8c-1.7 0-3 1.3-3 3s1.3 3 3 3c0 1.8-1.2 3-3 3"/></svg>',
		'cta' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.5" y="4" width="19" height="16" rx="2" fill="currentColor" fill-opacity=".12"/><line x1="7.5" y1="10" x2="16.5" y2="10"/><rect x="9" y="13.5" width="6" height="2.6" rx="1" fill="currentColor" stroke="none"/></svg>',
		'accordion' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2.5" y="3.5" width="19" height="4.6" rx="1" fill="currentColor" fill-opacity=".2"/><rect x="2.5" y="9.7" width="19" height="4.6" rx="1"/><rect x="2.5" y="15.9" width="19" height="4.6" rx="1"/><line x1="18.3" y1="12" x2="20.3" y2="12"/></svg>',
	);
}

/**
 * Every shortcode currently backed by a Carbon Fields tab, keyed by tag.
 */
function ir4_editor_sections()
{
	return array(
		'home_banner' => array('title' => 'Banner', 'description' => 'Hero header with a heading, buttons and a background image.', 'shape' => 'hero'),
		'home_about' => array('title' => 'About', 'description' => 'Intro text next to an image, with optional stats.', 'shape' => 'split'),
		'home_mission' => array('title' => 'Mission', 'description' => 'A heading and intro above a set of tagged items.', 'shape' => 'tags'),
		'home_services' => array('title' => 'Services', 'description' => 'A grid of service cards.', 'shape' => 'grid'),
		'home_pricing' => array('title' => 'Pricing', 'description' => 'A row of pricing packages.', 'shape' => 'columns'),
		'home_portfolio' => array('title' => 'Portfolio', 'description' => 'A gallery grid of project tiles with a lightbox.', 'shape' => 'gallery'),
		'home_news' => array('title' => 'News', 'description' => 'The latest blog posts as cards.', 'shape' => 'cards'),
		'home_results' => array('title' => 'Results', 'description' => 'A row of count-up metrics.', 'shape' => 'stats'),
		'home_team' => array('title' => 'Team', 'description' => 'A grid of team member cards with social links.', 'shape' => 'avatars'),
		'home_social' => array('title' => 'Social', 'description' => 'A strip linking out to social profiles.', 'shape' => 'strip'),
		'home_testimonials' => array('title' => 'Testimonials', 'description' => 'A slider of client quotes.', 'shape' => 'quote'),
		'home_cta' => array('title' => 'Call To Action', 'description' => 'A centred banner with a heading and a button.', 'shape' => 'cta'),
		'home_faq' => array('title' => 'FAQ', 'description' => 'An accordion of questions and answers.', 'shape' => 'accordion'),
		'home_contact' => array('title' => 'Contact', 'description' => 'Contact details next to a pasted-in form.', 'shape' => 'split-form'),
		'about_rev' => array('title' => 'About (About Page)', 'description' => 'The About page\'s own version of the About section.', 'shape' => 'split'),
	);
}

function ir4_editor_section_block_name($tag)
{
	return 'ir4/' . str_replace('_', '-', $tag);
}

/**
 * ir4_editor_sections() is only real once Carbon Fields is actually booted -
 * without it section_field() always falls back to demo content anyway, so
 * offering these blocks would just insert shortcodes with nothing behind
 * them. Mirrors the function_exists() guard section_field() uses.
 */
function ir4_editor_sections_available()
{
	return function_exists('carbon_get_post_meta') ? ir4_editor_sections() : array();
}

function ir4_register_section_block_category($categories)
{
	if (!ir4_editor_sections_available()) {
		return $categories;
	}
	return array_merge(array(array('slug' => 'ir4-sections', 'title' => 'Page Sections', 'icon' => null)), $categories);
}
add_filter('block_categories_all', 'ir4_register_section_block_category');

/**
 * Registers one tiny block per section. Each has supports.multiple => false,
 * which is what disables a section in the inserter once it is already on the
 * page - the same native behaviour a single-instance block like Post Title
 * gets in the site editor.
 */
function ir4_register_section_blocks()
{
	$sections = ir4_editor_sections_available();
	if (!$sections) {
		return;
	}
	foreach ($sections as $tag => $section) {
		register_block_type(ir4_editor_section_block_name($tag), array(
			'title' => $section['title'],
			'category' => 'ir4-sections',
			'description' => $section['description'],
			'supports' => array(
				'multiple' => false,
				'html' => false,
				'customClassName' => false,
				'className' => false,
				'reusable' => false,
			),
		));
	}
}
add_action('init', 'ir4_register_section_blocks');

/**
 * Editor-only script and styles that give each block above its edit()/save()
 * behaviour - see includes/js/editor-sections.js. Limited to page screens,
 * since that is the only post type the sections' fields are registered on.
 */
function ir4_enqueue_section_editor_assets()
{
	$sections = ir4_editor_sections_available();
	if (!$sections) {
		return;
	}
	$screen = get_current_screen();
	if (!$screen || $screen->post_type !== 'page') {
		return;
	}

	$shapes = ir4_section_icon_shapes();
	$data = array();
	foreach ($sections as $tag => $section) {
		$data[] = array(
			'tag' => $tag,
			'name' => ir4_editor_section_block_name($tag),
			'title' => $section['title'],
			'description' => $section['description'],
			'icon' => isset($shapes[$section['shape']]) ? $shapes[$section['shape']] : '',
		);
	}

	$js_path = get_template_directory() . '/includes/js/editor-sections.js';
	$css_path = get_template_directory() . '/includes/css/editor-sections.css';

	wp_enqueue_script(
		'ir4-editor-sections',
		get_template_directory_uri() . '/includes/js/editor-sections.js',
		array('wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-data'),
		file_exists($js_path) ? filemtime($js_path) : false,
		true
	);
	wp_add_inline_script('ir4-editor-sections', 'window.ir4EditorSections = ' . wp_json_encode($data) . ';', 'before');

	wp_enqueue_style(
		'ir4-editor-sections',
		get_template_directory_uri() . '/includes/css/editor-sections.css',
		array(),
		file_exists($css_path) ? filemtime($css_path) : false
	);
}
add_action('enqueue_block_editor_assets', 'ir4_enqueue_section_editor_assets');
