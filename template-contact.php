<?php 
/*
	Template Name: Contact
*/
?>
<?php get_header(); ?>
	
<div id="contact">
	<header id="page-header">
		<h1 class="title">
		<i class="icon-mail"></i>
			Contact
		</h1>	
	</header><!-- #page-header -->

	<div id="content" class="section">
		<div class="inner-container">
			<div class="contact-form">
				<?php echo do_shortcode('[gravityform id=1 title=false description=true ajax=true ]' ); ?>	
			</div>
		</div>
	</div><!-- #content -->

</div><!-- #live -->

<?php get_footer(); ?>