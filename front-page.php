<?php get_header(); ?>

	<div id="home">
		<div class="slider hero">

		<!-- DISPLAY ONLY IF LIVE EVENT  -->
			<div class="live-fixed">
				<a href="<?php echo bloginfo('url' ); ?>/live">
					<div class="info">
						<div class="title">
							<h2>Team Name 1</h2> 
							<span>VS</span><h2>Team Name 2</h2>
						</div>
						<div class="misc">
							<span class="match">Live Match</span>
							<span class="date">15 Jun 2014</span>
							<span class="comments">5<i class="icon-comment"></i></span>
						</div>
					</div>	
				</a>
			</div>
		<!-- END -->

			<ul class="slides">	
				<?php 
					$i = 0;
					$offset = 0;
					$slides = 0; 
				?>

				<?php while($slides <= 1 ): ?>

				<?php 
				$args = array(
					'posts_per_page' => 3,
					'offset' => $offset,
				); 
				?>
				
				<?php $query = new WP_Query( $args ); ?>

					<?php if($query->have_posts()): ?>
						<li class="clearfix">

						<?php while($query->have_posts()): $query->the_post(); ?>					
								<?php $category_name = top_level_cat(); ?>
								<?php $format = get_post_format(); ?>

								<?php if($i % 3 == 0): ?>
									<article class="meta-inner slide-col one column col-2-5 <?php echo $category_name; ?>">
								<?php elseif($i % 3 == 1): ?>
									<article class="westside slide-col two column col-2-5 <?php echo $category_name; ?>">
								<?php else: ?>
									<article class="eastside slide-col two column col-2-5 <?php echo $category_name; ?>">
								<?php endif; ?>

										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

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
					<?php wp_reset_query(); ?>
					<?php 
						$offset += 3;
						$slides++
					?>
				<?php endwhile; ?>						
			</ul>
	</div><!-- .hero-slider -->

	<section class="section latest">
	<button id="js-sidebar"><i class='icon-sidebar'></i></button>		
	
	<div class="inner-container">	
		<div class="section-content column col-7">
			<div id="filter" class="clearfix">

				<ul id="filter-list" class="clearfix">
					<li>
						<a class="button cat-filter schools" href="#" data-category="schools">
							<p>Schools</p>
						</a>							
					</li>
					<li>
						<a class="button cat-filter university" href="#" data-category="university">
							<p>University</p>
						</a>							
					</li>
					<li>
						<a class="button cat-filter representative" href="#" data-category="representative">
							<p>Representative</p>
						</a>							
					</li>
					<li>
						<a class="button cat-filter sevens" href="#" data-category="sevens">
							<p>Sevens</p>
						</a>							
					</li>
					<li>
						<a class="button cat-filter around-the-game" href="#" data-category="around-the-game">
							<p>Around The Game</p>
						</a>							
					</li>
				</ul>

				<div class="filter-select-bg schools">
					<select name="filter-select" id="filter-select">
						<option value="schools">Schools</option>
						<option value="university">University</option>
						<option value="representative">Representative</option>
						<option value="sevens">Sevens</option>
						<option value="around-the-game">Around the game</option>
					</select>
					<div class="label">
						<span>Change<i class="icon-badge"></i></span>
					</div>							
				</div>

			</div><!-- #filter -->
			
			<div class="slider latest-cat-articles schools active">
				<ul class="slides">	
				<?php 
					$i = 0;
					$offset = 0;
					$slides = 0; 
				?>

				<?php while($slides <= 1 ): ?>

				<?php 
				$args = array(
					'category_name' => 'schools',
					'posts_per_page' => 4,
					'offset' => $offset,

				); 
				?>
				
				<?php $latest_query = new WP_Query( $args ); ?>

					<?php if($latest_query->have_posts()): ?>
						<li class="clearfix">
							<div class="row">	
								<?php while($latest_query->have_posts()): $latest_query->the_post(); ?>					
								<?php $category_name = top_level_cat(); ?>
								<?php $category_link = get_category_link(top_level_cat()); ?>
								<?php $format = get_post_format(); ?>

								<?php if($i % 4 == 0): ?>
									<article class="main meta-inner slide-col column col-full <?php echo $category_name; ?> <?php echo $format; ?>">
								<?php else: ?>
									<article class="slide-col column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
								<?php endif; ?>

										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

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
										<div class="meta">
											<div class="category out">
												<a href="<?php echo $category_link; ?>">
													<p class="cat-title"><?php echo $category_name; ?><i class="icon-badge"></i></p>										
												</a>
											</div>	
											<div class="title match-height">
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
							</div>
						</li><!-- single slide -->
						<?php endif; ?>
						<?php wp_reset_query(); ?>
						<?php 
							$offset += 3;
							$slides++
						?>
					<?php endwhile; ?>	
				</ul><!-- .slides -->
			</div><!-- .schools -->

			<div class="slider latest-cat-articles university">
				<ul class="slides">	
				<?php 
					$i = 0;
					$offset = 0;
					$slides = 0; 
				?>

				<?php while($slides <= 1 ): ?>

				<?php 
				$args = array(
					'category_name' => 'university',
					'posts_per_page' => 4,
					'offset' => $offset,

				); 
				?>
				
				<?php $latest_query = new WP_Query( $args ); ?>

					<?php if($latest_query->have_posts()): ?>
						<li class="clearfix">
							<div class="row">	
								<?php while($latest_query->have_posts()): $latest_query->the_post(); ?>					
								<?php $category_name = top_level_cat(); ?>
								<?php $category_link = get_category_link(top_level_cat()); ?>
								<?php $format = get_post_format(); ?>

								<?php if($i % 4 == 0): ?>
									<article class="main meta-inner slide-col column col-full <?php echo $category_name; ?> <?php echo $format; ?>">
								<?php else: ?>
									<article class="slide-col column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
								<?php endif; ?>

										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

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
										<div class="meta">
											<div class="category out">
												<a href="<?php echo $category_link; ?>">
													<p class="cat-title"><?php echo $category_name; ?><i class="icon-badge"></i></p>										
												</a>
											</div>	
											<div class="title match-height">
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
							</div>
						</li><!-- single slide -->
						<?php endif; ?>
						<?php wp_reset_query(); ?>
						<?php 
							$offset += 3;
							$slides++
						?>
					<?php endwhile; ?>	
				</ul><!-- .slides -->
			</div><!-- .university -->

		</div><!-- .section-content -->

		<div id="sidebar" class="column col-3">

			<div class="sidebar-widget advert">
				
			</div>

			<div class="sidebar-widget list">
				<?php dynamic_sidebar('primary' ); ?>
			</div>
		</div><!-- #sidebar -->

	</div><!-- .inner-container -->

	</section><!-- .section.latest -->

	<section class="section media medialight-bg">
		<div class="inner-container">
			<header>
				<h4 class="title">Latest Media</h4>
				<h4 class="sub-title">IATS TV</h4>
			</header>
		</div><!-- .inner-container -->

			<div class="slider three">
			<ul class="slides">	
				<?php 
					$offset = 0;
					$slides = 0; 
				?>

				<?php while($slides <= 3 ): ?>

				<?php 
					$args = array(
						'posts_per_page'	=> 3,
						'offset'	=> $offset,
						'tax_query' => array(
						                    array(
						                        'taxonomy' => 'post_format',
						                        'field' => 'slug',
						                        'terms' => array( 'post-format-video' )
						                    )
						                )

					);
				
				$latest_media = new WP_Query( $args );
				 ?>
				

					<?php if($latest_media->have_posts()): ?>
						<li class="clearfix">

						<?php while($latest_media->have_posts()): $latest_media->the_post(); ?>					
								<?php $category_name = top_level_cat(); ?>
								<?php $category_link = get_category_link(top_level_cat()); ?>
								<?php $format = get_post_format(); ?>

										<article class="slide-col two column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
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
										<div class="meta">
											<div class="category out">
												<a href="<?php echo $category_link; ?>">
													<p class="cat-title"><?php echo $category_name; ?><i class="icon-badge"></i></p>										
												</a>
											</div>	
											<div class="title match-height">
												<a href="<?php the_permalink(); ?>">
													<h2><?php the_title(); ?></h2>
												</a>
											</div>
											<div class="misc">
												<span class="date"><?php the_time('m M Y'); ?></span>
											</div>
										</div>					
									</article>
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
			</div><!-- .slider.three -->
	</section><!-- .media -->

	<section class="section galleries mediadark-bg">
		<div class="inner-container">
			<header>
				<h4 class="sub-title">Galleries</h4>
			</header>
		</div><!-- .inner-container -->

			<div class="slider four">
				<ul class="slides">	
				<?php 
					$offset = 0;
					$slides = 0; 
				?>

				<?php while($slides <= 3 ): ?>

				<?php 
					$args = array(
						'posts_per_page'	=> 4,
						'offset'	=> $offset,
						'tax_query' => array(
						                    array(
						                        'taxonomy' => 'post_format',
						                        'field' => 'slug',
						                        'terms' => array( 'post-format-gallery' )
						                    )
						                )

					);
				
				$latest_galleries= new WP_Query( $args );
				 ?>
				

					<?php if($latest_galleries->have_posts()): ?>
						<li class="clearfix">

						<?php while($latest_galleries->have_posts()): $latest_galleries->the_post(); ?>					
								<?php $category_name = top_level_cat(); ?>
								<?php $category_link = get_category_link(top_level_cat()); ?>
								<?php $format = get_post_format(); ?>

										<article class="slide-col two column col-1-4 <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
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
										<div class="meta">
											<div class="category out">
												<a href="<?php echo $category_link; ?>">
													<p class="cat-title"><?php echo $category_name; ?><i class="icon-badge"></i></p>										
												</a>
											</div>	
											<div class="title match-height">
												<a href="<?php the_permalink(); ?>">
													<h2><?php the_title(); ?></h2>
												</a>
											</div>
											<div class="misc">
												<span class="date"><?php the_time('m M Y'); ?></span>
											</div>
										</div>					
									</article>
						<?php endwhile; ?>
						</li>
					<?php endif; ?>
					<?php 
						$offset += 4;
						$slides++
					?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>						
			</ul>
			</div><!-- .slider.four -->
	</section><!-- .galleries -->

	<div class="section advertisement">
		<div class="advert">
			advertising
		</div>
	</div><!-- cashmoney -->

		<section class="section fitness">
			<div class="inner-container">
				<header>
					<h4 class="title">Fitness Zone</h4>
				</header>
				<div class="articles row">
				<?php
					$args = array(
						'posts_per_page' => 4,
						'post__not_in' => array($post->ID),
						'category_name'    => 'fitness',
					);
				
					$fitness = new WP_Query( $args );
				 ?>
				<?php if($fitness->have_posts()): while($fitness->have_posts()): $fitness->the_post(); ?>
				<?php $category_name = top_level_cat(); ?>
				<?php $category_link = get_category_link(top_level_cat()); ?>
				<?php $format = get_post_format(); ?>
						<article class="column col-1-4 <?php echo fitness_cat(); ?> <?php echo $format; ?>">
							<a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<div class="image" style="background-image:url(<?php echo $url ?>)">
								</div>
								<div class="meta">
									<div class="category out">
										<a href="<?php $category_link; ?>"><!-- CATEGORY LINK -->
											<p class="cat-title"><?php echo fitness_cat(); ?><i class="icon-badge"></i></p>										
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
							</a>
						</article>
					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				</div><!-- .row -->
			</div><!-- .inner-container -->
		</section><!-- .fitness -->

		<section class="section feed">
			<div class="inner-container">
				<header>
					<h4 class="title">Twitter Feed</h4>
				</header>
				<div id="feed" class="row">
					<?php dynamic_sidebar('social' ); ?>
				</div>
			</div><!-- .inner-container -->
		</section><!-- .feed -->

</div><!-- #hero -->
<?php get_footer(); ?>