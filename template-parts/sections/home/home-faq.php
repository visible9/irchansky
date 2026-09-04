<style type="text/css">
	/*No questions and no heading leaves nothing worth a section.*/
	.home-faq:not(:has(.faq-intro > *, .faq-item)){display: none;}
	.home-faq .faq-list:not(:has(.faq-item)){display: none;}
	.home-faq .faq-grid{display: grid; grid-template-columns: 1fr 1.4fr; gap: 60px; align-items: start;}
	.home-faq .faq-grid:where(:has(> .faq-intro:not(:has(*)))){grid-template-columns: 1fr;}
	.home-faq .faq-intro{position: sticky; top: calc(var(--header-height) + 40px);}
	.home-faq .faq-intro:not(:has(*)){display: none;}
	.home-faq .faq-intro h2{margin: 0 0 14px;}
	.home-faq .faq-intro .lead{margin: 0;}
	.home-faq .faq-list{border-top: 1px solid var(--color-border);}
	.home-faq .faq-item{border-bottom: 1px solid var(--color-border);}
	.home-faq .faq-item summary{display: flex; align-items: center; justify-content: space-between; gap: 24px; padding: 22px 0; list-style: none; cursor: pointer;}
	.home-faq .faq-item summary::-webkit-details-marker{display: none;}
	.home-faq .faq-question{font-family: var(--heading-font); font-size: var(--sm); font-weight: 600; line-height: 1.35; letter-spacing: -.01em; transition: color var(--transition);}
	.home-faq .faq-item summary:hover .faq-question{color: var(--color-2);}
	.home-faq .faq-marker{position: relative; flex: 0 0 auto; width: 20px; height: 20px;}
	.home-faq .faq-marker:before, .home-faq .faq-marker:after{content: ''; position: absolute; left: 50%; top: 50%; background: var(--color-1); transition: transform var(--transition), opacity var(--transition);}
	.home-faq .faq-marker:before{width: 14px; height: 2px; transform: translate(-50%, -50%);}
	.home-faq .faq-marker:after{width: 2px; height: 14px; transform: translate(-50%, -50%);}
	.home-faq .faq-item[open] .faq-marker:after{transform: translate(-50%, -50%) rotate(90deg); opacity: 0;}
	.home-faq .faq-answer{padding: 0 60px 26px 0; color: var(--color-3);}
	@media(max-width: 1000px){
		.home-faq .faq-grid{grid-template-columns: 1fr; gap: 34px;}
		.home-faq .faq-intro{position: static;}
	}
	@media(max-width: 750px){
		.home-faq .faq-item summary{gap: 16px; padding: 18px 0;}
		.home-faq .faq-answer{padding: 0 0 20px;}
	}
</style>

<section class="home-faq surface section-padding" id="faq">
	<div class="content-width">
		<div class="faq-grid">

			<div class="faq-intro fade-from-left">

				<?php if(section_field('crb_faq_eyebrow', 'FAQ')){ ?>
					<span class="eyebrow"><?= section_field('crb_faq_eyebrow', 'FAQ'); ?></span>
				<?php } ?>

				<?php if(section_field('crb_faq_title', 'The questions we get asked first')){ ?>
					<h2><?= section_field('crb_faq_title', 'The questions we get asked first'); ?></h2>
				<?php } ?>

				<?php if(section_field('crb_faq_text', 'Anything not covered here, ask us directly and we will answer the same day.')){ ?>
					<p class="lead"><?= section_field('crb_faq_text', 'Anything not covered here, ask us directly and we will answer the same day.'); ?></p>
				<?php } ?>

			</div>

			<div class="faq-list">

				<?php foreach(section_field('crb_faq_items', array(
					array('question' => 'How long does a single page site take?', 'answer' => '<p>Three to five weeks from the first call, assuming the content is ready. The build is rarely the slow part &mdash; deciding what the page has to say usually is.</p>'),
					array('question' => 'Can we edit the page ourselves afterwards?', 'answer' => '<p>Yes. Every block has its own fields, so text and images are yours to change. The layout stays locked, which is what keeps the page from drifting out of shape a year later.</p>'),
					array('question' => 'Do we need to pay for plugins?', 'answer' => '<p>No. The theme carries what it needs on its own. A form plugin is the only thing most projects add, and the free tier is usually enough.</p>'),
					array('question' => 'What if we want more pages later?', 'answer' => '<p>The same sections work on any page. If the site grows past a handful of pages we would move it onto the multi page build instead of stretching this one.</p>')
				)) as $entry){ ?>

					<?php if(!empty($entry['question'])){ ?>
						<details class="faq-item" name="faq">
							<summary>
								<span class="faq-question"><?= $entry['question']; ?></span>
								<span class="faq-marker"></span>
							</summary>
							<?php if(!empty($entry['answer'])){ ?>
								<div class="faq-answer"><?= $entry['answer']; ?></div>
							<?php } ?>
						</details>
					<?php } ?>

				<?php } ?>

			</div>

		</div>
	</div>
</section>
