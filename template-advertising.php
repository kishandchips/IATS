<?php 
/*
	Template Name: Advertising
*/
?>
<?php get_header(); ?>

<div id="advertising">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<div id="content" class="section">
		<div class="inner-container">
			<header>
				<h2 class="title"><?php the_title(); ?></h2>
				<div class="inner">
					
						<?php the_content(); ?>
					
				</div>
			</header>

			<div class="adverts row">
				<?php if(have_rows('adverts')): while(have_rows('adverts')): the_row();?>		
					<div class="ad column col-1-3">
						<h3 class="title match-height"><?php the_sub_field('advert_title'); ?></h3>
						<img src="<?php the_sub_field('advert_image'); ?>">
					</div>
				<?php endwhile;endif; ?>
			</div>		
		</div><!-- .inner-container -->
	</div><!-- .section -->	
	<?php endwhile; endif; ?>
</div><!-- #advertising -->


<?php get_footer(); ?>