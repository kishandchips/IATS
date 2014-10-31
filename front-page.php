<?php get_header(); ?>

	<div id="home">
		<?php 
			$args = array(
				'category__name' => 'live',
				'posts_per_page' => 1,
				'meta_key'  => 'live',
				'meta_value'  => true,
			);
		
			$live = new WP_Query( $args );
		 ?>
		<!-- DISPLAY ONLY IF LIVE EVENT  -->
		<?php if($live->have_posts()): while($live->have_posts()): $live->the_post(); ?>
			<div class="live-fixed">
				<a href="<?php the_permalink(); ?>">
					<div class="info">
						<span class="title">IATS LIVE</span>
						<h2>
							<?php the_title(); ?>
						</h2>
					</div>	
				</a>
			</div>
		<?php endwhile; endif; ?>
		<?php wp_reset_query(); ?>
		<!-- END -->

		<div class="slider hero">
			<ul class="slides">	

				<?php 
				$args = array(
					'posts_per_page' => 9,
					'meta_key' => 'featured_post',
					'meta_value' => true
				); 
				?>
				
				<?php $query = new WP_Query( $args ); ?>

				<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>

					<?php if( $query->current_post % 3 == 0 ):?>
						<?php $i = 0; ?>
						<li class="clearfix">
					<?php endif; ?>

							<?php $categoryid = top_level_cat(); ?>
							<?php $category =  get_category($categoryid); ?>
							<?php $category_name = strtolower($category->name); ?>
							<?php $category_link = get_category_link($categoryid); ?>
							<?php $format = get_post_format(); ?>

							<?php if($i % 3 == 0): ?>
								<article class="meta-inner slide-col one column col-2-5 <?php echo $category_name; ?>">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' ); ?>
							<?php elseif($i % 3 == 1): ?>
								<article class="westside slide-col two column col-2-5 <?php echo $category_name; ?>">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'grid' ); ?>
							<?php else: ?>
								<article class="eastside slide-col two column col-2-5 <?php echo $category_name; ?>">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'grid' ); ?>
							<?php endif; ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php if($image[0]): ?>
										<div class="image lazy" data-src="<?php echo $image[0] ?>">
										<?php else: ?>
										<div class="image placeholder">
										<?php endif; ?>

										<?php if($format == 'gallery'): ?>
											<?php $images = get_field('gallery') ?>
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
											<span class="date"><?php the_time('d M Y'); ?></span>
										</div>
									</div>					
								</article>

						<?php $i++ ?>
					<?php endwhile; ?>

					<?php if( $query->current_post%3 == 1 || $query->current_post == $query->post_count-1 ): ?>
						</li><!-- slide -->
					<?php endif; ?>

				<?php endif; ?>
				<?php wp_reset_query(); ?>					
			</ul>
		</div><!-- .hero-slider -->

	<section class="section latest">
	<button id="js-sidebar"><i class='icon-sidebar'></i></button>		
	
		<div class="inner-container">	
			<div class="section-content column col-7">
				<div id="filter" class="clearfix">

					<ul id="filter-list" class="clearfix">
						<li>
							<a class="button cat-filter schools active" href="#" data-category="schools">
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
					$args = array(
						'cat' => '4',
						'posts_per_page' => 8,
					); 
					?>
					
					<?php $latest_query = new WP_Query( $args ); ?>

						<?php if($latest_query->have_posts()): while($latest_query->have_posts()): $latest_query->the_post(); ?>
						
							<?php if( $latest_query->current_post % 4 == 0 ):?>
								<?php $i = 0; ?>
								<li class="clearfix">
									<div class="row">
							<?php endif; ?>

									<?php $categoryid = top_level_cat(); ?>
									<?php $category =  get_category($categoryid); ?>
									<?php $category_name = strtolower($category->name); ?>
									<?php $category_link = get_category_link($categoryid); ?>
									<?php $format = get_post_format(); ?>

									<?php if($i % 4 == 0): ?>
										<article class="main meta-inner slide-col column col-full <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' ); ?>
									<?php else: ?>
										<article class="slide-col column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' ); ?>
									<?php endif; ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php if($image[0]): ?>
												<div class="image lazy" data-src="<?php echo $image[0] ?>">
												<?php else: ?>
												<div class="image placeholder">
												<?php endif; ?>

												<?php if($format == 'gallery'): ?>
													<?php $images = get_field('gallery') ?>
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
													<a href="<?php the_permalink(); ?>">
														<h2><?php the_title(); ?></h2>
													</a>
												</div>
												<div class="misc">
													<span class="date"><?php the_time('d M Y'); ?></span>
												</div>
											</div>					
										</article>
								<?php $i++ ?>
							<?php endwhile; ?>
						
							<?php if( $latest_query->current_post%4 == 1 || $latest_query->current_post == $latest_query->post_count-1 ): ?>
									</div>
								</li><!-- slide -->
							<?php endif; ?>

							<?php endif; ?>
							<?php wp_reset_query(); ?>
					</ul><!-- .slides -->
				</div><!-- .schools -->

				<div class="slider latest-cat-articles university">
					<ul class="slides">	

					<?php 
					$args = array(
						'cat' => '3',
						'posts_per_page' => 8,
					); 
					?>
					
					<?php $latest_query = new WP_Query( $args ); ?>

						<?php if($latest_query->have_posts()): while($latest_query->have_posts()): $latest_query->the_post(); ?>
						
							<?php if( $latest_query->current_post % 4 == 0 ):?>
								<?php $i = 0; ?>
								<li class="clearfix">
									<div class="row">
							<?php endif; ?>
					
									<?php $categoryid = top_level_cat(); ?>
									<?php $category =  get_category($categoryid); ?>
									<?php $category_name = strtolower($category->name); ?>
									<?php $category_link = get_category_link($categoryid); ?>
									<?php $format = get_post_format(); ?>

									<?php if($i % 4 == 0): ?>
										<article class="main meta-inner slide-col column col-full <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' ); ?>
									<?php else: ?>
										<article class="slide-col column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' ); ?>
									<?php endif; ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php if($image[0]): ?>
												<div class="image lazy" data-src="<?php echo $image[0] ?>">
												<?php else: ?>
												<div class="image placeholder">
												<?php endif; ?>

												<?php if($format == 'gallery'): ?>
													<?php $images = get_field('gallery') ?>
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
													<a href="<?php the_permalink(); ?>">
														<h2><?php the_title(); ?></h2>
													</a>
												</div>
												<div class="misc">
													<span class="date"><?php the_time('d M Y'); ?></span>
												</div>
											</div>					
										</article>
								<?php $i++ ?>
							<?php endwhile; ?>
						
							<?php if( $latest_query->current_post%4 == 1 || $latest_query->current_post == $latest_query->post_count-1 ): ?>
									</div>
								</li><!-- slide -->
							<?php endif; ?>

							<?php endif; ?>
					</ul><!-- .slides -->
				</div><!-- .university -->

				<div class="slider latest-cat-articles representative">
					<ul class="slides">	

					<?php 
					$args = array(
						'cat' => '1',
						'posts_per_page' => 8,
					); 
					?>
					
					<?php $latest_query = new WP_Query( $args ); ?>

						<?php if($latest_query->have_posts()): while($latest_query->have_posts()): $latest_query->the_post(); ?>
						
							<?php if( $latest_query->current_post % 4 == 0 ):?>
								<?php $i = 0; ?>
								<li class="clearfix">
									<div class="row">
							<?php endif; ?>
				
									<?php $categoryid = top_level_cat(); ?>
									<?php $category =  get_category($categoryid); ?>
									<?php $category_name = strtolower($category->name); ?>
									<?php $category_link = get_category_link($categoryid); ?>
									<?php $format = get_post_format(); ?>

									<?php if($i % 4 == 0): ?>
										<article class="main meta-inner slide-col column col-full <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' ); ?>
									<?php else: ?>
										<article class="slide-col column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' ); ?>
									<?php endif; ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php if($image[0]): ?>
												<div class="image lazy" data-src="<?php echo $image[0] ?>">
												<?php else: ?>
												<div class="image placeholder">
												<?php endif; ?>

												<?php if($format == 'gallery'): ?>
													<?php $images = get_field('gallery') ?>
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
													<a href="<?php the_permalink(); ?>">
														<h2><?php the_title(); ?></h2>
													</a>
												</div>
												<div class="misc">
													<span class="date"><?php the_time('d M Y'); ?></span>
												</div>
											</div>					
										</article>
								<?php $i++ ?>
							<?php endwhile; ?>

							<?php if( $latest_query->current_post%4 == 1 || $latest_query->current_post == $latest_query->post_count-1 ): ?>
									</div>
								</li><!-- slide -->
							<?php endif; ?>

							<?php endif; ?>
							<?php wp_reset_query(); ?>	
					</ul><!-- .slides -->
				</div><!-- .representative -->

				<div class="slider latest-cat-articles sevens">
					<ul class="slides">	

					<?php 
					$args = array(
						'cat' => '5',
						'posts_per_page' => 8,
					); 
					?>
					
					<?php $latest_query = new WP_Query( $args ); ?>

						<?php if($latest_query->have_posts()): while($latest_query->have_posts()): $latest_query->the_post(); ?>
						
							<?php if( $latest_query->current_post % 4 == 0 ):?>
								<?php $i = 0; ?>
								<li class="clearfix">
									<div class="row">
							<?php endif; ?>

									<?php $categoryid = top_level_cat(); ?>
									<?php $category =  get_category($categoryid); ?>
									<?php $category_name = strtolower($category->name); ?>
									<?php $category_link = get_category_link($categoryid); ?>
									<?php $format = get_post_format(); ?>

									<?php if($i % 4 == 0): ?>
										<article class="main meta-inner slide-col column col-full <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' ); ?>
									<?php else: ?>
										<article class="slide-col column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' ); ?>
									<?php endif; ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php if($image[0]): ?>
												<div class="image lazy" data-src="<?php echo $image[0] ?>">
												<?php else: ?>
												<div class="image placeholder">
												<?php endif; ?>

												<?php if($format == 'gallery'): ?>
													<?php $images = get_field('gallery') ?>
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
													<a href="<?php the_permalink(); ?>">
														<h2><?php the_title(); ?></h2>
													</a>
												</div>
												<div class="misc">
													<span class="date"><?php the_time('d M Y'); ?></span>
												</div>
											</div>					
										</article>
								<?php $i++ ?>
							<?php endwhile; ?>

							<?php if( $latest_query->current_post%4 == 1 || $latest_query->current_post == $latest_query->post_count-1 ): ?>
									</div>
								</li><!-- slide -->
							<?php endif; ?>

							<?php endif; ?>
							<?php wp_reset_query(); ?>	
					</ul><!-- .slides -->
				</div><!-- .sevens -->

				<div class="slider latest-cat-articles around-the-game">
					<ul class="slides">	

					<?php 
					$args = array(
						'cat' => '2102',
						'posts_per_page' => 8,
					); 
					?>
					
					<?php $latest_query = new WP_Query( $args ); ?>

						<?php if($latest_query->have_posts()): while($latest_query->have_posts()): $latest_query->the_post(); ?>
						
							<?php if( $latest_query->current_post % 4 == 0 ):?>
								<?php $i = 0; ?>
								<li class="clearfix">
									<div class="row">
							<?php endif; ?>

									<?php $categoryid = top_level_cat(); ?>
									<?php $category =  get_category($categoryid); ?>
									<?php $category_name = strtolower($category->name); ?>
									<?php $category_link = get_category_link($categoryid); ?>
									<?php $format = get_post_format(); ?>

									<?php if($i % 4 == 0): ?>
										<article class="main meta-inner slide-col column col-full <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' ); ?>
									<?php else: ?>
										<article class="slide-col column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' ); ?>
									<?php endif; ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php if($image[0]): ?>
												<div class="image lazy" data-src="<?php echo $image[0] ?>">
												<?php else: ?>
												<div class="image placeholder">
												<?php endif; ?>

												<?php if($format == 'gallery'): ?>
													<?php $images = get_field('gallery') ?>
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
													<a href="<?php the_permalink(); ?>">
														<h2><?php the_title(); ?></h2>
													</a>
												</div>
												<div class="misc">
													<span class="date"><?php the_time('d M Y'); ?></span>
												</div>
											</div>					
										</article>
								<?php $i++ ?>
							<?php endwhile; ?>

							<?php if( $latest_query->current_post%4 == 1 || $latest_query->current_post == $latest_query->post_count-1 ): ?>
									</div>
								</li><!-- slide -->
							<?php endif; ?>

							<?php endif; ?>
							<?php wp_reset_query(); ?>	
					</ul><!-- .slides -->
				</div><!-- .around-the-game -->

			</div><!-- .section-content -->

			<div id="sidebar" class="column col-3">
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
					$args = array(
						'posts_per_page'	=> 6,
						'tax_query' => array(
						                    array(
						                        'taxonomy' => 'post_format',
						                        'field' => 'slug',
						                        'terms' => array( 'post-format-video' )
						                    )
						                )

					);
				 ?>
				<?php $latest_media = new WP_Query( $args ); ?>

				<?php if($latest_media->have_posts()): while($latest_media->have_posts()): $latest_media->the_post(); ?>
					
					<?php if( $latest_media->current_post % 3 == 0 ):?>
						<?php $i = 0; ?>
						<li class="clearfix">
					<?php endif; ?>

						<?php $categoryid = top_level_cat(); ?>
						<?php $category =  get_category($categoryid); ?>
						<?php $category_name = strtolower($category->name); ?>
						<?php $category_link = get_category_link($categoryid); ?>
						<?php $format = get_post_format(); ?>

							<article class="slide-col two column col-1-3 <?php echo $category_name; ?> <?php echo $format; ?>">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'grid' ); ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if($image[0]): ?>
								<div class="image lazy" data-src="<?php echo $image[0] ?>">
								<?php else: ?>
								<div class="image placeholder">
								<?php endif; ?>

								<?php if($format == 'gallery'): ?>
									<?php $images = get_field('gallery') ?>
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
									<a href="<?php the_permalink(); ?>">
										<h2><?php the_title(); ?></h2>
									</a>
								</div>
								<div class="misc">
									<span class="date"><?php the_time('d M Y'); ?></span>
								</div>
							</div>					
						</article>
					<?php endwhile; ?>

					<?php if( $latest_media->current_post%4 == 1 || $latest_media->current_post == $latest_media->post_count-1 ): ?>
						</li><!-- slide -->
					<?php endif; ?>

				<?php endif; ?>
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
					$args = array(
						'posts_per_page'	=> 8,
						'offset'	=> $offset,
						'tax_query' => array(
						                    array(
						                        'taxonomy' => 'post_format',
						                        'field' => 'slug',
						                        'terms' => array( 'post-format-gallery' )
						                    )
						                )

					);
				 ?>
				
				<?php $latest_galleries= new WP_Query( $args ); ?>

					<?php if($latest_galleries->have_posts()): while($latest_galleries->have_posts()): $latest_galleries->the_post(); ?>
	
						<?php if( $latest_galleries->current_post % 4 == 0 ):?>
							<?php $i = 0; ?>
							<li class="clearfix">
						<?php endif; ?>

							<?php $categoryid = top_level_cat(); ?>
							<?php $category =  get_category($categoryid); ?>
							<?php $category_name = strtolower($category->name); ?>
							<?php $category_link = get_category_link($categoryid); ?>
							<?php $format = get_post_format(); ?>

									<article class="slide-col two column col-1-4 <?php echo $category_name; ?> <?php echo $format; ?>">
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'grid' ); ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php if($image[0]): ?>
										<div class="image lazy" data-src="<?php echo $image[0] ?>">
										<?php else: ?>
										<div class="image placeholder">
										<?php endif; ?>
										
											<?php if($format == 'gallery'): ?>
											<?php $images = get_field('gallery') ?>
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
											<a href="<?php the_permalink(); ?>">
												<h2><?php the_title(); ?></h2>
											</a>
										</div>
										<div class="misc">
											<span class="date"><?php the_time('d M Y'); ?></span>
										</div>
									</div>					
								</article>
						<?php endwhile; ?>
					
					<?php if( $latest_galleries->current_post%4 == 1 || $latest_galleries->current_post == $latest_galleries->post_count-1 ): ?>
						</li><!-- slide -->
					<?php endif; ?>

					<?php endif; ?>
					<?php wp_reset_query(); ?>						
			</ul>
			</div><!-- .slider.four -->
	</section><!-- .galleries -->

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
				<?php $categoryid = top_level_cat(); ?>
				<?php $category =  get_category($categoryid); ?>
				<?php $category_name = strtolower($category->name); ?>
				<?php $category_link = get_category_link($categoryid); ?>

				<?php $format = get_post_format(); ?>
						<article class="column col-1-4 <?php echo fitness_cat(); ?> <?php echo $format; ?>">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'medium' ); ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if($image[0]): ?>
								<div class="image lazy" data-src="<?php echo $image[0] ?>">
								<?php else: ?>
								<div class="image placeholder">
								<?php endif; ?>
								</div>
							</a>

							<div data-mh="grid" class="meta match-height">
								<div class="category out">
									<a href="<?php $category_link; ?>"><!-- CATEGORY LINK -->
										<p class="cat-title"><?php echo fitness_cat(); ?><i class="icon-badge"></i></p>										
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