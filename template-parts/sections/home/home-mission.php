<style type="text/css">
	.home-mission .services-header {
		max-width: 640px;
		margin-bottom: 56px;
	}

	.home-mission .services-header h2 {
		margin: 0;
	}

	.home-mission .services-header .lead {
		margin: 16px 0 0;
	}

	.home-mission .services-grid {
		--columns: 3;
		counter-reset: service;
		display: grid;
		grid-template-columns: repeat(var(--columns), 1fr);
		gap: 24px;
		position: relative;
		z-index: 2;
	}

	.home-mission .services-grid:where(:has(> :nth-child(1):nth-last-child(2))) {
		--columns: 2;
	}

	.home-mission .services-grid:where(:has(> :nth-child(1):nth-last-child(4))) {
		--columns: 2;
	}

	.home-mission .service-card {
		counter-increment: service;
		padding: 32px 26px;
		background: var(--color-card);
		border: 1px solid var(--color-border);
		border-radius: var(--radius);
	}

	.home-mission .service-card:before {
		content: counter(service, decimal-leading-zero);
		display: inline-flex;
		align-items: center;
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		background: var(--color-2);
		color: var(--color-on-accent);
		padding: 2px 10px;
		border-radius: 3px;
	}

	.home-mission .service-card .item-tag {
		display: block;
		margin-top: 14px;
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		letter-spacing: .1em;
		text-transform: uppercase;
		color: var(--color-3);
	}

	.home-mission .service-card h3 {
		margin: 14px 0 0;
		font-size: var(--sm);
	}

	.home-mission .service-card p {
		margin-top: 12px;
		color: var(--color-3);
	}

	@media(max-width: 1000px) {
		.home-mission .services-header {
			margin-bottom: 34px;
		}

		.home-mission .services-grid {
			--columns: 2;
			gap: 18px;
		}

		.home-mission .service-card {
			padding: 26px 22px;
		}
	}

	@media(max-width: 750px) {
		.home-mission .services-grid {
			--columns: 1;
			gap: 16px;
		}
	}
</style>

<section class="home-mission section-padding" id="services">
	<div class="content-width">

		<?php if (section_field('crb_mission_eyebrow', 'What We Do') || section_field('crb_mission_title', 'Design, development, and dependable maintenance') || section_field('crb_mission_text', 'For WordPress, ecommerce, and white-label digital projects.')) { ?>
			<div class="services-header fade-from-bottom">

				<?php if (section_field('crb_mission_eyebrow', 'What We Do')) { ?>
					<span class="eyebrow"><?= section_field('crb_mission_eyebrow', 'What We Do'); ?></span>
				<?php } ?>

				<?php if (section_field('crb_mission_title', 'Design, development, and dependable maintenance')) { ?>
					<h2><?= section_field('crb_mission_title', 'Design, development, and dependable maintenance'); ?></h2>
				<?php } ?>

				<?php if (section_field('crb_mission_text', 'For WordPress, ecommerce, and white-label digital projects.')) { ?>
					<p class="lead"><?= section_field('crb_mission_text', 'For WordPress, ecommerce, and white-label digital projects.'); ?></p>
				<?php } ?>

			</div>
		<?php } ?>

		<div class="services-grid">

			<?php foreach (
				section_field('crb_mission_items', array(
					array('tag' => '', 'title' => 'Design', 'text' => 'Thoughtful WordPress and ecommerce design for ambitious brands and their teams.'),
					array('tag' => '', 'title' => 'Development', 'text' => 'Building and improving WordPress and ecommerce websites, including white-label projects for partner agencies.'),
					array('tag' => '', 'title' => 'Maintenance', 'text' => 'Dependable, ongoing maintenance and support from first idea to launch, and after.')
				)) as $item
			) { ?>

				<?php if (!empty($item['title'])) { ?>
					<div class="service-card fade-from-bottom">

						<?php if (!empty($item['tag'])) { ?>
							<span class="item-tag"><?= $item['tag']; ?></span>
						<?php } ?>

						<h3><?= $item['title']; ?></h3>

						<?php if (!empty($item['text'])) { ?>
							<p><?= $item['text']; ?></p>
						<?php } ?>

					</div>
				<?php } ?>

			<?php } ?>

		</div>

	</div>
</section>