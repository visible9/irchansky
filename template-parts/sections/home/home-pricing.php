<?php $language = get_translation_data()['language']; ?>

<style type="text/css">
	.home-pricing {
		position: relative;
		z-index: 1;
	}

	.home-pricing .pricing-header {
		max-width: 640px;
		margin-bottom: 56px;
	}

	.home-pricing .pricing-header h2 {
		margin: 0;
	}

	.home-pricing .pricing-header .lead {
		margin: 16px 0 0;
	}

	.home-pricing .pricing-grid {
		--columns: 3;
		display: grid;
		grid-template-columns: repeat(var(--columns), 1fr);
		gap: 24px;
		align-items: stretch;
	}

	.home-pricing .pricing-grid:where(:has(> :nth-child(1):nth-last-child(2))) {
		--columns: 2;
	}

	.home-pricing .pricing-grid:where(:has(> :nth-child(1):nth-last-child(4))) {
		--columns: 2;
	}

	.home-pricing .price-card {
		display: flex;
		flex-direction: column;
		gap: 18px;
		padding: 32px 28px;
		background: var(--color-card);
		border: 1px solid var(--color-border);
		border-radius: var(--radius);
	}

	.home-pricing .price-card:not(:has(.price-amount)) {
		border-style: dashed;
	}

	.home-pricing .price-tier {
		display: flex;
		align-items: center;
		gap: 10px;
	}

	.home-pricing .tier-dots {
		display: flex;
		gap: 4px;
	}

	.home-pricing .tier-dot {
		width: 7px;
		height: 7px;
		border-radius: 50%;
		background: var(--color-border);
	}

	.home-pricing .tier-dot.is-active {
		background: var(--color-2);
	}

	.home-pricing .tier-label {
		font-family: var(--accent-font);
		font-size: var(--xxs);
		letter-spacing: .1em;
		text-transform: uppercase;
		color: var(--ink-faint);
	}

	.home-pricing .price-head {
		display: flex;
		align-items: baseline;
		justify-content: space-between;
		gap: 12px;
		flex-wrap: wrap;
	}

	.home-pricing .price-amount {
		font-family: var(--heading-font);
		font-size: var(--lg);
		font-weight: 700;
		color: var(--color-1);
	}

	.home-pricing .price-card h3 {
		margin: 0;
		font-size: var(--sm);
		line-height: 1.3;
	}

	.home-pricing .price-audience {
		margin: 0;
		font-size: var(--xs);
		color: var(--color-3);
	}

	.home-pricing .price-audience strong {
		color: var(--color-1);
		font-weight: 600;
	}

	.home-pricing .price-divider {
		height: 1px;
		background: var(--color-border);
	}

	.home-pricing .price-block strong {
		display: block;
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		letter-spacing: .08em;
		text-transform: uppercase;
		color: var(--color-3);
		margin-bottom: 5px;
	}

	.home-pricing .price-block p {
		margin: 0;
		font-size: var(--xs);
		color: var(--color-3);
	}

	.home-pricing .price-list {
		list-style: none;
		margin: 0;
		padding: 0;
		display: flex;
		flex-direction: column;
		gap: 9px;
	}

	.home-pricing .price-list li {
		display: flex;
		align-items: flex-start;
		gap: 9px;
		font-size: var(--xs);
		color: var(--color-3);
	}

	.home-pricing .check-badge {
		flex: none;
		width: 16px;
		height: 16px;
		margin-top: 2px;
		border-radius: 50%;
		background: var(--color-2);
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.home-pricing .check-badge svg {
		width: 9px;
		height: 9px;
		stroke: var(--color-on-accent);
		stroke-width: 3;
		fill: none;
		stroke-linecap: round;
		stroke-linejoin: round;
	}

	.home-pricing .price-steps {
		list-style: none;
		margin: 0;
		padding: 0;
		display: flex;
		flex-direction: column;
		gap: 9px;
		counter-reset: step;
	}

	.home-pricing .price-steps li {
		display: flex;
		align-items: flex-start;
		gap: 10px;
		font-size: var(--xs);
		color: var(--color-3);
	}

	.home-pricing .price-steps li:before {
		counter-increment: step;
		content: counter(step);
		flex: none;
		width: 22px;
		height: 22px;
		margin-top: -1px;
		border-radius: 50%;
		border: 1px solid var(--color-border);
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: var(--accent-font);
		font-size: var(--xs);
		color: var(--color-3);
	}

	.home-pricing .price-footer {
		margin-top: auto;
		padding-top: 6px;
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		justify-content: space-between;
		gap: 12px;
		flex-wrap: wrap;
	}

	.home-pricing .price-footer:not(:has(> *)) {
		display: none;
	}

	.home-pricing .price-footer .button {
		margin: 0;
		font-size: var(--default);
		font-weight: 500;
	}

	.home-pricing .price-limit {
		display: inline-flex;
		align-items: center;
		gap: 8px;
		font-family: var(--accent-font);
		font-size: var(--xs);
		color: var(--color-1);
		background: var(--color-bg);
		padding: 6px 12px;
		border: 1px solid var(--color-border);
		border-radius: 3px;
	}

	.home-pricing .price-limit:before {
		content: '';
		width: 6px;
		height: 6px;
		border-radius: 50%;
		background: var(--color-2);
		border: 1px solid var(--color-1);
	}

	@media(max-width: 1000px) {
		.home-pricing .pricing-header {
			margin-bottom: 34px;
		}

		.home-pricing .pricing-grid {
			--columns: 2;
			gap: 18px;
		}

		.home-pricing .price-card {
			padding: 26px 22px;
		}
	}

	@media(max-width: 750px) {
		.home-pricing .pricing-grid {
			--columns: 1;
			gap: 16px;
		}

		.home-pricing .price-footer {
			flex-direction: column;
			align-items: flex-start;
		}
	}
</style>

<section class="home-pricing section-padding" id="pricing">
	<div class="content-width">

		<?php if (section_field('crb_pricing_eyebrow', 'Pricing') || section_field('crb_pricing_title', 'Five ways to launch') || section_field('crb_pricing_text', 'From a same-day one-pager to a fully custom build, pick the level of hands-on support you need.')) { ?>
			<div class="pricing-header fade-from-bottom">

				<?php if (section_field('crb_pricing_eyebrow', 'Pricing')) { ?>
					<span class="eyebrow"><?= section_field('crb_pricing_eyebrow', 'Pricing'); ?></span>
				<?php } ?>

				<?php if (section_field('crb_pricing_title', 'Five ways to launch')) { ?>
					<h2><?= section_field('crb_pricing_title', 'Five ways to launch'); ?></h2>
				<?php } ?>

				<?php if (section_field('crb_pricing_text', 'From a same-day one-pager to a fully custom build, pick the level of hands-on support you need.')) { ?>
					<p class="lead"><?= section_field('crb_pricing_text', 'From a same-day one-pager to a fully custom build, pick the level of hands-on support you need.'); ?></p>
				<?php } ?>

			</div>
		<?php } ?>

		<div class="pricing-grid">

			<?php foreach (
				section_field('crb_pricing_items', array(
					array(
						'tier' => 'Lot 1 · Quick (Full DIY)',
						'level' => '1',
						'price' => '€199',
						'title' => 'Launch your one-page landing site in a couple of hours',
						'audience' => 'Experts, specialists and freelancers - psychologists, photographers, tutors, coaches, beauty professionals - who need a fast, stylish one-page site to link from a social bio or send to clients in a messenger.',
						'problem' => 'You need a beautiful website "yesterday", with no time to hire developers or learn complex tools.',
						'fix' => 'A ready-made, universal one-page landing template in a refined, minimalist style with smooth animations.',
						'show_how_it_works' => true,
						'how_it_works_items' => array(
							array('text' => 'Open the template and a short guide.'),
							array('text' => 'Swap the placeholder text and photos for your own.'),
							array('text' => 'Hit "Publish."'),
						),
						'show_can_do' => true,
						'can_do_items' => array(
							array('text' => '1 page with buttons linking to Telegram & messengers'),
							array('text' => 'Built-in inquiry form'),
							array('text' => 'Looks flawless on smartphones'),
						),
						'show_whats_inside' => false,
						'whats_inside_items' => array(),
						'limit' => 'Only 10 kits at this price',
						'button_text' => 'Book this package',
						'button_link' => '#contact',
					),
					array(
						'tier' => 'Lot 2 · Quick (Self-build, with support)',
						'level' => '1',
						'price' => '€399',
						'title' => 'Build your own portfolio site with confidence, backed by live chat',
						'audience' => 'Private-practice professionals and personal brands - lawyers, architects, consultants, interior designers - who have outgrown a single page and need a full portfolio site, but want real backup along the way.',
						'problem' => 'You want to build a multi-page site yourself from a ready template, but you are worried about getting stuck on settings or buttons.',
						'fix' => 'A universal portfolio-site template plus 14 days of direct chat support, where I answer any question you have.',
						'show_how_it_works' => false,
						'how_it_works_items' => array(),
						'show_can_do' => false,
						'can_do_items' => array(),
						'show_whats_inside' => true,
						'whats_inside_items' => array(
							array('text' => 'Up to 5 ready pages (Home, About, Services & Pricing, Portfolio / Testimonials, Contact)'),
							array('text' => 'Client inquiry forms & social media integration'),
							array('text' => 'Smooth, fully responsive mobile version'),
						),
						'limit' => '7 chat-supported spots left',
						'button_text' => 'Book this package',
						'button_link' => '#contact',
					),
					array(
						'tier' => 'Lot 3 · Package (Done for you)',
						'level' => '2',
						'price' => '€799',
						'title' => 'Full portfolio-site launch in 3 days, zero effort from you',
						'audience' => 'Small business owners, studios and agencies - workshops, local brands, cosy showrooms, education or beauty projects - who are buried in day-to-day work with no spare hour to build a site themselves.',
						'problem' => 'No desire to sit through instructions - you just want to hand over your materials and get a fully finished site.',
						'fix' => 'A turnkey launch on our universal minimalist template. You send photos and info, we handle the rest.',
						'show_how_it_works' => false,
						'how_it_works_items' => array(),
						'show_can_do' => false,
						'can_do_items' => array(),
						'show_whats_inside' => true,
						'whats_inside_items' => array(
							array('text' => '5 configured pages (Home, About the Company/Project, Service Details, FAQ, Contact)'),
							array('text' => 'Inquiry forms with instant email/Telegram notifications'),
							array('text' => 'Smooth scrolling + 14 days of support after handover'),
						),
						'limit' => 'Only 3 launch slots this week',
						'button_text' => 'Book this package',
						'button_link' => '#contact',
					),
					array(
						'tier' => 'Lot 4 · Package (Template + Marketing + Search)',
						'level' => '2',
						'price' => '€1,290',
						'title' => 'Portfolio site with copywriting and initial Google optimization',
						'audience' => 'Experts and higher-ticket businesses - signature courses, premium consultants, medical & aesthetic practices, architecture studios - for whom the copy needs to build the right premium impression, not just show photos.',
						'problem' => 'It is hard to write and structure your own copy so it matches a high-end service level and still reads easily.',
						'fix' => 'A launch on our template with your content edited for easy reading, plus technical optimization for Google.',
						'show_how_it_works' => false,
						'how_it_works_items' => array(),
						'show_can_do' => false,
						'can_do_items' => array(),
						'show_whats_inside' => true,
						'whats_inside_items' => array(
							array('text' => '5-7 pages, including a section for articles or additional services'),
							array('text' => 'Editing of your copy for clarity and tone'),
							array('text' => 'Fast page-load speed & search-engine setup'),
						),
						'limit' => 'Only 2 projects per month',
						'button_text' => 'Book this package',
						'button_link' => '#contact',
					),
					array(
						'tier' => 'Lot 5 · Deep (Premium Custom)',
						'level' => '3',
						'price' => '',
						'title' => 'Custom build from scratch: unique design + copywriting + Google optimization',
						'audience' => 'Discerning brands, premium experts and companies for whom templates categorically will not do - who want a presentation at the level of a concept boutique or a signature studio.',
						'problem' => '',
						'fix' => '',
						'show_how_it_works' => false,
						'how_it_works_items' => array(),
						'show_can_do' => false,
						'can_do_items' => array(),
						'show_whats_inside' => false,
						'whats_inside_items' => array(),
						'limit' => '',
						'button_text' => 'Book this package',
						'button_link' => '#contact',
					),
				)) as $item
			) { ?>

				<?php if (!empty($item['title'])) { ?>
					<div class="price-card fade-from-bottom">

						<?php if (!empty($item['tier'])) { ?>
							<div class="price-tier">
								<span class="tier-dots">
									<?php for ($dot = 1; $dot <= 3; $dot++) { ?>
										<span class="tier-dot<?= ($dot <= intval($item['level'])) ? ' is-active' : ''; ?>"></span>
									<?php } ?>
								</span>
								<span class="tier-label"><?= $item['tier']; ?></span>
							</div>
						<?php } ?>

						<?php if (!empty($item['price'])) { ?>
							<div class="price-head">
								<div class="price-amount"><?= $item['price']; ?></div>
							</div>
						<?php } ?>

						<h3><?= $item['title']; ?></h3>

						<?php if (!empty($item['audience'])) { ?>
							<p class="price-audience"><strong><?= 'english' === $language ? 'For:' : 'Для:'; ?></strong> <?= $item['audience']; ?></p>
						<?php } ?>

						<?php
						$has_how_it_works = !empty($item['show_how_it_works']) && !empty($item['how_it_works_items']);
						$has_can_do = !empty($item['show_can_do']) && !empty($item['can_do_items']);
						$has_whats_inside = !empty($item['show_whats_inside']) && !empty($item['whats_inside_items']);
						?>

						<?php if (!empty($item['problem']) || !empty($item['fix']) || $has_how_it_works || $has_can_do || $has_whats_inside) { ?>

							<div class="price-divider"></div>

							<?php if (!empty($item['problem'])) { ?>
								<div class="price-block">
									<strong><?= 'english' === $language ? 'The Problem' : 'Проблема'; ?></strong>
									<p><?= $item['problem']; ?></p>
								</div>
							<?php } ?>

							<?php if (!empty($item['fix'])) { ?>
								<div class="price-block">
									<strong><?= 'english' === $language ? 'The Fix' : 'Рішення'; ?></strong>
									<p><?= $item['fix']; ?></p>
								</div>
							<?php } ?>

							<?php if ($has_how_it_works) { ?>
								<div class="price-block">
									<strong><?= 'english' === $language ? 'How It Works' : 'Як це працює'; ?></strong>
									<ol class="price-steps">
										<?php foreach ($item['how_it_works_items'] as $step) { ?>
											<?php if (!empty($step['text'])) { ?>
												<li><?= $step['text']; ?></li>
											<?php } ?>
										<?php } ?>
									</ol>
								</div>
							<?php } ?>

							<?php if ($has_can_do) { ?>
								<div class="price-block">
									<strong><?= 'english' === $language ? 'What The Site Can Do' : 'Що вміє сайт'; ?></strong>
									<ul class="price-list">
										<?php foreach ($item['can_do_items'] as $can_do_item) { ?>
											<?php if (!empty($can_do_item['text'])) { ?>
												<li>
													<span class="check-badge"><svg viewBox="0 0 24 24">
															<polyline points="20 6 9 17 4 12"></polyline>
														</svg></span>
													<?= $can_do_item['text']; ?>
												</li>
											<?php } ?>
										<?php } ?>
									</ul>
								</div>
							<?php } ?>

							<?php if ($has_whats_inside) { ?>
								<div class="price-block">
									<strong><?= 'english' === $language ? "What's Inside" : 'Що входить'; ?></strong>
									<ul class="price-list">
										<?php foreach ($item['whats_inside_items'] as $inside_item) { ?>
											<?php if (!empty($inside_item['text'])) { ?>
												<li>
													<span class="check-badge"><svg viewBox="0 0 24 24">
															<polyline points="20 6 9 17 4 12"></polyline>
														</svg></span>
													<?= $inside_item['text']; ?>
												</li>
											<?php } ?>
										<?php } ?>
									</ul>
								</div>
							<?php } ?>

						<?php } ?>

						<div class="price-footer">

							<?php if (!empty($item['limit'])) { ?>
								<span class="price-limit"><?= $item['limit']; ?></span>
							<?php } ?>

							<?php if (!empty($item['button_text'])) { ?>
								<a class="button secondary" href="<?= !empty($item['button_link']) ? $item['button_link'] : '#contact'; ?>" target="_blank" rel="noopener"><?= $item['button_text']; ?></a>
							<?php } ?>

						</div>

					</div>
				<?php } ?>

			<?php } ?>

		</div>

	</div>
</section>