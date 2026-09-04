<style type="text/css">
	/*Nothing to quote and nothing in the header means there is no section to show.*/
	.home-testimonials:not(:has(.testimonials-header > *, .testimonial)) {
		display: none;
	}

	.home-testimonials .testimonials-slider:not(:has(.testimonial)) {
		display: none;
	}

	.home-testimonials .testimonials-header {
		max-width: 720px;
		margin: 0 auto 44px;
		text-align: center;
	}

	.home-testimonials .testimonials-header h2 {
		margin: 0;
	}

	.home-testimonials .slider-viewport {
		overflow: hidden;
	}

	.home-testimonials .slider-track {
		display: flex;
		transition: transform .5s ease;
	}

	.home-testimonials .testimonial {
		flex: 0 0 100%;
		min-width: 100%;
		margin: 0;
		padding: 0 40px;
		text-align: center;
	}

	.home-testimonials .testimonial:before {
		content: '\201C';
		display: block;
		margin-bottom: 6px;
		font-family: var(--heading-font);
		font-size: var(--xl);
		line-height: .7;
		color: var(--color-2);
	}

	.home-testimonials .testimonial p {
		max-width: 820px;
		margin: 0 auto;
		font-family: var(--heading-font);
		font-size: var(--md);
		font-weight: 500;
		line-height: 1.4;
		letter-spacing: -.01em;
	}

	.home-testimonials .testimonial footer {
		margin-top: 26px;
	}

	.home-testimonials .testimonial-name {
		display: block;
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		letter-spacing: .12em;
		text-transform: uppercase;
	}

	.home-testimonials .testimonial-role {
		display: block;
		margin-top: 6px;
		font-size: var(--xs);
		color: var(--color-3);
	}

	.home-testimonials .slider-controls {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 18px;
		margin-top: 38px;
	}

	.home-testimonials .slider-prev,
	.home-testimonials .slider-next {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 44px;
		height: 44px;
		padding: 0;
		background: transparent;
		color: var(--color-1);
		font-size: var(--sm);
		line-height: 1;
		border: 1px solid var(--color-border);
		border-radius: 500px;
		cursor: pointer;
		transition: background var(--transition), border-color var(--transition), color var(--transition);
	}

	.home-testimonials .slider-prev:hover,
	.home-testimonials .slider-next:hover {
		background: var(--color-1);
		border-color: var(--color-1);
		color: var(--color-inverse);
	}

	.home-testimonials .slider-dots {
		display: flex;
		gap: 8px;
	}

	.home-testimonials .slider-dot {
		width: 8px;
		height: 8px;
		padding: 0;
		background: var(--color-border);
		border: 0;
		border-radius: 500px;
		cursor: pointer;
		transition: background var(--transition), transform var(--transition);
	}

	.home-testimonials .slider-dot.active {
		background: var(--color-1);
		transform: scale(1.35);
	}

	@media(max-width: 1000px) {
		.home-testimonials .testimonials-header {
			margin-bottom: 34px;
		}

		.home-testimonials .testimonial {
			padding: 0 20px;
		}
	}

	@media(max-width: 750px) {
		.home-testimonials .testimonial {
			padding: 0;
		}

		.home-testimonials .slider-controls {
			gap: 12px;
			margin-top: 28px;
		}

		.home-testimonials .slider-prev,
		.home-testimonials .slider-next {
			width: 40px;
			height: 40px;
		}
	}
</style>

<section class="home-testimonials surface section-padding" id="testimonials">
	<div class="content-width">

		<?php if (section_field('crb_testimonials_eyebrow', 'Kind words') || section_field('crb_testimonials_title', 'What it is like to work with us')) { ?>
			<div class="testimonials-header fade-from-bottom">

				<?php if (section_field('crb_testimonials_eyebrow', 'Kind words')) { ?>
					<span class="eyebrow"><?= section_field('crb_testimonials_eyebrow', 'Kind words'); ?></span>
				<?php } ?>

				<?php if (section_field('crb_testimonials_title', 'What it is like to work with us')) { ?>
					<h2><?= section_field('crb_testimonials_title', 'What it is like to work with us'); ?></h2>
				<?php } ?>

			</div>
		<?php } ?>

		<div class="testimonials-slider fade-in">

			<div class="slider-viewport">
				<div class="slider-track">

					<?php foreach (
						section_field('crb_testimonials_items', array(
							array('text' => 'They rebuilt the page in three weeks and it now loads in under a second on a phone. The part we did not expect is that we can edit all of it ourselves without breaking the layout.', 'name' => 'Elena Vasquez', 'role' => 'Marketing lead, Northline'),
							array('text' => 'We turned up with a folder of screenshots and no brief. What came back finally says what we actually do, in about a fifth of the words we had before.', 'name' => 'Daniel Boye', 'role' => 'Founder, Halcyon'),
							array('text' => 'Straight answers, no upselling, and the site has needed almost no maintenance since launch. That last part is worth more than it sounds.', 'name' => 'Sofia Grant', 'role' => 'Operations, Merritt')
						)) as $testimonial
					) { ?>

						<?php if (!empty($testimonial['text'])) { ?>
							<blockquote class="testimonial">
								<p><?= $testimonial['text']; ?></p>
								<?php if (!empty($testimonial['name']) || !empty($testimonial['role'])) { ?>
									<footer>
										<?php if (!empty($testimonial['name'])) { ?>
											<span class="testimonial-name"><?= $testimonial['name']; ?></span>
										<?php } ?>
										<?php if (!empty($testimonial['role'])) { ?>
											<span class="testimonial-role"><?= $testimonial['role']; ?></span>
										<?php } ?>
									</footer>
								<?php } ?>
							</blockquote>
						<?php } ?>

					<?php } ?>

				</div>
			</div>

			<div class="slider-controls">
				<button class="slider-prev" type="button" aria-label="Previous testimonial">&#8249;</button>
				<div class="slider-dots"></div>
				<button class="slider-next" type="button" aria-label="Next testimonial">&#8250;</button>
			</div>

		</div>

	</div>
</section>

<script>
	(function() {
		let slider = document.querySelector(".testimonials-slider");
		if (!slider) {
			return;
		}

		let track = slider.querySelector(".slider-track");
		let slides = track.querySelectorAll(".testimonial");
		let controls = slider.querySelector(".slider-controls");
		let dots = slider.querySelector(".slider-dots");
		let current = 0;

		/*One quote needs no controls, and none at all needs no slider.*/
		if (slides.length < 2) {
			controls.hidden = true;
			return;
		}

		function show(index) {
			current = (index + slides.length) % slides.length;
			track.style.transform = "translateX(-" + (current * 100) + "%)";
			dots.querySelectorAll(".slider-dot").forEach((dot, position) => {
				dot.classList.toggle("active", position === current);
			});
		}

		slides.forEach((slide, index) => {
			let dot = document.createElement("button");
			dot.type = "button";
			dot.className = "slider-dot";
			dot.setAttribute("aria-label", "Testimonial " + (index + 1));
			dot.addEventListener("click", () => {
				show(index);
			});
			dots.appendChild(dot);
		});

		slider.querySelector(".slider-prev").addEventListener("click", () => {
			show(current - 1);
		});
		slider.querySelector(".slider-next").addEventListener("click", () => {
			show(current + 1);
		});

		/*Swipe on touch screens, where the arrows are the least convenient thing on the page.*/
		let touchStart = 0;
		slider.addEventListener("touchstart", (event) => {
			touchStart = event.touches[0].clientX;
		}, {
			passive: true
		});
		slider.addEventListener("touchend", (event) => {
			let travelled = event.changedTouches[0].clientX - touchStart;
			if (Math.abs(travelled) < 40) {
				return;
			}
			show(travelled < 0 ? current + 1 : current - 1);
		});

		show(0);
	})();
</script>