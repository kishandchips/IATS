<?php get_header(); ?>
<?php $team1 = get_field('select_team'); ?>
<?php $team2 = get_field('select_team2'); ?>
<?php $team1_id = $team1->ID; ?>
<?php $team2_id = $team2->ID; ?>
	
<div id="live">
	<header id="page-header" class="live-bg">
		<h1 class="title">
		<i class="icon-badge"></i>
			IATS Live
		</h1>	
	</header><!-- #page-header -->

	<div id="content" class="section">
		<div class="inner-container">

			<div class="slide-right">
				<div class="match-stats">
					<p class="category"><?php the_title(); ?></p>
					<p class="kickoff"><?php echo get_field('kickoff'); ?></p>
					<p class="period"><?php echo get_field('match_time'); ?></p>

					<div class="statistics row">
						<div class="column col-1">
							<?php echo get_the_post_thumbnail( $team1_id); ?> 
						</div>

						<div class="column col-4-5">
							<div class="row">
								<div class="column col-2-5">
									<p class="team-name"><?php echo get_the_title($team1_id ); ?></p>
								</div>
								<div class="column col-1-5">
									<p class="team-score">
										<?php echo get_field('team_score'); ?>
										-
										<?php echo get_field('team_score2' ); ?>
									</p>
								</div>
								<div class="column col-2-5">
									<p class="team-name"><?php echo get_the_title($team2_id ); ?></p>
								</div>
							</div>
							<div class="padding row">
								<div class="column col-2-5">
									<span class="stat-players"><?php echo get_field('team_tries'); ?></span>
								</div>
								<div class="column col-1-5">
									<span class="stat">Tries</span>
								</div>
								<div class="column col-2-5">
									<span class="stat-players"><?php echo get_field('team_tries2'); ?></span>
								</div>
							</div>
							<div class="padding row">
								<div class="column col-2-5">
									<span class="stat-players"><?php echo get_field('team_conversions'); ?></span>
								</div>
								<div class="column col-1-5">
									<span class="stat">Conversions</span>
								</div>
								<div class="column col-2-5">
									<span class="stat-players"><?php echo get_field('team_conversions2'); ?></span>
								</div>
							</div>
							<div class="padding row">
								<div class="column col-2-5">
									<span class="stat-players"><?php echo get_field('team_penalties'); ?></span>
								</div>
								<div class="column col-1-5">
									<span class="stat">Penalties</span>
								</div>
								<div class="column col-2-5">
									<span class="stat-players"><?php echo get_field('team_penalties2'); ?></span>
								</div>
							</div>
						</div>

						<div class="column col-1">
							<?php echo get_the_post_thumbnail( $team2_id); ?> 
						</div>
					</div><!-- .statistics -->
				</div><!-- .match-stats -->				
			</div>


			<div class="match-notice">
				<div class="notices">
					<?php the_content(); ?>	
				</div>
			</div>
			<?php comments_template( ); ?>
		</div>
	</div><!-- #content -->

</div><!-- #live -->
<?php get_footer(); ?>