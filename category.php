<?php get_header(); ?>
<?php $categoryid = top_level_cat(); ?>
<?php $category =  get_category($categoryid); ?>
<?php $category_name = strtolower($category->name); ?>
<?php $cat = strtolower(single_cat_title('',false)); ?>

<div id="category">
	<header id="page-header" class="<?php echo $cat ?>-bg">
		<h1 class="title">
			<i class="icon-badge"></i>
			<?php single_cat_title(); ?>
		</h1>	
	</header><!-- #page-header -->

	<div id="content" class="section">

			<button id="js-sidebar"><i class='icon-sidebar'></i></button>

			<div class="inner-container">	
				<div class="section-content column col-7">

					<div class="articles row">
						<?php $i = 0; ?>
						<?php if(have_posts()): while (have_posts()): the_post(); ?>
						<?php $categoryid = top_level_cat(); ?>
						<?php $category =  get_category($categoryid); ?>
						<?php $category_name = strtolower($category->name); ?>
						<?php $category_link = get_category_link($categoryid); ?>

						<?php $format = get_post_format(); ?>

							<?php if($i == 0): ?>
								<article class="main meta-inner column col-full <?php echo $category_name; ?> <?php echo $format; ?>">
							<?php else: ?>
								<article class="column col-1-2 <?php echo $category_name; ?> <?php echo $format; ?>">
							<?php endif; ?>
							
									<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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
									</a>

									<div class="meta">
										<div class="category out">
											<a href="<?php echo $category_link; ?>">
												<p class="cat-title"><?php echo $category_name; ?><i class="icon-badge"></i></p>										
											</a>
										</div>	
										<div class="title match-height">
											<a href="<?php the_permalink() ?>">
												<h2><?php the_title(); ?></h2>										
											</a>
										</div>
										<div class="misc">
											<span class="date"><?php the_time('m M Y'); ?></span>
										</div>
									</div>			
								</article>
							<?php $i++ ?>
						<?php endwhile; endif; ?>
						<?php wp_reset_query(); ?>
					</div><!-- .articles.row -->

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

					<div class="sidebar-widget advert">
						
					</div>

					<div class="sidebar-widget list">
						<?php dynamic_sidebar('primary' ); ?>
					</div>
				</div><!-- #sidebar -->

			</div><!-- .inner-container -->
	</div><!-- #content -->

</div><!-- #category -->

<?php get_footer(); ?>