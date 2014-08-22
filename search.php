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
					<?php query_posts( array( 'post_type' => 'post','posts_per_page' => 5) ); ?>
					<?php if(have_posts()): while (have_posts()): the_post(); ?>
					<?php $category_name = top_level_cat(); ?>
					<?php $category_link = get_category_link(top_level_cat()); ?>
					<?php $format = get_post_format(); ?>

						<article class="medua column col-full <?php echo $category_name ?> <?php echo $format; ?>">
							<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
							<div class="image" style="background-image:url(<?php echo $url; ?>)">
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
									<span class="date"><?php the_time('m M Y'); ?></span>
								</div>
							</div>			
						</article>

					<?php endwhile; endif; ?>
				</div><!-- .articles.row -->

				<div class="pagination">
				<?php
				global $wp_query;

				$big = 999999999; // need an unlikely integer

				echo $wp_query->max_num_pages;

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

					<div class="sidebar-widget advert">
						
					</div>

					<div class="sidebar-widget list">
						<?php dynamic_sidebar('primary' ); ?>
					</div>
				</div><!-- #sidebar -->

			</div><!-- .inner-container -->
	</div><!-- #content -->

</div><!-- #search -->

<?php get_footer(); ?>