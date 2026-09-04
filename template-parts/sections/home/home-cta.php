<style type="text/css">
	/*With every field empty there would be a blank band holding nothing, so the whole section steps aside.*/
	.home-cta:not(:has(.cta-body > *)) {
		display: none;
	}

	.home-cta {
		position: relative;
		z-index: 1;
	}

	.home-cta .cta-body {
		max-width: 760px;
		margin: 0 auto;
		text-align: center;
	}

	.home-cta .cta-body h2 {
		margin: 0 0 20px;
	}

	.home-cta .lead {
		max-width: 620px;
		margin: 0 auto;
	}

	.home-cta .button-container {
		justify-content: center;
		margin-top: 36px;
	}

	@media(max-width: 750px) {
		.home-cta .button-container {
			margin-top: 26px;
		}
	}
</style>

<section class="home-cta beige-gradient section-padding" id="cta">
	<div class="content-width">
		<div class="cta-body fade-from-bottom">

			<?php if (section_field('crb_cta_eyebrow', "Let's Talk")) { ?>
				<span class="eyebrow"><?= section_field('crb_cta_eyebrow', "Let's Talk"); ?></span>
			<?php } ?>

			<?php if (section_field('crb_cta_title', 'Tell us what you are building, and let’s shape the right solution together')) { ?>
				<h2><?= section_field('crb_cta_title', 'Tell us what you are building, and let’s shape the right solution together'); ?></h2>
			<?php } ?>

			<?php if (section_field('crb_cta_text', 'Mon–Fri, 9am–6pm')) { ?>
				<p class="lead"><?= section_field('crb_cta_text', 'Mon–Fri, 9am–6pm'); ?></p>
			<?php } ?>

			<?php if (section_field('crb_cta_button_text', 'Book a call')) { ?>
				<div class="button-container">
					<a class="button" href="<?= section_field('crb_cta_button_link', '#contact'); ?>"><?= section_field('crb_cta_button_text', 'Book a call'); ?></a>
				</div>
			<?php } ?>

		</div>
	</div>
</section>