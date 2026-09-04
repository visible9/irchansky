<style type="text/css">
	.home-portfolio .portfolio-header{display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-end; gap: 24px; margin-bottom: 48px;}
	.home-portfolio .header-title{max-width: 660px;}
	.home-portfolio .header-title h2{margin: 0 0 14px;}
	.home-portfolio .header-title .lead{margin: 0;}
	.home-portfolio .portfolio-header .button-container{margin: 0;}
	.home-portfolio .portfolio-grid{--columns: 3; display: grid; grid-template-columns: repeat(var(--columns), 1fr); gap: 20px;}
	/*Columns follow how many cards actually render. :where() keeps these at plain class specificity so the breakpoints below still win.*/
	.home-portfolio .portfolio-grid:where(:has(> :nth-child(1):nth-last-child(2))){--columns: 2;}
	.home-portfolio .portfolio-grid:where(:has(> :nth-child(1):nth-last-child(4))){--columns: 2;}
	.home-portfolio .portfolio-item{position: relative; display: block; width: 100%; aspect-ratio: 4 / 3; padding: 0; margin: 0; background: var(--color-surface); border: 0; border-radius: var(--radius); overflow: hidden; cursor: pointer; text-align: left;}
	.home-portfolio .portfolio-item img{transition: transform .6s ease;}
	.home-portfolio .portfolio-item:after{content: ''; position: absolute; inset: 0; z-index: 1; background: linear-gradient(180deg, rgb(15 15 17 / 0%) 45%, rgb(15 15 17 / 74%)); transition: opacity var(--transition);}
	.home-portfolio .portfolio-item:hover img{transform: scale(1.05);}
	.home-portfolio .portfolio-item:focus-visible{outline: 2px solid var(--color-2); outline-offset: 3px;}
	.home-portfolio .item-info{position: absolute; left: 0; bottom: 0; z-index: 2; display: block; padding: 22px 24px;}
	.home-portfolio .item-category{display: block; font-family: var(--accent-font); font-size: var(--xs); font-weight: 600; letter-spacing: .12em; text-transform: uppercase; color: rgb(255 255 255 / 70%); margin-bottom: 6px;}
	.home-portfolio .item-title{display: block; font-family: var(--heading-font); font-size: var(--sm); font-weight: 600; line-height: 1.2; letter-spacing: -.02em; color: var(--color-inverse);}
	@media(max-width: 1000px){
		.home-portfolio .portfolio-header{margin-bottom: 34px;}
		.home-portfolio .portfolio-grid{--columns: 2; gap: 16px;}
		.home-portfolio .item-info{padding: 18px 20px;}
	}
	@media(max-width: 750px){
		.home-portfolio .portfolio-grid{--columns: 1; gap: 14px;}
	}

	/*The script moves the lightbox to the end of the body, so it is not scoped under .home-portfolio*/
	.portfolio-lightbox{position: fixed; inset: 0; z-index: 1000; display: none; align-items: center; justify-content: center; padding: 40px; background: rgb(15 15 17 / 94%);}
	.portfolio-lightbox.open{display: flex;}
	.portfolio-lightbox figure{max-width: 1100px; margin: 0; text-align: center;}
	.portfolio-lightbox .lightbox-image{max-height: calc(100vh - 200px); border-radius: var(--radius);}
	.portfolio-lightbox figcaption{display: block; padding-top: 18px;}
	.portfolio-lightbox .lightbox-category{display: block; font-family: var(--accent-font); font-size: var(--xs); font-weight: 600; letter-spacing: .12em; text-transform: uppercase; color: rgb(255 255 255 / 60%); margin-bottom: 6px;}
	.portfolio-lightbox .lightbox-title{display: block; font-family: var(--heading-font); font-size: var(--sm); font-weight: 600; color: var(--color-inverse);}
	.portfolio-lightbox button{position: absolute; z-index: 2; display: flex; align-items: center; justify-content: center; width: 48px; height: 48px; padding: 0; background: rgb(255 255 255 / 12%); color: var(--color-inverse); font-size: var(--sm); line-height: 1; border: 0; border-radius: 500px; cursor: pointer; transition: background var(--transition);}
	.portfolio-lightbox button:hover{background: var(--color-2);}
	.portfolio-lightbox .lightbox-close{top: 26px; right: 26px;}
	.portfolio-lightbox .lightbox-prev{top: 50%; left: 26px; transform: translateY(-50%);}
	.portfolio-lightbox .lightbox-next{top: 50%; right: 26px; transform: translateY(-50%);}
	body.portfolio-lightbox-open{overflow: hidden;}
	@media(max-width: 1000px){
		.portfolio-lightbox{padding: 24px;}
		.portfolio-lightbox button{width: 40px; height: 40px;}
		.portfolio-lightbox .lightbox-close{top: 16px; right: 16px;}
		.portfolio-lightbox .lightbox-prev{left: 12px;}
		.portfolio-lightbox .lightbox-next{right: 12px;}
	}
</style>
<section class="home-portfolio section-padding" id="portfolio">
	<div class="content-width">

		<?php if(section_field('crb_portfolio_eyebrow', 'Selected work') || section_field('crb_portfolio_title', 'A few pages we are happy to point at') || section_field('crb_portfolio_text', 'Click any tile to open it full size.') || section_field('crb_portfolio_button_text', 'Start a project')){ ?>
			<div class="portfolio-header">
				<div class="header-title fade-from-left">

					<?php if(section_field('crb_portfolio_eyebrow', 'Selected work')){ ?>
						<span class="eyebrow"><?= section_field('crb_portfolio_eyebrow', 'Selected work'); ?></span>
					<?php } ?>

					<?php if(section_field('crb_portfolio_title', 'A few pages we are happy to point at')){ ?>
						<h2><?= section_field('crb_portfolio_title', 'A few pages we are happy to point at'); ?></h2>
					<?php } ?>

					<?php if(section_field('crb_portfolio_text', 'Click any tile to open it full size.')){ ?>
						<p class="lead"><?= section_field('crb_portfolio_text', 'Click any tile to open it full size.'); ?></p>
					<?php } ?>

				</div>

				<?php if(section_field('crb_portfolio_button_text', 'Start a project')){ ?>
					<div class="button-container fade-from-right">
						<a class="button secondary" href="<?= section_field('crb_portfolio_button_link', '#contact'); ?>"><?= section_field('crb_portfolio_button_text', 'Start a project'); ?></a>
					</div>
				<?php } ?>

			</div>
		<?php } ?>

		<div class="portfolio-grid">

			<?php foreach(section_field('crb_portfolio_items', array(
				array('image' => get_template_directory_uri() . '/images/portfolio-1.svg', 'title' => 'Northline Studio', 'category' => 'Brand site'),
				array('image' => get_template_directory_uri() . '/images/portfolio-2.svg', 'title' => 'Halcyon Coffee', 'category' => 'Online shop'),
				array('image' => get_template_directory_uri() . '/images/portfolio-3.svg', 'title' => 'Merritt Architects', 'category' => 'Portfolio'),
				array('image' => get_template_directory_uri() . '/images/portfolio-4.svg', 'title' => 'Fieldnote', 'category' => 'Product launch'),
				array('image' => get_template_directory_uri() . '/images/portfolio-5.svg', 'title' => 'Oakbridge Clinic', 'category' => 'Booking site'),
				array('image' => get_template_directory_uri() . '/images/portfolio-6.svg', 'title' => 'Verso Type', 'category' => 'Type foundry')
			)) as $project){ ?>

				<?php if(!empty($project['title'])){ ?>
					<button class="portfolio-item fade-from-bottom" type="button">
						<?php if(!empty($project['image'])){ ?>
							<img class="absolute-cover" data-url="<?= $project['image']; ?>" alt="<?= $project['title']; ?>">
						<?php } ?>
						<span class="item-info">
							<?php if(!empty($project['category'])){ ?>
								<span class="item-category"><?= $project['category']; ?></span>
							<?php } ?>
							<span class="item-title"><?= $project['title']; ?></span>
						</span>
					</button>
				<?php } ?>

			<?php } ?>

		</div>

	</div>
</section>

<div class="portfolio-lightbox">
	<button class="lightbox-close" type="button" aria-label="Close">&times;</button>
	<button class="lightbox-prev" type="button" aria-label="Previous">&#8249;</button>
	<button class="lightbox-next" type="button" aria-label="Next">&#8250;</button>
	<figure>
		<img class="lightbox-image" alt="">
		<figcaption>
			<span class="lightbox-category"></span>
			<span class="lightbox-title"></span>
		</figcaption>
	</figure>
</div>

<script>
	(function(){
		let section = document.querySelector(".home-portfolio");
		let lightbox = document.querySelector(".portfolio-lightbox");
		if(!section || !lightbox){ return; }
		document.body.appendChild(lightbox); /*out of the section so no ancestor can clip it*/

		/*A tile with no image has nothing to open, so it stays out of the gallery and out of the prev/next order.*/
		let items = Array.from(section.querySelectorAll(".portfolio-item")).filter((item) => imageSource(item));
		let lightboxImage = lightbox.querySelector(".lightbox-image");
		let lightboxCategory = lightbox.querySelector(".lightbox-category");
		let lightboxTitle = lightbox.querySelector(".lightbox-title");
		let previousButton = lightbox.querySelector(".lightbox-prev");
		let nextButton = lightbox.querySelector(".lightbox-next");
		let currentIndex = 0;

		if(items.length < 2){
			previousButton.hidden = true;
			nextButton.hidden = true;
		}

		function imageSource(item){
			let image = item.querySelector("img");
			if(!image){ return ""; }
			return image.getAttribute("src") || image.getAttribute("data-url") || "";
		}

		function textOf(item, selector){
			let element = item.querySelector(selector);
			return element ? element.textContent : "";
		}

		function showItem(index){
			currentIndex = (index + items.length) % items.length;
			let item = items[currentIndex];
			lightboxImage.setAttribute("src", imageSource(item));
			lightboxImage.setAttribute("alt", textOf(item, ".item-title"));
			lightboxCategory.textContent = textOf(item, ".item-category");
			lightboxTitle.textContent = textOf(item, ".item-title");
		}

		function closeLightbox(){
			lightbox.classList.remove("open");
			document.body.classList.remove("portfolio-lightbox-open");
			lightboxImage.removeAttribute("src");
		}

		items.forEach((item, index)=>{
			item.addEventListener("click", ()=>{
				if(!imageSource(item)){ return; }
				showItem(index);
				lightbox.classList.add("open");
				document.body.classList.add("portfolio-lightbox-open");
			});
		});

		lightbox.querySelector(".lightbox-close").addEventListener("click", closeLightbox);
		previousButton.addEventListener("click", ()=>{ showItem(currentIndex - 1); });
		nextButton.addEventListener("click", ()=>{ showItem(currentIndex + 1); });
		lightbox.addEventListener("click", (event)=>{ if(event.target === lightbox){ closeLightbox(); } });

		document.addEventListener("keydown", (event)=>{
			if(!lightbox.classList.contains("open")){ return; }
			if(event.key === "Escape"){ closeLightbox(); }
			if(event.key === "ArrowLeft"){ showItem(currentIndex - 1); }
			if(event.key === "ArrowRight"){ showItem(currentIndex + 1); }
		});
	})();
</script>
