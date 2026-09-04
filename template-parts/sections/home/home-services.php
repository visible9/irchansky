<style type="text/css">
	.home-services .services-header {
		max-width: 640px;
		margin-bottom: 56px;
	}

	.home-services .services-header h2 {
		margin: 0;
	}

	.home-services .items-list {
		display: flex;
		flex-direction: column;
		gap: 0;
		max-width: 760px;
	}

	.home-services .item-row {
		position: relative;
		padding: 0 0 48px 44px;
	}

	.home-services .item-row:last-child {
		padding-bottom: 0;
	}

	.home-services .item-row:before {
		content: "";
		position: absolute;
		left: -6px;
		top: 2px;
		width: 11px;
		height: 11px;
		border-radius: 50%;
		background: var(--color-2);
		border: 2px solid var(--color-bg);
		z-index: 1;
	}

	.home-services .item-row:not(:last-child):after {
		content: "";
		position: absolute;
		left: 1px;
		top: 2px;
		bottom: -7.5px;
		width: 1px;
		background: var(--color-border);
	}

	.home-services .item-tag {
		display: block;
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		letter-spacing: .1em;
		text-transform: uppercase;
		color: var(--color-3);
	}

	.home-services .item-row h3 {
		margin: 10px 0 0;
		font-size: var(--sm);
	}

	.home-services .item-row p {
		margin-top: 10px;
		color: var(--color-3);
	}

	@media(max-width: 750px) {
		.home-services .services-header {
			margin-bottom: 34px;
		}

		.home-services .item-row {
			padding: 0 0 34px 30px;
		}
	}
</style>

<section class="home-services section-padding" id="about">
	<div class="content-width">

		<?php if (section_field('crb_services_eyebrow', 'Our Background') || section_field('crb_services_title', 'Built in Kyiv')) { ?>
			<div class="services-header fade-from-bottom">

				<?php if (section_field('crb_services_eyebrow', 'Our Background')) { ?>
					<span class="eyebrow"><?= section_field('crb_services_eyebrow', 'Our Background'); ?></span>
				<?php } ?>

				<?php if (section_field('crb_services_title', 'Built in Kyiv')) { ?>
					<h2><?= section_field('crb_services_title', 'Built in Kyiv'); ?></h2>
				<?php } ?>

			</div>
		<?php } ?>

		<div class="items-list">

			<?php foreach (
				section_field('crb_services_items', array(
					array('tag' => 'Built in Kyiv', 'title' => 'A Kyiv-based web agency', 'text' => 'irchansky is a Kyiv-based web agency building thoughtful WordPress and ecommerce experiences, from first design to dependable maintenance.'),
					array('tag' => 'Web Agency', 'title' => 'For ambitious brands', 'text' => 'Building thoughtful WordPress and ecommerce experiences for ambitious brands, with reliable support from first idea to launch.'),
					array('tag' => 'Behind irchansky', 'title' => 'Meet Iry', 'text' => 'Led by Iry, a developer and CEO, our compact team keeps communication clear and progress visible.')
				)) as $item
			) { ?>

				<?php if (!empty($item['title'])) { ?>
					<div class="item-row fade-from-bottom">

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