<?php

/**
 * Carbon Fields definitions for the theme sections.
 * One container, one tab per section, so the page edit screen keeps a single metabox.
 * Admin labels are intentionally in English.
 *
 * A tab is only registered when the page being edited holds the shortcode that
 * renders the section, so the client is shown the fields for what is on that
 * page and nothing else. page_uses_section() takes the shortcodes that render
 * the section - a section reused on another page is listed alongside the
 * original - and the crb_<section> prefix its fields share.
 *
 * Sections are collected into $sections rather than added straight to the
 * container, then sorted by section_position() before add_tab() runs - so the
 * tabs read top to bottom in the same order the shortcodes appear in the page
 * content, not the fixed order they are defined in below.
 */

use Carbon_Fields\Container;
use Carbon_Fields\Field;


$container = Container::make('post_meta', 'Page Sections')
	->where('post_type', '=', 'page')
	->set_context('normal')
	->set_priority('high')
	->set_layout('tabbed-vertical');

$sections = array();

/*Home Banner*/
$sections[] = array(
	'shortcodes' => 'home_banner',
	'prefix' => 'crb_banner',
	'title' => 'Home Banner',
	'fields' => array(
		Field::make('html', 'crb_banner_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element.</em></p>'),
		Field::make('text', 'crb_banner_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('text', 'crb_banner_title', 'Heading'),
		Field::make('textarea', 'crb_banner_text', 'Description')
			->set_rows(3),
		Field::make('image', 'crb_banner_image', 'Background Image')
			->set_value_type('url')
			->set_help_text('Optional. Leave empty for a plain light background.'),
		Field::make('text', 'crb_banner_button_text', 'Primary Button Text')
			->set_help_text('Leave empty to hide the button.'),
		Field::make('text', 'crb_banner_button_link', 'Primary Button Link'),
		Field::make('text', 'crb_banner_button_2_text', 'Secondary Button Text')
			->set_help_text('Leave empty to hide the button.'),
		Field::make('text', 'crb_banner_button_2_link', 'Secondary Button Link'),
		Field::make('text', 'crb_banner_small_print', 'Small Print')
			->set_help_text('One line under the buttons. Leave empty to hide it.'),
	),
);

/*Home About*/
$sections[] = array(
	'shortcodes' => 'home_about',
	'prefix' => 'crb_about',
	'title' => 'Home About',
	'fields' => array(
		Field::make('html', 'crb_about_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element.</em></p>'),
		Field::make('text', 'crb_about_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('text', 'crb_about_title', 'Heading'),
		Field::make('textarea', 'crb_about_text', 'Intro')
			->set_rows(3)
			->set_help_text('The larger paragraph right under the heading.'),
		Field::make('rich_text', 'crb_about_body', 'Body Text'),
		Field::make('image', 'crb_about_image', 'Image')
			->set_value_type('url')
			->set_help_text('Optional. Leave empty to drop the image and centre the text.'),
		Field::make('select', 'crb_about_layout', 'Image Position')
			->add_options(array(
				'left' => 'Left',
				'right' => 'Right',
			))
			->set_default_value('left')
			->set_help_text('Which side the image sits on. The text takes the other side.'),
		Field::make('text', 'crb_about_stat_1_value', 'Stat 1 Value')
			->set_help_text('Leave empty to hide this stat.'),
		Field::make('text', 'crb_about_stat_1_label', 'Stat 1 Label'),
		Field::make('text', 'crb_about_stat_2_value', 'Stat 2 Value')
			->set_help_text('Leave empty to hide this stat.'),
		Field::make('text', 'crb_about_stat_2_label', 'Stat 2 Label'),
		Field::make('text', 'crb_about_stat_3_value', 'Stat 3 Value')
			->set_help_text('Leave empty to hide this stat.'),
		Field::make('text', 'crb_about_stat_3_label', 'Stat 3 Label'),
		Field::make('text', 'crb_about_button_text', 'Button Text')
			->set_help_text('Leave empty to hide the button.'),
		Field::make('text', 'crb_about_button_link', 'Button Link'),
	),
);

/*About Revision*/
$sections[] = array(
	'shortcodes' => 'about_rev',
	'prefix' => 'crb_about_rev',
	'title' => 'About Revision',
	'fields' => array(
		Field::make('html', 'crb_about_rev_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element.</em></p>'),
		Field::make('text', 'crb_about_rev_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('text', 'crb_about_rev_title', 'Heading'),
		Field::make('textarea', 'crb_about_rev_text', 'Intro')
			->set_rows(3)
			->set_help_text('The larger paragraph right under the heading.'),
		Field::make('rich_text', 'crb_about_rev_body', 'Body Text'),
		Field::make('image', 'crb_about_rev_image', 'Image')
			->set_value_type('url')
			->set_help_text('Optional. Leave empty to drop the image and centre the text.'),
		Field::make('select', 'crb_about_rev_layout', 'Image Position')
			->add_options(array(
				'right' => 'Right',
			))
			->set_default_value('right')
			->set_help_text('Which side the image sits on. The text takes the other side.'),
		Field::make('text', 'crb_about_rev_stat_1_value', 'Stat 1 Value')
			->set_help_text('Leave empty to hide this stat.'),
		Field::make('text', 'crb_about_rev_stat_1_label', 'Stat 1 Label'),
		Field::make('text', 'crb_about_rev_stat_2_value', 'Stat 2 Value')
			->set_help_text('Leave empty to hide this stat.'),
		Field::make('text', 'crb_about_rev_stat_2_label', 'Stat 2 Label'),
		Field::make('text', 'crb_about_rev_stat_3_value', 'Stat 3 Value')
			->set_help_text('Leave empty to hide this stat.'),
		Field::make('text', 'crb_about_rev_stat_3_label', 'Stat 3 Label'),
		Field::make('text', 'crb_about_rev_button_text', 'Button Text')
			->set_help_text('Leave empty to hide the button.'),
		Field::make('text', 'crb_about_rev_button_link', 'Button Link'),
	),
);

/*Home Mission*/
$sections[] = array(
	'shortcodes' => 'home_mission',
	'prefix' => 'crb_mission',
	'title' => 'Home Mission',
	'fields' => array(
		Field::make('html', 'crb_mission_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. Add as many items as you need.</em></p>'),
		Field::make('text', 'crb_mission_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_mission_title', 'Heading')
			->set_rows(2),
		Field::make('textarea', 'crb_mission_text', 'Intro')
			->set_rows(3),
		Field::make('complex', 'crb_mission_items', 'Items')
			->set_layout('tabbed-vertical')
			->set_header_template('<%- title %>')
			->add_fields(array(
				Field::make('text', 'tag', 'Tag')
					->set_help_text('Small label above the title. Leave empty to hide it.'),
				Field::make('text', 'title', 'Title')
					->set_help_text('An item without a title is skipped. Items are numbered automatically.'),
				Field::make('textarea', 'text', 'Text')
					->set_rows(3),
			)),
	),
);

/*Home Services*/
$sections[] = array(
	'shortcodes' => 'home_services',
	'prefix' => 'crb_services',
	'title' => 'Home Services',
	'fields' => array(
		Field::make('html', 'crb_services_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. Add as many items as you need.</em></p>'),
		Field::make('text', 'crb_services_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_services_title', 'Heading')
			->set_rows(2),
		Field::make('complex', 'crb_services_items', 'Items')
			->set_layout('tabbed-vertical')
			->set_header_template('<%- title %>')
			->add_fields(array(
				Field::make('text', 'tag', 'Tag')
					->set_help_text('Small label above the title. Leave empty to hide it.'),
				Field::make('text', 'title', 'Title')
					->set_help_text('An item without a title is skipped.'),
				Field::make('textarea', 'text', 'Text')
					->set_rows(3),
			)),
	),
);

/*Home Pricing*/
$sections[] = array(
	'shortcodes' => 'home_pricing',
	'prefix' => 'crb_pricing',
	'title' => 'Home Pricing',
	'fields' => array(
		Field::make('html', 'crb_pricing_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. Add as many packages as you need. A package left without a price is shown with a dashed border, for one still to be scoped.</em></p>'),
		Field::make('text', 'crb_pricing_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_pricing_title', 'Heading')
			->set_rows(2),
		Field::make('textarea', 'crb_pricing_text', 'Intro')
			->set_rows(3),
		Field::make('complex', 'crb_pricing_items', 'Packages')
			->set_layout('tabbed-vertical')
			->set_header_template('<%- title %>')
			->add_fields(array(
				Field::make('text', 'tier', 'Tier Label')
					->set_help_text('Shown next to the level dots, e.g. "Lot 1 · Quick (Full DIY)". Leave empty to hide the whole tier row.'),
				Field::make('select', 'level', 'Level')
					->set_options(array(
						'1' => '1 of 3',
						'2' => '2 of 3',
						'3' => '3 of 3',
					))
					->set_default_value('1')
					->set_help_text('How many of the three dots are filled in, from lightest (1) to most involved (3).'),
				Field::make('text', 'price', 'Price')
					->set_help_text('Leave empty for a package still to be scoped — the card is shown with a dashed border and no price.'),
				Field::make('text', 'title', 'Title')
					->set_help_text('A package without a title is skipped.'),
				Field::make('textarea', 'audience', 'Who It\'s For')
					->set_rows(2)
					->set_help_text('Shown after a bold "For:" label. Leave empty to hide it.'),
				Field::make('textarea', 'problem', 'The Problem')
					->set_rows(2)
					->set_help_text('Leave empty to hide this block.'),
				Field::make('textarea', 'fix', 'The Fix')
					->set_rows(2)
					->set_help_text('Leave empty to hide this block.'),
				Field::make('checkbox', 'show_how_it_works', 'Show "How It Works"')
					->set_default_value(false)
					->set_help_text('Off by default. Turn on to add a numbered "How It Works" list to this card.'),
				Field::make('complex', 'how_it_works_items', 'How It Works Steps')
					->set_layout('tabbed-vertical')
					->set_header_template('<%- text %>')
					->add_fields(array(
						Field::make('text', 'text', 'Step'),
					))
					->set_conditional_logic(array(
						array('field' => 'show_how_it_works', 'value' => true),
					)),
				Field::make('checkbox', 'show_can_do', 'Show "What The Site Can Do"')
					->set_default_value(false)
					->set_help_text('Off by default. Turn on to add a checklist titled "What The Site Can Do" to this card.'),
				Field::make('complex', 'can_do_items', 'What The Site Can Do Items')
					->set_layout('tabbed-vertical')
					->set_header_template('<%- text %>')
					->add_fields(array(
						Field::make('text', 'text', 'Item'),
					))
					->set_conditional_logic(array(
						array('field' => 'show_can_do', 'value' => true),
					)),
				Field::make('checkbox', 'show_whats_inside', 'Show "What\'s Inside"')
					->set_default_value(false)
					->set_help_text('Off by default. Turn on to add a checklist titled "What\'s Inside" to this card.'),
				Field::make('complex', 'whats_inside_items', 'What\'s Inside Items')
					->set_layout('tabbed-vertical')
					->set_header_template('<%- text %>')
					->add_fields(array(
						Field::make('text', 'text', 'Item'),
					))
					->set_conditional_logic(array(
						array('field' => 'show_whats_inside', 'value' => true),
					)),
				Field::make('text', 'limit', 'Limited Availability Note')
					->set_help_text('Small badge in the footer, e.g. "Only 10 kits at this price". Leave empty to hide it.'),
				Field::make('text', 'button_text', 'Button Text')
					->set_help_text('Leave empty to hide the button.'),
				Field::make('text', 'button_link', 'Button Link'),
			)),
	),
);

/*Home Portfolio*/
$sections[] = array(
	'shortcodes' => 'home_portfolio',
	'prefix' => 'crb_portfolio',
	'title' => 'Home Portfolio',
	'fields' => array(
		Field::make('html', 'crb_portfolio_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. Clicking a tile on the front end opens the image in a lightbox. Add as many projects as you need.</em></p>'),
		Field::make('text', 'crb_portfolio_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_portfolio_title', 'Heading')
			->set_rows(2),
		Field::make('textarea', 'crb_portfolio_text', 'Intro')
			->set_rows(3),
		Field::make('complex', 'crb_portfolio_items', 'Projects')
			->set_layout('tabbed-vertical')
			->set_header_template('<%- title %>')
			->add_fields(array(
				Field::make('image', 'image', 'Image')
					->set_value_type('url')
					->set_help_text('Shown on the tile and opened full size in the lightbox.'),
				Field::make('text', 'title', 'Title')
					->set_help_text('A project without a title is skipped.'),
				Field::make('text', 'category', 'Category'),
			)),
		Field::make('text', 'crb_portfolio_button_text', 'Button Text')
			->set_help_text('Leave empty to hide the button.'),
		Field::make('text', 'crb_portfolio_button_link', 'Button Link'),
	),
);

/*Home News*/
$sections[] = array(
	'shortcodes' => 'home_news',
	'prefix' => 'crb_news',
	'title' => 'Home News',
	'fields' => array(
		Field::make('html', 'crb_news_note')
			->set_html('<p><em>The cards come from the three latest blog posts, with their featured image, date, title and excerpt. While the blog has no posts yet the section shows three demo cards instead. Only the heading and the button are edited here.</em></p>'),
		Field::make('text', 'crb_news_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_news_title', 'Heading')
			->set_rows(2),
		Field::make('textarea', 'crb_news_text', 'Intro')
			->set_rows(3),
		Field::make('text', 'crb_news_button_text', 'Button Text')
			->set_help_text('Leave empty to hide the button.'),
		Field::make('text', 'crb_news_button_link', 'Button Link')
			->set_help_text('Defaults to the Posts page set in Settings > Reading. Without one the button stays hidden.'),
	),
);

/*Home Results*/
$sections[] = array(
	'shortcodes' => 'home_results',
	'prefix' => 'crb_results',
	'title' => 'Home Results',
	'fields' => array(
		Field::make('html', 'crb_results_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. On the front end each metric counts up from zero when it scrolls into view, so text around the number is kept: 250+, 1.4s and 98% all work.</em></p>'),
		Field::make('complex', 'crb_results_items', 'Metrics')
			->set_layout('tabbed-vertical')
			->set_header_template('<%- number %>')
			->add_fields(array(
				Field::make('text', 'number', 'Value')
					->set_help_text('A metric without a value is skipped. Text around the number is kept, so 250+ or 1.4s work.'),
				Field::make('text', 'label', 'Label'),
			)),
		Field::make('textarea', 'crb_results_caption', 'Caption')
			->set_rows(2)
			->set_help_text('Small note under the metrics. Leave empty to hide it.'),
	),
);

/*Home Team*/
$sections[] = array(
	'shortcodes' => 'home_team',
	'prefix' => 'crb_team',
	'title' => 'Home Team',
	'fields' => array(
		Field::make('html', 'crb_team_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. Add as many team members as you need.</em></p>'),
		Field::make('text', 'crb_team_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_team_title', 'Heading')
			->set_rows(2),
		Field::make('textarea', 'crb_team_text', 'Intro')
			->set_rows(3),
		Field::make('complex', 'crb_team_members', 'Team Members')
			->set_layout('tabbed-vertical')
			->set_header_template('<%- name %>')
			->add_fields(array(
				Field::make('image', 'photo', 'Photo')
					->set_value_type('url')
					->set_help_text('A portrait crop works best. Leave empty for a plain placeholder.'),
				Field::make('text', 'name', 'Name')
					->set_help_text('A member without a name is skipped.'),
				Field::make('text', 'role', 'Role'),
				Field::make('complex', 'socials', 'Social Links')
					->set_layout('tabbed-horizontal')
					->set_header_template('<%- network %>')
					->add_fields(array(
						Field::make('select', 'network', 'Network')
							->set_options(social_network_options()),
						Field::make('text', 'url', 'Profile URL'),
					)),
			)),
	),
);

/*Home Social*/
$sections[] = array(
	'shortcodes' => 'home_social',
	'prefix' => 'crb_social',
	'title' => 'Home Social',
	'fields' => array(
		Field::make('html', 'crb_social_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. A link with no URL is skipped, and the whole strip disappears if nothing is left.</em></p>'),
		Field::make('text', 'crb_social_title', 'Heading')
			->set_help_text('Leave empty to hide it.'),
		Field::make('text', 'crb_social_handle', 'Handle')
			->set_help_text('A short handle under the heading, for example @studio. Leave empty to hide it.'),
		Field::make('complex', 'crb_social_links', 'Social Links')
			->set_layout('tabbed-horizontal')
			->set_header_template('<%- network %>')
			->add_fields(array(
				Field::make('select', 'network', 'Network')
					->set_options(social_network_options()),
				Field::make('text', 'url', 'Profile URL'),
			)),
	),
);

/*Home Testimonials*/
$sections[] = array(
	'shortcodes' => 'home_testimonials',
	'prefix' => 'crb_testimonials',
	'title' => 'Home Testimonials',
	'fields' => array(
		Field::make('html', 'crb_testimonials_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. The quotes run as a slider; with only one quote the arrows and dots are dropped.</em></p>'),
		Field::make('text', 'crb_testimonials_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_testimonials_title', 'Heading')
			->set_rows(2),
		Field::make('complex', 'crb_testimonials_items', 'Testimonials')
			->set_layout('tabbed-vertical')
			->set_header_template('<%- name %>')
			->add_fields(array(
				Field::make('textarea', 'text', 'Quote')
					->set_rows(4)
					->set_help_text('A testimonial with no quote is skipped.'),
				Field::make('text', 'name', 'Name'),
				Field::make('text', 'role', 'Role and Company'),
			)),
	),
);

/*Home CTA*/
$sections[] = array(
	'shortcodes' => 'home_cta',
	'prefix' => 'crb_cta',
	'title' => 'Home CTA',
	'fields' => array(
		Field::make('html', 'crb_cta_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element.</em></p>'),
		Field::make('text', 'crb_cta_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_cta_title', 'Heading')
			->set_rows(2),
		Field::make('textarea', 'crb_cta_text', 'Intro')
			->set_rows(3),
		Field::make('text', 'crb_cta_button_text', 'Button Text')
			->set_help_text('Leave empty to hide the button.'),
		Field::make('text', 'crb_cta_button_link', 'Button Link'),
	),
);

/*Home FAQ*/
$sections[] = array(
	'shortcodes' => 'home_faq',
	'prefix' => 'crb_faq',
	'title' => 'Home FAQ',
	'fields' => array(
		Field::make('html', 'crb_faq_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. The list is an accordion: opening one answer closes the previous one.</em></p>'),
		Field::make('text', 'crb_faq_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_faq_title', 'Heading')
			->set_rows(2),
		Field::make('textarea', 'crb_faq_text', 'Intro')
			->set_rows(3),
		Field::make('complex', 'crb_faq_items', 'Questions')
			->set_layout('tabbed-vertical')
			->set_header_template('<%- question %>')
			->add_fields(array(
				Field::make('text', 'question', 'Question')
					->set_help_text('An entry with no question is skipped.'),
				Field::make('rich_text', 'answer', 'Answer'),
			)),
	),
);

/*Home Contact*/
$sections[] = array(
	'shortcodes' => 'home_contact',
	'prefix' => 'crb_contact',
	'title' => 'Home Contact',
	'fields' => array(
		Field::make('html', 'crb_contact_note')
			->set_html('<p><em>This section shows demo content until you fill in any field below. Once it holds content, an empty field simply hides that element. The form area only appears once a shortcode is pasted in, and without it the section drops to a single column.</em></p>'),
		Field::make('text', 'crb_contact_eyebrow', 'Eyebrow')
			->set_help_text('Small label above the heading. Leave empty to hide it.'),
		Field::make('textarea', 'crb_contact_title', 'Heading')
			->set_rows(2),
		Field::make('textarea', 'crb_contact_text', 'Intro')
			->set_rows(3),
		Field::make('textarea', 'crb_contact_address', 'Address')
			->set_rows(2)
			->set_help_text('Leave empty to hide it.'),
		Field::make('text', 'crb_contact_phone', 'Phone')
			->set_help_text('Shown as a tel: link. Leave empty to hide it.'),
		Field::make('text', 'crb_contact_email', 'Email')
			->set_help_text('Shown as a mailto: link. Leave empty to hide it.'),
		Field::make('complex', 'crb_contact_socials', 'Social Links')
			->set_layout('tabbed-horizontal')
			->set_header_template('<%- network %>')
			->add_fields(array(
				Field::make('select', 'network', 'Network')
					->set_options(social_network_options()),
				Field::make('text', 'url', 'Profile URL'),
			)),
		Field::make('text', 'crb_contact_form', 'Form Shortcode')
			->set_help_text('Paste the shortcode of your contact form, for example [formidable key=contact-form]. Use the form key rather than its id: ids change when the site moves from staging to live. Leave empty and no form is shown.'),
	),
);

usort($sections, function ($a, $b) {
	$pa = section_position($a['shortcodes']);
	$pb = section_position($b['shortcodes']);
	if ($pa === $pb) {
		return 0;
	}
	if ($pa === null) {
		return 1;
	}
	if ($pb === null) {
		return -1;
	}
	return $pa <=> $pb;
});

foreach ($sections as $section) {
	if (page_uses_section($section['shortcodes'], $section['prefix'])) {
		$container->add_tab($section['title'], $section['fields']);
	}
}

/*Footer - belongs to no shortcode, so it is the one tab always registered, and always last*/
$container->add_tab('Footer', array(
	Field::make('html', 'crb_footer_note')
		->set_html('<p><em>The footer logo and description are fixed in the theme code. Social links are shared with the Home Social tab, and the Contacts column reuses the Address/Phone/Email fields from the Home Contact tab. This field only controls the newsletter form column, which is dropped entirely when left empty.</em></p>'),
	Field::make('text', 'crb_footer_form', 'Form Shortcode')
		->set_help_text('Paste the shortcode of your form, for example [wpforms id="121"]. Leave empty and no form is shown.'),
));
