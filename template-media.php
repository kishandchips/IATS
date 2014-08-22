<?php 
/*
	Template Name: Media
*/
?>
<?php get_header(); ?>

<div id="media-archive">
	<header id="page-header" class="media-bg">
		<h1 class="title">
		<i class="icon-badge"></i>
			IATS Media
		</h1>	
	</header><!-- #page-header -->

<div class="section medialight-bg no-pad">
	<div class="inner-container">
		<header>
			<h4 class="sub-title">IATS TV</h4>
		</header>
	</div><!-- .inner-container -->

	<div class="slider hero">

			<ul class="slides">	
				<?php 
					$i = 0;
					$offset = 0;
					$slides = 0; 
				?>

				<?php while($slides <= 1 ): ?>

				<?php 
					$args = array(
						'posts_per_page'	=> 3,
						'offset'	=> $offset,
						'tax_query' => array(
						                    array(
						                        'taxonomy' => 'post_format',
						                        'field' => 'slug',
						                        'terms' => array( 'post-format-video', 'post-format-gallery' )
						                    )
						                )

					);
				
				$query = new WP_Query( $args );
				 ?>
				

					<?php if($query->have_posts()): ?>
						<li class="clearfix">

						<?php while($query->have_posts()): $query->the_post(); ?>					
								<?php $categoryid = top_level_cat(); ?>
								<?php $category =  get_category($categoryid); ?>
								<?php $category_name = strtolower($category->name); ?>
								<?php $category_link = get_category_link($categoryid); ?>

								<?php $format = get_post_format(); ?>

									<?php if($i % 3 == 0): ?>
										<article class="slide-col one column col-2-5 <?php echo $category_name; ?> <?php echo $format; ?>">
									<?php elseif($i % 3 == 1): ?>
										<article class="slide-col two column col-2-5 <?php echo $category_name; ?> <?php echo $format; ?>">
									<?php else: ?>
										<article class="slide-col two column col-2-5 <?php echo $category_name; ?> <?php echo $format; ?>">
									<?php endif; ?>

										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<div class="image" style="background-image:url(<?php echo $url ?>)">
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
												<a href="<?php the_permalink(); ?>">
													<h2><?php the_title(); ?></h2>
												</a>
											</div>
											<div class="misc">
												<span class="date"><?php the_time('m M Y'); ?></span>
											</div>
										</div>					
									</article>

							<?php $i++ ?>
						<?php endwhile; ?>
						</li>
					<?php endif; ?>
					<?php 
						$offset += 3;
						$slides++
					?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>						
			</ul>
	</div><!-- .hero-slider -->
</div>

	<div id="filters" class="inner-container">
		<div class="button-group category" data-filter-group="category">
			<span>Filter By: </span>
			<button aria-role="Filter All" data-filter="" class="active">All</button>
			<button aria-role="Filter Schools" data-filter=".schools" class="schools">Schools</button>
			<button aria-role="Filter University" data-filter=".university" class="uni">University</button>
			<button aria-role="Filter Representative" data-filter=".representative" class="rep">Representative</button>
			<button aria-role="Filter Sevens" data-filter=".sevens" class="sevens">Sevens</button>
			<button aria-role="Filter Around The Game" data-filter=".around-the-game" class="around-the-game">Around the Game</button>
			<button aria-role="Filter Fitness" data-filter=".fitness" class="fitness">Fitness</button>
		</div>
	</div><!-- #filters -->

	<div id="content" class="section">

		<div class="inner-container">	
			<div class="section-content">

				<div id="isotope" class="articles row">
					<?php 
						$args = array(
							'posts_per_page'	=> 3,
							//remove this line
							// 'offset'	=> 9,
							'tax_query' => array(
			                    array(
			                        'taxonomy' => 'post_format',
			                        'field' => 'slug',
			                        'terms' => array( 'post-format-video', 'post-format-gallery' )
			                    )
							)

						);
					
					$query2 = new WP_Query( $args );
					 ?>

					<?php if ($query2->have_posts()): while($query2->have_posts()): $query2->the_post(); ?>
					<?php $categoryid = top_level_cat(); ?>
					<?php $category =  get_category($categoryid); ?>
					<?php $category_name = strtolower($category->name); ?>
					<?php $category_link = get_category_link($categoryid); ?>
					
					<?php $format = get_post_format(); ?>
					
					<article class="column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
						<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<div class="image" style="background-image:url(<?php echo $url ?>)">
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
								<a href="<?php echo $category_link ?>"><!-- CATEGORY LINK -->
									<p class="cat-title"><?php echo $category_name; ?><i class="icon-badge"></i></p>										
								</a>
							</div>	
							<div class="title match-height">
								<a href="<?php the_permalink(); ?>"><!-- POST LINK -->
									<h2><?php the_title(); ?></h2>										
								</a>
							</div>
							<div class="misc">
								<span class="date"><?php the_time('m M Y'); ?></span>
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
		</div><!-- .inner-container -->
	</div><!-- #content -->
</div><!-- #media-archive -->

<?php get_footer(); ?>