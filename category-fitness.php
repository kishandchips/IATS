<?php get_header(); ?>
	
<div id="fitness-archive">
	<header id="page-header" class="fitness">
		<h1 class="title">
		<i class="icon-badge"></i>
			Fitness
		</h1>	
	</header><!-- #page-header -->

	<div id="filters" class="inner-container">
		<span>Filter By: </span>
		<button aria-role="Filter All" data-filter="*" class="active">All</button>
		<button aria-role="Filter Nutrition" data-filter=".nutrition">Nutrition</button>
		<button aria-role="Filter Training" data-filter=".training">Training</button>
	</div><!-- #filters -->

	<div id="content" class="section">

		<button id="js-sidebar"><i class='icon-sidebar'></i></button>

		<div class="inner-container">	
			<div class="section-content column col-7">

			<div id="isotope" class="articles row">
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<?php $format = get_post_format(); ?>

					<article class="column col-1-3 <?php echo fitness_cat(); ?> <?php echo $format; ?>">
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' ); ?>
						<a href="<?php the_permalink(); ?> ">
								<?php if($image[0]): ?>
								<div class="image" style="background-image:url(<?php echo $image[0] ?>)">
								<?php else: ?>
								<div class="image placeholder">
								<?php endif; ?>
								
								<?php if($format == 'gallery'): ?>
									<?php $images = get_field('gallery', $post->ID) ?>
									<?php $count = count($images); ?>
									<span class="gallery-count"> 
										<i class="icon-gallery"></i>
										<span class="count">
										<?php echo $count; ?>
										</span>
									</span>
								<?php endif; ?>
							</div>
						</a>

						<div class="meta">
							<div class="category out">
								<p class="cat-title"><?php echo fitness_cat(); ?><i class="icon-badge"></i></p>
							</div>	
							<div class="title">
								<a href="<?php the_permalink(); ?>">
									<h2><?php the_title(); ?></h2>
								</a>
							</div>
							<div class="misc">
								<span class="date"><?php the_time('d M Y'); ?></span>
							</div>
						</div>		
					</article>
				<?php endwhile; endif; ?>
			</div><!-- #isotope -->

				<div class="pagination">
				<?php
					global $wp_query;

					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'prev_text' => __('<i class="icon-slider-left"></i>Previous'),
						'next_text' => __('Next <i class="icon-slider-right"></i>')
					) );
				?>
				</div><!-- .pagination -->

			</div><!-- .section-content -->

			<div id="sidebar" class="column col-3">
				<div class="sidebar-widget list">
					<?php dynamic_sidebar('primary' ); ?>
				</div>
			</div><!-- #sidebar -->

		</div><!-- .inner-container -->	
	</div><!-- #content -->

</div><!-- #fitness-archive -->

<?php get_footer(); ?>