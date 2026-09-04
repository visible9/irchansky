<style type="text/css">
	.home-contact {
		position: relative;
		z-index: 2;
	}

	/*Same idea as the CTA panel: an empty info column would hold open half the grid, and a section with neither column left is not a section.*/
	.home-contact:not(:has(.contact-info > *, .contact-form)) {
		display: none;
	}

	.home-contact .contact-info:not(:has(*)) {
		display: none;
	}

	.home-contact .contact-grid {
		display: grid;
		grid-template-columns: 1fr 1.1fr;
		gap: 60px;
		align-items: start;
	}

	.home-contact.no-form .contact-grid {
		grid-template-columns: 1fr;
		max-width: 760px;
	}

	.home-contact .contact-grid:where(:has(> .contact-info:not(:has(*)))) {
		grid-template-columns: 1fr;
	}

	.home-contact .contact-info h2 {
		margin: 0 0 14px;
	}

	.home-contact .contact-info .lead {
		margin: 0;
	}

	.home-contact .contact-details {
		display: flex;
		flex-direction: column;
		gap: 22px;
		margin-top: 34px;
	}

	.home-contact .contact-detail {
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		gap: 5px;
	}

	.home-contact .detail-label {
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		letter-spacing: .12em;
		text-transform: uppercase;
		color: var(--color-3);
	}

	.home-contact .detail-value {
		font-size: var(--sm);
		line-height: 1.4;
		color: var(--color-1);
	}

	.home-contact a.detail-value {
		transition: color var(--transition);
	}

	.home-contact .contact-socials {
		display: flex;
		flex-wrap: wrap;
		gap: 8px;
		margin-top: 34px;
	}

	.home-contact .contact-social {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 40px;
		height: 40px;
		background: var(--color-1);
		color: var(--color-inverse);
		border: 1px solid var(--color-1);
		border-radius: 500px;
		transition: background var(--transition), border-color var(--transition), color var(--transition);
	}

	.home-contact .contact-social:hover {
		background: var(--color-2);
		border-color: var(--color-2);
		color: var(--color-inverse);
	}

	.home-contact .contact-social svg {
		width: 17px;
		height: 17px;
	}

	.home-contact .contact-form {
		padding: 32px 24px;
		background: var(--color-1);
		color: var(--color-inverse);
		border-radius: var(--radius);
	}

	/*Form markup comes from whichever plugin the client uses, so this only touches real elements.*/
	.home-contact .contact-form label {
		display: block;
		margin-bottom: 8px;
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		letter-spacing: .04em;
		color: rgb(255 255 255 / 65%);
	}

	.home-contact .contact-form input[type="text"],
	.home-contact .contact-form input[type="email"],
	.home-contact .contact-form input[type="tel"],
	.home-contact .contact-form input[type="url"],
	.home-contact .contact-form input[type="number"],
	.home-contact .contact-form textarea,
	.home-contact .contact-form select {
		border-color: transparent;
		height: 44px;
	}

	.home-contact .contact-form button[type="submit"] {
		background: var(--color-2);
		color: var(--color-on-accent);
		border-color: var(--color-2);
		box-shadow: none;
		height: 44px;
		width: 100%;
	}

	.home-contact .contact-form input[type="submit"]:hover,
	.home-contact .contact-form button[type="submit"]:hover {
		background: var(--color-inverse);
		color: var(--color-1);
		border-color: var(--color-inverse);
	}

	@media(max-width: 1000px) {
		.home-contact .contact-grid {
			grid-template-columns: 1fr;
			gap: 40px;
		}

		.home-contact .contact-form {
			padding: 28px;
		}
	}

	@media(max-width: 750px) {
		.home-contact .contact-details {
			gap: 18px;
			margin-top: 26px;
		}

		.home-contact .contact-socials {
			margin-top: 26px;
		}

		.home-contact .contact-form {
			padding: 22px;
		}
	}
</style>

<?php $language = get_translation_data()['language']; ?>

<section class="home-contact section-padding<?= section_form('crb_contact_form') ? '' : ' no-form'; ?>" id="contact">
	<div class="content-width">
		<div class="contact-grid">

			<div class="contact-info fade-from-left">

				<?php if (section_field('crb_contact_eyebrow', 'Get in touch')) { ?>
					<span class="eyebrow"><?= section_field('crb_contact_eyebrow', 'Get in touch'); ?></span>
				<?php } ?>

				<?php if (section_field('crb_contact_title', 'Tell us what you are building')) { ?>
					<h2><?= section_field('crb_contact_title', 'Tell us what you are building'); ?></h2>
				<?php } ?>

				<?php if (section_field('crb_contact_text', 'A sentence about the project is enough to start. We answer every message within a working day.')) { ?>
					<p class="lead"><?= section_field('crb_contact_text', 'A sentence about the project is enough to start. We answer every message within a working day.'); ?></p>
				<?php } ?>

				<?php if (section_field('crb_contact_address', '12 Fabriksgatan, 411 22 Gothenburg') || section_field('crb_contact_phone', '+46 31 123 45 67') || section_field('crb_contact_email', 'hello@example.com')) { ?>
					<div class="contact-details">

						<?php if (section_field('crb_contact_address', '12 Fabriksgatan, 411 22 Gothenburg')) { ?>
							<div class="contact-detail">
								<span class="detail-label"><?= 'english' === $language ? 'Address' : 'Адреса'; ?></span>
								<span class="detail-value"><?= section_field('crb_contact_address', '12 Fabriksgatan, 411 22 Gothenburg'); ?></span>
							</div>
						<?php } ?>

						<?php if (section_field('crb_contact_phone', '+46 31 123 45 67')) { ?>
							<div class="contact-detail">
								<span class="detail-label"><?= 'english' === $language ? 'Phone' : 'Телефон'; ?></span>
								<a class="detail-value" href="tel:<?= preg_replace('/[^0-9+]/', '', section_field('crb_contact_phone', '+46 31 123 45 67')); ?>"><?= section_field('crb_contact_phone', '+46 31 123 45 67'); ?></a>
							</div>
						<?php } ?>

						<?php if (section_field('crb_contact_email', 'hello@example.com')) { ?>
							<div class="contact-detail">
								<span class="detail-label"><?= 'english' === $language ? 'Email' : 'Email'; ?></span>
								<a class="detail-value" href="mailto:<?= section_field('crb_contact_email', 'hello@example.com'); ?>"><?= section_field('crb_contact_email', 'hello@example.com'); ?></a>
							</div>
						<?php } ?>

					</div>
				<?php } ?>

				<?php if (section_field('crb_contact_socials', array(
					array('network' => 'linkedin', 'url' => '#'),
					array('network' => 'instagram', 'url' => '#'),
					array('network' => 'x', 'url' => '#')
				))) { ?>
					<div class="contact-socials">
						<?php foreach (
							section_field('crb_contact_socials', array(
								array('network' => 'linkedin', 'url' => '#'),
								array('network' => 'instagram', 'url' => '#'),
								array('network' => 'x', 'url' => '#')
							)) as $social
						) { ?>
							<?php if (!empty($social['url']) && social_icon($social['network'])) { ?>
								<a class="contact-social" href="<?= $social['url']; ?>" target="_blank" rel="noopener" aria-label="<?= social_label($social['network']); ?>"><?= social_icon($social['network']); ?></a>
							<?php } ?>
						<?php } ?>
					</div>
				<?php } ?>

			</div>

			<?php if (section_form('crb_contact_form')) { ?>
				<div class="contact-form fade-from-right"><?= section_form('crb_contact_form'); ?></div>
			<?php } ?>

		</div>
	</div>
</section>