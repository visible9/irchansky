<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 */

$translation = get_translation_data();
$language = $translation['language'];
$english_page = $translation['english_page'];
$translated_page = $translation['translated_page'];

?>
<!doctype html>
<html lang="<?= 'ukrainian' === $language ? 'uk' : 'en'; ?>">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="main">

		<div class="bg-grid" aria-hidden="true"></div>
		<div class="bg-glow" aria-hidden="true"></div>

		<div class="page-wrap">

			<header class="masthead">
				<div class="inner-masthead content-width">
					<a class="logo-container" href="<?= get_home_url(); ?>/">
						<?php $logo_id = get_theme_mod('custom_logo'); ?>
						<?php if ($logo_id) { ?>
							<img src="<?= wp_get_attachment_image_url($logo_id, 'full'); ?>" alt="<?= get_bloginfo('name'); ?>">
						<?php } else { ?>
							<span class="logo-text"><?= get_bloginfo('name'); ?></span>
						<?php } ?>
					</a>

					<input type="checkbox" id="mobile-input">

					<nav>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'ukrainian' === $language ? 'primary_uk' : 'primary',
							'container'      => false,
							'menu_class'     => 'main-menu',
							'fallback_cb'    => false
						));
						?>

						<a class="button menu-cta nav-cta" href="<?= get_home_url(); ?>/contact/"><?= 'english' === $language ? 'Book call' : "Зв'язатися"; ?></a>
					</nav>

					<div class="header-actions">
						<?php if ($translated_page || $english_page) { ?>
							<div class="lang-switcher">
								<?php if ('english' === $language) { ?>
									<span class="active">EN</span>
									<?php if ($translated_page) { ?>
										<span class="divider">/</span>
										<a href="<?= get_permalink($translated_page); ?>">UA</a>
									<?php } ?>
								<?php } else { ?>
									<?php if ($english_page) { ?>
										<a href="<?= get_permalink($english_page); ?>">EN</a>
										<span class="divider">/</span>
									<?php } ?>
									<span class="active">UA</span>
								<?php } ?>
							</div>
						<?php } ?>

						<a class="button menu-cta" href="<?= get_home_url(); ?>/contact/"><?= 'english' === $language ? 'Book call' : "Зв'язатися"; ?></a>
					</div>

					<label class="burger" for="mobile-input" aria-label="Toggle menu"><span></span><span></span><span></span></label>
				</div>
			</header>

			<div id="main-content">