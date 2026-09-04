<style type="text/css">
	.home-team .team-header{max-width: 680px; margin-bottom: 50px;}
	.home-team .team-header h2{margin: 0 0 14px;}
	.home-team .team-header .lead{margin: 0;}
	.home-team .team-grid{--columns: 4; display: grid; grid-template-columns: repeat(var(--columns), 1fr); gap: 24px;}
	/*Columns follow how many cards actually render. :where() keeps these at plain class specificity so the breakpoints below still win.*/
	.home-team .team-grid:where(:has(> :nth-child(1):nth-last-child(2))){--columns: 2;}
	.home-team .team-grid:where(:has(> :nth-child(1):nth-last-child(3n))){--columns: 3;}
	.home-team .team-grid:where(:has(> :nth-child(1):nth-last-child(4n))){--columns: 4;}
	.home-team .member-photo{position: relative; aspect-ratio: 4 / 5; background: var(--color-surface); border-radius: var(--radius); overflow: hidden;}
	.home-team .member-photo img{transition: transform .6s ease;}
	.home-team .team-member:hover img{transform: scale(1.04);}
	.home-team .member-info{padding-top: 18px;}
	.home-team .team-member h3{font-size: var(--sm); margin: 0 0 4px;}
	.home-team .member-role{display: block; font-family: var(--accent-font); font-size: var(--xs); font-weight: 500; letter-spacing: .04em; color: var(--color-3);}
	.home-team .member-socials{display: flex; flex-wrap: wrap; gap: 8px; margin-top: 14px;}
	.home-team .member-social{display: flex; align-items: center; justify-content: center; width: 34px; height: 34px; background: var(--color-1); color: var(--color-inverse); border: 1px solid var(--color-1); border-radius: 500px; transition: background var(--transition), border-color var(--transition), color var(--transition);}
	.home-team .member-social:hover{background: var(--color-2); border-color: var(--color-2); color: var(--color-inverse);}
	.home-team .member-social svg{width: 16px; height: 16px;}
	@media(max-width: 1000px){
		.home-team .team-header{margin-bottom: 34px;}
		.home-team .team-grid{--columns: 2; gap: 20px;}
	}
	@media(max-width: 750px){
		.home-team .team-grid{gap: 14px;}
		.home-team .member-info{padding-top: 14px;}
		.home-team .member-social{width: 30px; height: 30px;}
	}
</style>

<section class="home-team section-padding" id="team">
	<div class="content-width">

		<?php if(section_field('crb_team_eyebrow', 'The team') || section_field('crb_team_title', 'The people who will actually do the work') || section_field('crb_team_text', 'Small on purpose. You talk to the same people from the first call through to launch.')){ ?>
			<div class="team-header fade-from-left">

				<?php if(section_field('crb_team_eyebrow', 'The team')){ ?>
					<span class="eyebrow"><?= section_field('crb_team_eyebrow', 'The team'); ?></span>
				<?php } ?>

				<?php if(section_field('crb_team_title', 'The people who will actually do the work')){ ?>
					<h2><?= section_field('crb_team_title', 'The people who will actually do the work'); ?></h2>
				<?php } ?>

				<?php if(section_field('crb_team_text', 'Small on purpose. You talk to the same people from the first call through to launch.')){ ?>
					<p class="lead"><?= section_field('crb_team_text', 'Small on purpose. You talk to the same people from the first call through to launch.'); ?></p>
				<?php } ?>

			</div>
		<?php } ?>

		<div class="team-grid">

			<?php foreach(section_field('crb_team_members', array(
			array('photo' => get_template_directory_uri() . '/images/team-1.svg', 'name' => 'Ava Lindqvist', 'role' => 'Founder, strategy', 'socials' => array(array('network' => 'linkedin', 'url' => '#'), array('network' => 'x', 'url' => '#'))),
			array('photo' => get_template_directory_uri() . '/images/team-2.svg', 'name' => 'Marcus Reed', 'role' => 'Design lead', 'socials' => array(array('network' => 'instagram', 'url' => '#'), array('network' => 'linkedin', 'url' => '#'))),
			array('photo' => get_template_directory_uri() . '/images/team-3.svg', 'name' => 'Priya Raman', 'role' => 'Front end', 'socials' => array(array('network' => 'linkedin', 'url' => '#'))),
			array('photo' => get_template_directory_uri() . '/images/team-4.svg', 'name' => 'Tom Okafor', 'role' => 'Content', 'socials' => array(array('network' => 'facebook', 'url' => '#'), array('network' => 'telegram', 'url' => '#')))
			)) as $member){ ?>

				<?php if(!empty($member['name'])){ ?>
					<article class="team-member fade-from-bottom">

						<div class="member-photo">
							<?php if(!empty($member['photo'])){ ?>
								<img class="absolute-cover" data-url="<?= $member['photo']; ?>" alt="<?= $member['name']; ?>">
							<?php } ?>
						</div>

						<div class="member-info">

							<h3><?= $member['name']; ?></h3>

							<?php if(!empty($member['role'])){ ?>
								<span class="member-role"><?= $member['role']; ?></span>
							<?php } ?>

							<?php if(!empty($member['socials'])){ ?>
								<div class="member-socials">
									<?php foreach($member['socials'] as $social){ ?>
										<?php if(!empty($social['url']) && social_icon($social['network'])){ ?>
											<a class="member-social" href="<?= $social['url']; ?>" target="_blank" rel="noopener" aria-label="<?= social_label($social['network']); ?>"><?= social_icon($social['network']); ?></a>
										<?php } ?>
									<?php } ?>
								</div>
							<?php } ?>

						</div>

					</article>
				<?php } ?>

			<?php } ?>

		</div>

	</div>
</section>
