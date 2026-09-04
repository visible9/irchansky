<style type="text/css">
	.home-about {
		position: relative;
		z-index: 2;
	}

	.home-about .about-grid {
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 64px;
		align-items: center;
	}

	.home-about.no-image .about-grid {
		grid-template-columns: 1fr;
		max-width: 780px;
	}

	.home-about.image-right .about-media {
		order: 2;
	}

	.home-about.image-right .about-content {
		order: 1;
	}

	.home-about .about-media {
		position: relative;
		aspect-ratio: 4 / 5;
		border-radius: var(--radius);
		overflow: hidden;
		background: var(--color-surface);
	}

	.home-about .about-media .absolute-cover {
		object-position: 80%;
	}

	.home-about .about-content h2 {
		margin: 0 0 18px;
	}

	.home-about .about-content .lead {
		margin: 0 0 22px;
	}

	.home-about .about-stats {
		display: flex;
		flex-wrap: wrap;
		gap: 40px;
		margin-top: 36px;
		padding-top: 36px;
		border-top: 1px solid var(--color-border);
	}

	.home-about .about-stat {
		display: flex;
		flex-direction: column;
		gap: 6px;
	}

	.home-about .stat-value {
		font-family: var(--heading-font);
		font-size: var(--md);
		font-weight: 600;
		line-height: 1;
		letter-spacing: -.02em;
	}

	.home-about .stat-label {
		font-size: var(--xs);
		color: var(--color-3);
		line-height: 1.4;
	}

	.home-about .button-container {
		margin-top: 36px;
	}

	.home-about.no-image .about-grid:has(> .about-content > .about-body:only-child) {
		max-width: none;
	}

	.home-about .about-content:has(> .about-body:only-child) {
		text-align: center;
		max-width: 900px;
		margin: 0 auto;
	}

	.home-about .about-content:has(> .about-body:only-child) .about-body p {
		margin: 0;
		font-family: var(--heading-font);
		font-weight: 500;
		line-height: 1.35;
		font-size: clamp(var(--sm), 3.2vw, var(--lg));
	}

	@media(max-width: 1000px) {
		.home-about .about-grid {
			gap: 40px;
		}

		.home-about .about-stats {
			gap: 28px;
			margin-top: 28px;
			padding-top: 28px;
		}
	}

	@media(max-width: 750px) {
		.home-about .about-grid {
			grid-template-columns: 1fr;
			gap: 30px;
		}

		.home-about .about-media {
			aspect-ratio: 3 / 2;
		}
	}
</style>

<section class="home-about section-padding<?= section_field('crb_about_image', get_template_directory_uri() . '/images/about.webp') ? '' : ' no-image'; ?><?= section_field('crb_about_layout', 'left') === 'right' ? ' image-right' : ''; ?>" id="about">
	<div class="content-width">
		<div class="about-grid">

			<?php if (section_field('crb_about_image', get_template_directory_uri() . '/images/about.webp')) { ?>
				<div class="about-media fade-from-left">
					<img class="absolute-cover" data-url="<?= section_field('crb_about_image', get_template_directory_uri() . '/images/about.webp'); ?>" alt="">
				</div>
			<?php } ?>

			<div class="about-content fade-from-right">

				<?php if (section_field('crb_about_eyebrow', 'About us')) { ?>
					<span class="eyebrow"><?= section_field('crb_about_eyebrow', 'About us'); ?></span>
				<?php } ?>

				<?php if (section_field('crb_about_title', 'A small team building calm, fast websites')) { ?>
					<h2><?= section_field('crb_about_title', 'A small team building calm, fast websites'); ?></h2>
				<?php } ?>

				<?php if (section_field('crb_about_text', 'We design and build single page sites that load quickly, read clearly and stay easy to edit.')) { ?>
					<p class="lead"><?= section_field('crb_about_text', 'We design and build single page sites that load quickly, read clearly and stay easy to edit.'); ?></p>
				<?php } ?>

				<?php if (section_field('crb_about_body', '<p>Every project starts with the content. We shape the structure around what you actually need to say, then wrap it in a layout that stays out of the way — no stock effects, no clutter, nothing that slows the page down.</p><p>The result is a site your team can update without touching the design.</p>')) { ?>
					<div class="about-body"><?= section_field('crb_about_body', '<p>Every project starts with the content. We shape the structure around what you actually need to say, then wrap it in a layout that stays out of the way — no stock effects, no clutter, nothing that slows the page down.</p><p>The result is a site your team can update without touching the design.</p>'); ?></div>
				<?php } ?>

				<?php if (section_field('crb_about_stat_1_value', '12+') || section_field('crb_about_stat_2_value', '180') || section_field('crb_about_stat_3_value', '98%')) { ?>
					<div class="about-stats">
						<?php if (section_field('crb_about_stat_1_value', '12+')) { ?>
							<div class="about-stat">
								<span class="stat-value"><?= section_field('crb_about_stat_1_value', '12+'); ?></span>
								<?php if (section_field('crb_about_stat_1_label', 'Years of experience')) { ?>
									<span class="stat-label"><?= section_field('crb_about_stat_1_label', 'Years of experience'); ?></span>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if (section_field('crb_about_stat_2_value', '180')) { ?>
							<div class="about-stat">
								<span class="stat-value"><?= section_field('crb_about_stat_2_value', '180'); ?></span>
								<?php if (section_field('crb_about_stat_2_label', 'Projects delivered')) { ?>
									<span class="stat-label"><?= section_field('crb_about_stat_2_label', 'Projects delivered'); ?></span>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if (section_field('crb_about_stat_3_value', '98%')) { ?>
							<div class="about-stat">
								<span class="stat-value"><?= section_field('crb_about_stat_3_value', '98%'); ?></span>
								<?php if (section_field('crb_about_stat_3_label', 'Clients who come back')) { ?>
									<span class="stat-label"><?= section_field('crb_about_stat_3_label', 'Clients who come back'); ?></span>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>

				<?php if (section_field('crb_about_button_text', 'Talk to us')) { ?>
					<div class="button-container">
						<a class="button" href="<?= section_field('crb_about_button_link', '#contact'); ?>"><?= section_field('crb_about_button_text', 'Talk to us'); ?></a>
					</div>
				<?php } ?>

			</div>

		</div>
	</div>
</section>

<script>
	(function() {
		let statsContainer = document.querySelector(".home-about .about-stats");
		if (!statsContainer) {
			return;
		}
		let values = statsContainer.querySelectorAll(".stat-value");

		/*Puts the commas back by hand. toLocaleString would follow the visitor's locale and could turn 1,250 into 1.250.*/
		function addThousands(text) {
			let parts = text.split(".");
			parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return parts.join(".");
		}

		/*Counts the first number found in the label up from zero and keeps whatever surrounds it, so "12+" and "98%" both work.*/
		function countUp(element) {
			let text = element.textContent;
			let match = text.match(/[\d.,]+/);
			if (!match) {
				return;
			}
			let digits = match[0].replace(/,/g, "");
			let target = parseFloat(digits);
			if (isNaN(target)) {
				return;
			}
			let decimals = digits.indexOf(".") === -1 ? 0 : digits.split(".")[1].length;
			let grouped = match[0].indexOf(",") !== -1;
			let prefix = text.slice(0, match.index);
			let suffix = text.slice(match.index + match[0].length);
			let startedAt = performance.now();

			function step(now) {
				let progress = Math.min((now - startedAt) / 1400, 1);
				let current = target * (1 - Math.pow(1 - progress, 3));
				let shown = current.toFixed(decimals);
				if (grouped) {
					shown = addThousands(shown);
				}
				element.textContent = prefix + shown + suffix;
				if (progress < 1) {
					requestAnimationFrame(step);
				}
			}

			requestAnimationFrame(step);
		}

		let observer = new IntersectionObserver(function(entries, observer) {
			entries.forEach(function(entry) {
				if (!entry.isIntersecting) {
					return;
				}
				values.forEach(countUp);
				observer.disconnect();
			});
		}, {
			threshold: 0,
			rootMargin: "0px 0px -15% 0px"
		});

		observer.observe(statsContainer);
	})();
</script>