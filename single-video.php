<?php get_header(); ?>
<?php $category_name = top_level_cat(); ?>
<?php $category_link = get_category_link(top_level_cat()); ?>

<div id="media-single">
	<header id="page-header" class="media-bg">
		<h1 class="title">
		<i class="icon-logo"></i>
			IATS Media
		</h1>	
	</header><!-- #page-header -->

	<div id="content">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<article class="<?php echo $category_name ?>">
			<div class="mediadark-bg">
				<div class="video-wrapper">
					<div class="video">

					</div>					
				</div>
			</div>

			<div class="medialight-bg">
				<div class="video-wrapper">
					<div class="video-content">
						<div class="category">
							<a href="<?php echo $category_link ?>">
								<p class="cat-title"><?php echo $category_name ?><i class="icon-badge"></i></p>
							</a>
						</div>

						<h2 class="title"><?php the_title(); ?></h2>

						<div class="page-meta">
							<span class="author"><?php the_author(); ?></span>
							<span class="date"><?php the_time('m M Y'); ?></span>
							<span class="social-icons">
								<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank">
									<i class="icon-facebook2"></i>
								</a>
								<a href="http://twitter.com/share?text=<?php the_title(); ?>" title="Share on Twitter" target="_blank">
									<i class="icon-twitter"></i>
								</a>
								<a href="https://plus.google.com/share?url={<?php the_permalink(); ?>}" title="Share on Google" target="_blank">
									<i class="icon-google"></i>
								</a>
							</span>
						</div>

						<div class="description">
							<?php $content = get_the_content(); ?>
							<?php echo $content; ?>
							<!-- <?php the_content(); ?> -->
						</div>

					</div><!-- .video-content -->
				</div><!-- .video-wrapper -->
			</div><!-- .medialight-bg -->
		</article>
		<?php endwhile; endif; ?>
		<?php  wp_reset_postdata(); ?>

	</div><!-- #content -->

	<section class="section mediadark-bg">
		<div class="inner-container">
			<header>
				<h4 class="sub-title">Related Media</h4>
			</header>
		</div><!-- .inner-container -->

			<div class="slider four">
				<ul class="slides">
				<?php
					$offset = 0; 
					$slides = 0; 
				?>
<!-- 				<?php $tags = wp_get_post_tags( $post->ID ) ?>
				<?php $tag_ids = array(); ?>
				<?php foreach ($tags as $tag) { $tag_ids[] = $tag->term_id; } ?> -->
				<?php while($slides <= 3 ): ?>

				<?php 
					$args = array(
						'offset' => $offset,
						'posts_per_page'	=> 4,
						// 'tag__in'	=> $tag_ids,
						'category__in' => wp_get_post_categories($post->ID),
						'post__not_in' => array($post->ID),
						'tax_query' => array(
		                    array(
		                        'taxonomy' => 'post_format',
		                        'field' => 'slug',
		                        'terms' => array( 'post-format-video', 'post-format-gallery' )
		                    )
		                )
					);
				
				$related_media = new WP_Query( $args );
				 ?>

				<?php if($related_media->have_posts()): ?>
					<li class="clearfix">

						<?php while($related_media->have_posts()): $related_media->the_post(); ?>
						<?php $category_name = top_level_cat(); ?>
						<?php $category_link = get_category_link(top_level_cat()); ?>	
						<?php $format = get_post_format(); ?>

						<article class="slide-col column col-1-4 <?php echo $category_name ?> <?php echo $format; ?>">
							<a href="#" title="Post Title">
								<article class="single">
									<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
									<div class="image" style="background-image:url(<?php echo $url; ?>);">
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
											<a href="<?php echo $category_link ?>"><!-- CATEGORY LINK -->
												<p class="cat-title"><?php echo $category_name ?><i class="icon-badge"></i></p>										
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
							</a>	
						</article>
						<?php endwhile; ?>
					</li><!-- slide item -->
				<?php endif; ?>
				<?php $offset += 4; ?>
				<?php $slides++; ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				</ul>
			</div><!-- .slider.four -->

	</section>

	<section class="section">
		<div class="inner-container">
			<header>
				<h4 class="sub-title">Related Articles</h4>
			</header>
		</div><!-- .inner-container -->

			<div class="slider four">
				<ul class="slides">
				<?php
					$offset = 0; 
					$slides = 0; 
				?>

<!-- 				<?php $tags = wp_get_post_tags( $post->ID ) ?>
				<?php $tag_ids = array(); ?>
				<?php foreach ($tags as $tag) { $tag_ids[] = $tag->term_id; } ?> -->
				<?php while($slides <= 1 ): ?>

				<?php 
					$args = array(
						'offset' => $offset,
						'posts_per_page'	=> 4,
						// 'tag__in'	=> $tag_ids,
						'category__in' => wp_get_post_categories($post->ID),
						'post__not_in' => array($post->ID),
						'tax_query' => array(
		                    array(
		                        'taxonomy' => 'post_format',
		                        'field' => 'slug',
		                        'terms' => array( 'post-format-video', 'post-format-gallery' )
		                    )
		                )
					);
				
				$related_articles = new WP_Query( $args );
				 ?>

				<?php if($related_articles->have_posts()): ?>
					<li class="clearfix">

						<?php while($related_articles->have_posts()): $related_articles->the_post(); ?>
						<?php $category_name = top_level_cat(); ?>
						<?php $category_link = get_category_link(top_level_cat()); ?>
						<?php $format = get_post_format(); ?>	

						<article class="slide-col column col-1-4 <?php echo $category_name ?>">
							<a href="#" title="Post Title">
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
								<div class="image" style="background-image:url(<?php echo $url; ?>);">
								</div>
								<div class="meta">
									<div class="category out">
										<a href="<?php echo $category_link ?>"><!-- CATEGORY LINK -->
											<p class="cat-title"><?php echo $category_name ?><i class="icon-badge"></i></p>										
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
						<?php endwhile; ?>
					</li><!-- slide item -->
				<?php endif; ?>
				<?php $offset += 4; ?>
				<?php $slides++; ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				</ul>
			</div><!-- .slider.four -->
	</section>	
</div><!-- #media-single -->

<?php get_footer(); ?>