<?php get_header(); ?>
<div id="search">

	<div id="content" class="section">
		
		<button id="js-sidebar"><i class='icon-sidebar'></i></button>

		<div class="inner-container">	
			<div class="section-content column col-7">
			<header>
				<h4 class="title">Search Results</h4>
			</header>
				<div class="articles row">
					<?php if(have_posts()): while (have_posts()): the_post(); ?>
					<?php $categoryid = top_level_cat(); ?>
					<?php $category =  get_category($categoryid); ?>
					<?php $category_name = strtolower($category->name); ?>
					<?php $category_link = get_category_link($categoryid); ?>
					<?php $format = get_post_format(); ?>

						<article class="medua column col-full <?php echo $category_name ?> <?php echo $format; ?>">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id()); ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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
									<a href="<?php echo $category_link; ?>">
										<p class="cat-title"><?php echo $category_name; ?><i class="icon-badge"></i></p>										
									</a>
								</div>	
								<div class="title">
									<a href="<?php the_permalink() ?>">
										<h2><?php the_title(); ?></h2>										
									</a>
								</div>
								<div class="misc">
									<span class="date"><?php the_time('d M Y'); ?></span>
								</div>
							</div>			
						</article>

					<?php endwhile; endif; ?>
				</div><!-- .articles.row -->

				<div class="pagination">
				<?php
				global $wp_query;

				$big = 999999999; // need an unlikely integer

				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages
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

</div><!-- #search -->

<?php get_footer(); ?>