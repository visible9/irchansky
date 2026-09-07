<?php

/**
 * The template for displaying the footer
 *
 */

$language = get_translation_data()['language'];
$home_id = 'page' === get_option('show_on_front') ? (int) get_option('page_on_front') : 0;
$contact_home_id = $home_id;
if ('ukrainian' === $language && $home_id) {
	$home_translation = (int) get_post_meta($home_id, 'has_translation', true);
	if ($home_translation) {
		$contact_home_id = $home_translation;
	}
}
?>

</div><!-- end #main-content -->

<footer class="site-footer">
	<div class="content-width">
		<div class="footer-top">
			<div class="footer-brand">
				<a class="logo-container" href="<?= get_home_url(); ?>/">
					<span class="logo-text">IRCHANSKY</span>
				</a>
				<p><?= 'english' === $language ? 'Design, development, and dependable maintenance for WordPress, ecommerce, and white-label digital projects.' : 'Дизайн, розробка та надійний технічний супровід для WordPress, e-commerce та white-label цифрових проєктів.'; ?></p>
			</div>

			<div class="footer-cols">
				<div class="footer-col">
					<span class="footer-col-title"><?= 'english' === $language ? 'Menu' : 'Меню'; ?></span>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'ukrainian' === $language ? 'footer_uk' : 'footer',
						'container'      => false,
						'menu_class'     => 'footer-menu',
						'depth'          => 1,
						'fallback_cb'    => false
					));
					?>
				</div>

				<?php if (section_field('crb_contact_email', 'hello@example.com', $contact_home_id) || section_field('crb_contact_phone', '+46 31 123 45 67', $contact_home_id) || section_field('crb_contact_address', 'Kyiv, Ukraine · 9am–6pm', $contact_home_id)) { ?>
					<div class="footer-col footer-contacts-col">
						<span class="footer-col-title"><?= 'english' === $language ? 'Contacts' : "Контакти"; ?></span>
						<div class="footer-contacts">

							<?php if (section_field('crb_contact_email', 'hello@example.com', $contact_home_id)) { ?>
								<a href="mailto:<?= section_field('crb_contact_email', 'hello@example.com', $contact_home_id); ?>"><?= section_field('crb_contact_email', 'hello@example.com', $contact_home_id); ?></a>
							<?php } ?>

							<?php if (section_field('crb_contact_phone', '+46 31 123 45 67', $contact_home_id)) { ?>
								<a href="tel:<?= preg_replace('/[^0-9+]/', '', section_field('crb_contact_phone', '+46 31 123 45 67', $contact_home_id)); ?>"><?= section_field('crb_contact_phone', '+46 31 123 45 67', $contact_home_id); ?></a>
							<?php } ?>

							<?php if (section_field('crb_contact_address', 'Kyiv, Ukraine · 9am–6pm', $contact_home_id)) { ?>
								<span><?= section_field('crb_contact_address', 'Kyiv, Ukraine · 9am–6pm', $contact_home_id); ?></span>
							<?php } ?>

						</div>
					</div>
				<?php } ?>

				<?php if (section_form('crb_footer_form')) { ?>
					<div class="footer-col footer-form-col">
						<span class="footer-col-title"><?= 'english' === $language ? 'Subscribe to our newsletter' : 'Підпишіться на розсилку'; ?></span>
						<div class="footer-form"><?= section_form('crb_footer_form'); ?></div>
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="footer-legal">
				<p>&copy; <?= date('Y'); ?> <?= get_bloginfo('name'); ?>. <?= 'english' === $language ? 'All rights reserved.' : 'Усі права захищені.'; ?></p>
				<a href="/privacy-policy/"><?= 'english' === $language ? 'Privacy Policy' : 'Політика конфіденційності'; ?></a>
			</div>

			<?php if (section_field('crb_social_links', array(
				array('network' => 'facebook', 'url' => '#'),
				array('network' => 'instagram', 'url' => '#'),
				array('network' => 'tiktok', 'url' => '#'),
				array('network' => 'x', 'url' => '#'),
				array('network' => 'whatsapp', 'url' => '#')
			), $home_id)) { ?>
				<div class="footer-social social-icons">
					<?php foreach (
						section_field('crb_social_links', array(
							array('network' => 'facebook', 'url' => '#'),
							array('network' => 'instagram', 'url' => '#'),
							array('network' => 'tiktok', 'url' => '#'),
							array('network' => 'x', 'url' => '#'),
							array('network' => 'whatsapp', 'url' => '#')
						), $home_id) as $social
					) { ?>
						<?php if (!empty($social['url']) && social_icon($social['network'])) { ?>
							<a class="social-link" href="<?= $social['url']; ?>" target="_blank" rel="noopener" aria-label="<?= social_label($social['network']); ?>"><?= social_icon($social['network']); ?></a>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</footer>

</div><!-- end .page-wrap -->

</div><!-- end #main -->

<?php wp_footer(); ?>
</body>

</html>