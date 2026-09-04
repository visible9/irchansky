<style type="text/css">
	.home-results .results-grid {
		--columns: 4;
		display: grid;
		grid-template-columns: repeat(var(--columns), 1fr);
		border-top: 1px solid var(--color-border);
		border-left: 1px solid var(--color-border);
	}

	/*Columns follow how many cards actually render. :where() keeps these at plain class specificity so the breakpoints below still win.*/
	.home-results .results-grid:where(:has(> :nth-child(1):nth-last-child(2))) {
		--columns: 2;
	}

	.home-results .results-grid:where(:has(> :nth-child(1):nth-last-child(3n))) {
		--columns: 3;
	}

	.home-results .results-grid:where(:has(> :nth-child(1):nth-last-child(4n))) {
		--columns: 4;
	}

	.home-results .result-cell {
		padding: 40px 28px 34px;
		border-right: 1px solid var(--color-border);
		border-bottom: 1px solid var(--color-border);
		border-top: 3px solid var(--color-2);
		background-color: var(--color-card);
		position: relative;
		z-index: 1;
	}

	.home-results .result-num {
		display: block;
		font-family: var(--heading-font);
		font-size: var(--xl);
		font-weight: 700;
		line-height: 1;
		letter-spacing: -.03em;
		color: var(--color-1);
	}

	.home-results .result-label {
		display: block;
		margin-top: 8px;
		font-size: var(--xs);
		color: var(--color-3);
	}

	.home-results .result-note {
		margin-top: 18px;
		font-size: var(--xs);
		color: var(--color-3);
	}

	@media(max-width: 1000px) {
		.home-results .results-grid {
			--columns: 2;
		}
	}

	@media(max-width: 750px) {
		.home-results .result-cell {
			padding: 30px 20px 26px;
		}
	}
</style>

<section class="home-results section-padding" id="results">
	<div class="content-width">

		<div class="results-grid">

			<?php foreach (
				section_field('crb_results_items', array(
					array('number' => '250+', 'label' => 'Pages shipped'),
					array('number' => '1.4s', 'label' => 'Median load time'),
					array('number' => '98', 'label' => 'Average Lighthouse score'),
					array('number' => '12', 'label' => 'Years in business')
				)) as $result
			) { ?>

				<?php if (!empty($result['number'])) { ?>
					<div class="result-cell fade-from-bottom">
						<span class="result-num"><?= $result['number']; ?></span>
						<?php if (!empty($result['label'])) { ?>
							<span class="result-label"><?= $result['label']; ?></span>
						<?php } ?>
					</div>
				<?php } ?>

			<?php } ?>

		</div>

		<?php if (section_field('crb_results_caption', 'Placeholder metrics — replace with real numbers before launch.')) { ?>
			<p class="result-note mono fade-from-bottom"><?= section_field('crb_results_caption', 'Placeholder metrics — replace with real numbers before launch.'); ?></p>
		<?php } ?>

	</div>
</section>

<script>
	(function() {
		let section = document.querySelector(".home-results");
		if (!section) {
			return;
		}
		let values = section.querySelectorAll(".result-num");
		let counted = false;

		/*Puts the commas back by hand. toLocaleString would follow the visitor's locale and could turn 1,250 into 1.250.*/
		function addThousands(text) {
			let parts = text.split(".");
			parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return parts.join(".");
		}

		/*Counts the first number found in the label up from zero and keeps whatever surrounds it, so "1.4s" and "250+" both work.*/
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

		function runCounters() {
			if (counted) {
				return;
			}
			if (section.getBoundingClientRect().top > (.85 * window.innerHeight)) {
				return;
			}
			counted = true;
			values.forEach(countUp);
		}

		window.addEventListener("load", runCounters);
		window.addEventListener("scroll", runCounters);
	})();
</script>