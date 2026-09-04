<style type="text/css">
	.home-social {
		border-top: 1px solid var(--color-border);
	}

	.home-social .social-strip:not(:has(*)) {
		display: none;
	}

	.home-social .social-strip {
		display: flex;
		align-items: center;
		justify-content: space-between;
		flex-wrap: wrap;
		gap: 24px;
	}

	.home-social .social-title {
		margin: 0 0 4px;
	}

	.home-social .social-handle {
		display: block;
		font-family: var(--accent-font);
		font-size: var(--xs);
		color: var(--color-3);
	}

	.home-social .social-icons {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		gap: 14px;
	}

	@media(max-width: 750px) {
		.home-social {
			padding: 40px 0;
		}

		.home-social .social-strip {
			gap: 20px;
		}
	}
</style>

<section class="home-social section-padding" id="social">
	<div class="content-width">
		<div class="social-strip fade-from-bottom">

			<?php if (section_field('crb_social_title', 'Follow the studio') || section_field('crb_social_handle', '@studio')) { ?>
				<div class="social-intro">
					<?php if (section_field('crb_social_title', 'Follow the studio')) { ?>
						<h4 class="social-title"><?= section_field('crb_social_title', 'Follow the studio'); ?></h4>
					<?php } ?>
					<?php if (section_field('crb_social_handle', '@studio')) { ?>
						<span class="social-handle"><?= section_field('crb_social_handle', '@studio'); ?></span>
					<?php } ?>
				</div>
			<?php } ?>

			<?php if (section_field('crb_social_links', array(
				array('network' => 'facebook', 'url' => '#'),
				array('network' => 'instagram', 'url' => '#'),
				array('network' => 'tiktok', 'url' => '#'),
				array('network' => 'x', 'url' => '#'),
				array('network' => 'whatsapp', 'url' => '#')
			))) { ?>
				<div class="social-icons">
					<?php foreach (
						section_field('crb_social_links', array(
							array('network' => 'facebook', 'url' => '#'),
							array('network' => 'instagram', 'url' => '#'),
							array('network' => 'tiktok', 'url' => '#'),
							array('network' => 'x', 'url' => '#'),
							array('network' => 'whatsapp', 'url' => '#')
						)) as $social
					) { ?>
						<?php if (!empty($social['url']) && social_icon($social['network'])) { ?>
							<a class="social-link" href="<?= $social['url']; ?>" target="_blank" rel="noopener" aria-label="<?= social_label($social['network']); ?>"><?= social_icon($social['network']); ?></a>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>

		</div>
	</div>
</section>