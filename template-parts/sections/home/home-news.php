<style type="text/css">
	.home-news .news-header{max-width: 720px; margin: 0 auto 48px; text-align: center;}
	.home-news .news-header h2{margin: 0 0 14px;}
	.home-news .news-header .lead{margin: 0;}
	.home-news .news-grid{--columns: 3; display: grid; grid-template-columns: repeat(var(--columns), 1fr); gap: 24px;}
	/*Columns follow how many cards actually render. :where() keeps these at plain class specificity so the breakpoints below still win.*/
	.home-news .news-grid:where(:has(> :nth-child(1):nth-last-child(2))){--columns: 2;}
	.home-news .news-grid:where(:has(> :nth-child(1):nth-last-child(4))){--columns: 2;}
	.home-news .news-card{display: flex; flex-direction: column; background: var(--color-bg); color: inherit; border-radius: var(--radius); overflow: hidden; transition: transform var(--transition), box-shadow var(--transition);}
	.home-news .news-media{position: relative; aspect-ratio: 16 / 10; background: var(--color-surface);}
	.home-news .news-card img{transition: transform .6s ease;}
	.home-news .news-body{padding: 26px 26px 30px;}
	.home-news .news-date{display: block; font-family: var(--accent-font); font-size: var(--xs); font-weight: 600; letter-spacing: .12em; text-transform: uppercase; color: var(--color-3); margin-bottom: 12px;}
	.home-news .news-card h3{font-size: var(--sm); margin: 0 0 10px; transition: color var(--transition);}
	.home-news .news-card p{color: var(--color-3); margin: 0;}
	.home-news a.news-card:hover{transform: translateY(-3px); box-shadow: 0 14px 34px rgb(15 15 17 / 8%);}
	.home-news a.news-card:hover h3{color: var(--color-2);}
	.home-news a.news-card:hover img{transform: scale(1.04);}
	.home-news .button-container{justify-content: center; margin-top: 44px;}
	@media(max-width: 1000px){
		.home-news .news-header{margin-bottom: 34px;}
		.home-news .news-grid{gap: 16px;}
		.home-news .news-body{padding: 22px 20px 26px;}
	}
	@media(max-width: 750px){
		.home-news .news-grid{--columns: 1;}
		.home-news .button-container{margin-top: 30px;}
	}
</style>

<section class="home-news surface section-padding" id="news">
	<div class="content-width">

		<?php if(section_field('crb_news_eyebrow', 'From the blog') || section_field('crb_news_title', 'Notes on building for the web') || section_field('crb_news_text', 'Occasional writing about performance, content structure and keeping a site maintainable.')){ ?>
			<div class="news-header">

				<?php if(section_field('crb_news_eyebrow', 'From the blog')){ ?>
					<span class="eyebrow fade-from-bottom"><?= section_field('crb_news_eyebrow', 'From the blog'); ?></span>
				<?php } ?>

				<?php if(section_field('crb_news_title', 'Notes on building for the web')){ ?>
					<h2 class="fade-from-bottom"><?= section_field('crb_news_title', 'Notes on building for the web'); ?></h2>
				<?php } ?>

				<?php if(section_field('crb_news_text', 'Occasional writing about performance, content structure and keeping a site maintainable.')){ ?>
					<p class="lead fade-from-bottom"><?= section_field('crb_news_text', 'Occasional writing about performance, content structure and keeping a site maintainable.'); ?></p>
				<?php } ?>

			</div>
		<?php } ?>

		<div class="news-grid">

			<?php /*Real posts as soon as the blog has any. The demo cards below only run while it is empty.*/ ?>
			<?php foreach(get_posts(array('numberposts' => 3)) as $news_post){ ?>
				<a class="news-card fade-from-bottom" href="<?= get_permalink($news_post); ?>">
					<div class="news-media">
						<img class="absolute-cover" data-url="<?= get_the_post_thumbnail_url($news_post, 'large') ? get_the_post_thumbnail_url($news_post, 'large') : get_template_directory_uri() . '/images/news-1.svg'; ?>" alt="<?= get_the_title($news_post); ?>">
					</div>
					<div class="news-body">
						<span class="news-date"><?= get_the_date('', $news_post); ?></span>
						<h3><?= get_the_title($news_post); ?></h3>
						<?php if(get_the_excerpt($news_post)){ ?>
							<p><?= get_the_excerpt($news_post); ?></p>
						<?php } ?>
					</div>
				</a>
			<?php } ?>

			<?php if(!get_posts(array('numberposts' => 1, 'fields' => 'ids'))){ ?>

				<article class="news-card fade-from-bottom">
					<div class="news-media">
						<img class="absolute-cover" data-url="<?= get_template_directory_uri(); ?>/images/news-1.svg" alt="">
					</div>
					<div class="news-body">
						<span class="news-date">18 August 2026</span>
						<h3>Why a single page still needs a content plan</h3>
						<p>One page does not mean less thinking. It means deciding, up front, which three questions the visitor gets answered before they scroll away.</p>
					</div>
				</article>

				<article class="news-card fade-from-bottom">
					<div class="news-media">
						<img class="absolute-cover" data-url="<?= get_template_directory_uri(); ?>/images/news-2.svg" alt="">
					</div>
					<div class="news-body">
						<span class="news-date">2 August 2026</span>
						<h3>Self hosting fonts without hurting your layout</h3>
						<p>Two files, one preload and a sensible fallback stack. That is the whole trick to fast text that does not jump around while it loads.</p>
					</div>
				</article>

				<article class="news-card fade-from-bottom">
					<div class="news-media">
						<img class="absolute-cover" data-url="<?= get_template_directory_uri(); ?>/images/news-3.svg" alt="">
					</div>
					<div class="news-body">
						<span class="news-date">21 July 2026</span>
						<h3>The quiet cost of one more plugin</h3>
						<p>Every plugin adds queries, scripts and an update you now have to watch. Here is the test we run before installing anything at all.</p>
					</div>
				</article>

			<?php } ?>

		</div>

		<?php if(section_field('crb_news_button_text', 'Read the blog') && section_field('crb_news_button_link', get_option('page_for_posts') ? get_permalink(get_option('page_for_posts')) : '')){ ?>
			<div class="button-container fade-from-bottom">
				<a class="button secondary" href="<?= section_field('crb_news_button_link', get_option('page_for_posts') ? get_permalink(get_option('page_for_posts')) : ''); ?>"><?= section_field('crb_news_button_text', 'Read the blog'); ?></a>
			</div>
		<?php } ?>

	</div>
</section>
