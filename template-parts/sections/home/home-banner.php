<style type="text/css">
	.home-banner {
		position: relative;
		display: flex;
		align-items: center;
		min-height: calc(100vh - var(--header-height));
		padding: 110px 0;
		overflow: hidden;
		background: var(--color-surface);
		text-align: center;
	}

	.home-banner .content-width {
		position: relative;
		z-index: 2;
	}

	.home-banner .eyebrow {
		margin-bottom: 20px;
	}

	.home-banner h1 {
		max-width: 860px;
		margin: 0 auto 22px;
	}

	.home-banner .lead {
		max-width: 620px;
		margin: 0 auto;
	}

	.home-banner .button-container {
		justify-content: center;
		margin-top: 36px;
	}

	.home-banner.has-image:after {
		content: '';
		position: absolute;
		inset: 0;
		z-index: 1;
		background: linear-gradient(180deg, rgb(15 15 17 / 40%), rgb(15 15 17 / 72%));
	}

	.home-banner.has-image h1 {
		color: var(--color-inverse);
	}

	.home-banner.has-image .lead {
		color: rgb(255 255 255 / 80%);
	}

	.home-banner.has-image .button {
		background: var(--color-inverse);
		color: var(--color-1);
		border-color: var(--color-inverse);
	}

	.home-banner.has-image .button:hover {
		background: var(--color-2);
		color: var(--color-inverse);
		border-color: var(--color-2);
	}

	.home-banner.has-image .button.secondary{background: transparent; color: var(--color-inverse); border-color: rgb(255 255 255 / 30%);}
	.home-banner.has-image .button.secondary:hover{background: var(--color-inverse); color: var(--color-1); border-color: var(--color-inverse);}
	.home-banner .small-print{margin-top: 26px; font-size: var(--xs); font-family: var(--accent-font); color: var(--color-3);}
	.home-banner.has-image .small-print{color: rgb(255 255 255 / 70%);}

	@media(max-width: 750px) {
		.home-banner {
			min-height: 0;
			padding: 70px 0;
		}
	}
</style>

<section class="home-banner<?= section_field('crb_banner_image') ? ' has-image' : ''; ?>" id="home">

	<?php if (section_field('crb_banner_image')) { ?>
		<img class="absolute-cover" src="<?= section_field('crb_banner_image'); ?>" alt="">
	<?php } ?>

	<div class="content-width">

		<?php if (section_field('crb_banner_eyebrow', 'Single page starter')) { ?>
			<span class="eyebrow fade-from-bottom"><?= section_field('crb_banner_eyebrow', 'Single page starter'); ?></span>
		<?php } ?>

		<?php if (section_field('crb_banner_title', 'A clean starting point for one page sites')) { ?>
			<h1 class="fade-from-bottom"><?= section_field('crb_banner_title', 'A clean starting point for one page sites'); ?></h1>
		<?php } ?>

		<?php if (section_field('crb_banner_text', 'Every block on this page is a shortcode with its own fields, so the content stays editable and the layout stays locked.')) { ?>
			<p class="lead fade-from-bottom"><?= section_field('crb_banner_text', 'Every block on this page is a shortcode with its own fields, so the content stays editable and the layout stays locked.'); ?></p>
		<?php } ?>

		<?php if (section_field('crb_banner_button_text', 'Get in touch') || section_field('crb_banner_button_2_text', 'Learn more')) { ?>
			<div class="button-container fade-from-bottom">
				<?php if (section_field('crb_banner_button_text', 'Get in touch')) { ?>
					<a class="button" href="<?= section_field('crb_banner_button_link', '#contact'); ?>"><?= section_field('crb_banner_button_text', 'Get in touch'); ?></a>
				<?php } ?>
				<?php if (section_field('crb_banner_button_2_text', 'Learn more')) { ?>
					<a class="button secondary" href="<?= section_field('crb_banner_button_2_link', '#about'); ?>"><?= section_field('crb_banner_button_2_text', 'Learn more'); ?></a>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if (section_field('crb_banner_small_print', '')) { ?>
			<p class="small-print fade-from-bottom"><?= section_field('crb_banner_small_print', ''); ?></p>
		<?php } ?>

	</div>
</section>