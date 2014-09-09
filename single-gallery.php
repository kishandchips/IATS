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
		<article class="section mediadark-bg <?php echo $category_name ?>">
		<?php $images = get_field('gallery'); ?>
		<?php if($images): ?>
				<section class="slider gallery">
					<ul class="slides">
						<?php foreach ($images as $image): ?>
							<li>
								<span class="vertical"></span><img src="<?php echo $image['sizes']['gallery-slide']; ?>" alt="">
							</li>
						<?php endforeach; ?>
					</ul>
				</section><!-- .slider.gallery -->

				<div class="slider carousel">
					<ul class="slides">
					<?php foreach ($images as $image): ?>
						<li>
							<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="">
						</li>
					<?php endforeach; ?>
					</ul><!-- .slides -->
				</div><!-- .slider -->
		<?php endif; ?>

			<div class="medialight-bg">
				<div class="media-wrapper">
					<div class="media-content">
						<h2 class="title"><?php the_title(); ?></h2>

						<div class="page-meta">
							<span class="author"><?php the_author(); ?></span>
							<span class="date"><?php the_time('d M Y'); ?></span>
							<span class="social-icons">
								<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank">
									<i class="icon-facebook2"></i>
								</a>
								<a href="http://twitter.com/share?text=<?php the_title(); ?>" title="Share on Twitter" target="_blank">
									<i class="icon-twitter"></i>
								</a>
								<a href="mailto:?&body=<?php the_permalink(); ?>">
									<i class="icon-mail"></i>
								</a>
									<a href="whatsapp://send" data-text="Take a look at this awesome website:" data-href="" class="wa_btn wa_btn_s" style="display:none">Share</a><script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="//whatsapp-sharing.com/button";h.appendChild(s);}</script>
							</span>
						</div>

						<div class="description">
							<?php the_content(); ?>
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
						'category__in' => wp_get_post_categories($post->ID),
						// 'tag__in'	=> $tag_ids,
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
						<?php $categoryid = top_level_cat(); ?>
						<?php $category =  get_category($categoryid); ?>
						<?php $category_name = strtolower($category->name); ?>
						<?php $category_link = get_category_link($categoryid); ?>

						<?php $format = get_post_format(); ?>

						<article class="slide-col column col-1-4 <?php echo $category_name ?> <?php echo $format; ?>">
							<article class="single">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'grid' ); ?>
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
										<span class="date"><?php the_time('m M Y'); ?></span>
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
<!-- 
				<?php $tags = wp_get_post_tags( $post->ID ) ?>
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
		                        'terms' => array( 'post-format-video', 'post-format-gallery' ),
		                        'operator' => 'NOT IN'
		                    )
		                )
					);
				
				$related_articles = new WP_Query( $args );
				 ?>

				<?php if($related_articles->have_posts()): ?>
					<li class="clearfix">

						<?php while($related_articles->have_posts()): $related_articles->the_post(); ?>
						<?php $categoryid = top_level_cat(); ?>
						<?php $category =  get_category($categoryid); ?>
						<?php $category_name = strtolower($category->name); ?>
						<?php $category_link = get_category_link($categoryid); ?>

						<article class="slide-col column col-1-4 <?php echo $category_name ?>">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'grid' ); ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php if($image[0]): ?>
								<div class="image" style="background-image:url(<?php echo $image[0] ?>)">
								<?php else: ?>
								<div class="image placeholder">
								<?php endif; ?>

								</div>
							</a>

							<div data-mh="grid" class="meta match-height">
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
									<span class="date"><?php the_time('m M Y'); ?></span>
								</div>
							</div>				
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