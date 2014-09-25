<?php get_header(); ?>
<?php 
$category = get_queried_object();
$cat_parent = $category->category_parent;
	if($cat_parent == 0){
		$cat_name = strtolower(get_cat_name($category->term_id));
	} else {
		$cat_name = strtolower(get_cat_name($category->category_parent));
	}
?>

<div id="category">
	<header id="page-header" class="<?php echo $cat_name ?>">
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
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(),'large' ); ?>
							<?php else: ?>
								<article  class="column col-1-2 <?php echo $category_name; ?> <?php echo $format; ?>">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(),'grid' ); ?>
							<?php endif; ?>
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

									<div data-mh="grid" class="meta match-height">
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
					<div class="sidebar-widget list">
						<?php dynamic_sidebar('secondary' ); ?>
					</div>
				</div><!-- #sidebar -->

			</div><!-- .inner-container -->
	</div><!-- #content -->

<!--     <div class="advertisement">
        <div class="leaderboard">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<ins class="adsbygoogle"
			     style="display:inline-block;width:728px;height:90px"
			     data-ad-client="ca-pub-1566926890494756"
			     data-ad-slot="7832779426"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>            
        </div>
    </div> -->
 
	<?php  
		$cat = get_query_var('cat');
		$yourcat = get_category ($cat);
		$yourcat->slug;
	?>

	<section class="section medialight-bg">
		<div class="inner-container">
			<header>

				<h4 class="sub-title">Latest Media</h4>
			</header>
		</div><!-- .inner-container -->

			<div class="slider three">
				<ul class="slides">
				<?php
					$offset = 0; 
					$slides = 0; 
				?>
				<?php while($slides <= 1 ): ?>

				<?php 
					$args = array(
						'offset' => $offset,
						'posts_per_page'	=> 3,
						'category_name' => $yourcat->slug,
						'tax_query' => array(
		                    array(
		                        'taxonomy' => 'post_format',
		                        'field' => 'slug',
		                        'terms' => array( 'post-format-video' )
		                    )
		                )
					);
				
				$related_media = new WP_Query( $args );
				 ?>

				<?php if($related_media->have_posts()): ?>
					<li class="clearfix">

						<?php while($related_media->have_posts()): $related_media->the_post(); ?>
						<?php $categoryid = top_level_cat(); ?>
						<?php $category =  get_category($categoryid); ?>
						<?php $category_name = strtolower($category->name); ?>
						<?php $category_link = get_category_link($categoryid); ?>

						<?php $format = get_post_format(); ?>

						<article class="slide-col column col-1-3 <?php echo $category_name ?> <?php echo $format; ?>">
							<article class="single">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(),'grid' ); ?>
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

								<div data-mh="media-grid" class="meta match-height">
									<div class="category out">
										<a href="<?php echo $category_link ?>"><!-- CATEGORY LINK -->
											<p class="cat-title"><?php echo $category_name ?><i class="icon-badge"></i></p>										
										</a>
									</div>	
									<div  class="title">
										<a href="<?php the_permalink(); ?>"><!-- POST LINK -->
											<h2><?php the_title(); ?></h2>
										</a>
									</div>
									<div class="misc">
										<span class="date"><?php the_time('d M Y'); ?></span>
									</div>
								</div>				
							</article>
						</article>
						<?php endwhile; ?>
					</li><!-- slide item -->
				<?php endif; ?>
				<?php $offset += 4; ?>
				<?php $slides++; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				</ul>
			</div><!-- .slider.four -->

	</section>

	<section class="section mediadark-bg">
		<div class="inner-container">
			<header>
				<h4 class="sub-title">Related Galleries</h4>
			</header>
		</div><!-- .inner-container -->

			<div class="slider four">
				<ul class="slides">
				<?php
					$offset = 0; 
					$slides = 0; 
				?>
				<?php while($slides <= 1 ): ?>

				<?php 
					$args = array(
						'offset' => $offset,
						'posts_per_page'	=> 4,
						'category_name' => $yourcat->slug,
						'tax_query' => array(
		                    array(
		                        'taxonomy' => 'post_format',
		                        'field' => 'slug',
		                        'terms' => array('post-format-gallery' ),
		                    )
		                )
					);
				
				$related_galleries = new WP_Query( $args );
				 ?>

				<?php if($related_galleries->have_posts()): ?>
					<li class="clearfix">

						<?php while($related_galleries->have_posts()): $related_galleries->the_post(); ?>
						<?php $categoryid = top_level_cat(); ?>
						<?php $category =  get_category($categoryid); ?>
						<?php $category_name = strtolower($category->name); ?>
						<?php $category_link = get_category_link($categoryid); ?>

						<?php $format = get_post_format(); ?>

						<article class="slide-col column col-1-4 <?php echo $category_name ?> <?php echo $format; ?>">
							<article class="single">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(),'grid' ); ?>
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

								<div data-mh="article-grid" class="meta match-height">
									<div class="category out">
										<a href="<?php echo $category_link ?>"><!-- CATEGORY LINK -->
											<p class="cat-title"><?php echo $category_name ?><i class="icon-badge"></i></p>										
										</a>
									</div>	
									<div class="title">
										<a href="<?php the_permalink(); ?>"><!-- POST LINK -->
											<h2><?php the_title(); ?></h2>
										</a>
									</div>
									<div class="misc">
										<span class="date"><?php the_time('d M Y'); ?></span>
									</div>
								</div>				
							</article>
						</article>
						<?php endwhile; ?>
					</li><!-- slide item -->
				<?php endif; ?>
				<?php $offset += 4; ?>
				<?php $slides++; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				</ul>
			</div><!-- .slider.four -->
	</section>	


</div><!-- #category -->

<?php get_footer(); ?>