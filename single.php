<?php get_header(); ?>
<?php $categoryid = top_level_cat(); ?>
<?php $category =  get_category($categoryid); ?>
<?php $category_name = strtolower($category->name); ?>
<?php $category_link = get_category_link($categoryid); ?>

<div id="single">
	<header class="article-header <?php echo $category_name; ?>">
		<div class="inner-container">
			<div class="article-header-title">
				<span class="emblem">
					
				</span>
				<h1 class="title">
					<?php the_title(); ?>
				</h1>
			</div>
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<div class="article-header-image" style="background-image:url(<?php echo $url; ?>);">
				
			</div>

		</div>
	</header>

	<div id="content" class="section">

		<button id="js-sidebar" aria-role="Show Sidebar"><i class='icon-sidebar'></i></button>

		<div class="inner-container">	
			<div class="page section-content column col-7">

				<div class="breadcrumbs">
					<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
				</div>

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

				<div class="page-content">
					<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div><!-- .page-content -->

				<div class="page-share">
					<p>Share this post:</p>

					<div class="social-icons">
						<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank">
							<i class="icon-facebook2"></i>
						</a>
						<a href="http://twitter.com/share?text=<?php the_title(); ?>" title="Share on Twitter" target="_blank">
							<i class="icon-twitter"></i>
						</a>
						<a href="https://plus.google.com/share?url={<?php the_permalink(); ?>}" title="Share on Google" target="_blank">
							<i class="icon-google"></i>
						</a>
					</div>
				</div>

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

<!-- 	<?php $tags = wp_get_post_tags( $post->ID ) ?>
	<?php $tag_ids = array(); ?>
	<?php foreach ($tags as $tag) { $tag_ids[] = $tag->term_id; } ?> -->

	<?php
		$args = array(
			'post__not_in'	=> array($post->ID),
			// 'tag__in'	=> $tag_ids,
			'category__in' => wp_get_post_categories($post->ID),
			'posts_per_page'	=> 4			
		);
	
		$related = new WP_Query( $args );
	 ?>
	
	<section class="section">
		<div class="inner-container">
			<header>
				<h4 class="sub-title">Related Articles</h4>
			</header>
			<div class="articles row">
				<?php if($related->have_posts()): while($related->have_posts()): $related->the_post(); ?>
				<?php $categoryid = top_level_cat(); ?>
				<?php $category =  get_category($categoryid); ?>
				<?php $category_name = strtolower($category->name); ?>
				<?php $category_link = get_category_link($categoryid); ?>
				
				<?php $format = get_post_format(); ?>

					<article class="column col-1-4 <?php echo $category_name; ?> <?php echo $format; ?>">
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
								<a href="<?php echo $category_link; ?>"><!-- CATEGORY LINK -->
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
			</div><!-- .row -->
		</div><!-- .inner-container -->
	</section><!-- related-articles -->

</div><!-- #single -->

<?php get_footer(); ?>