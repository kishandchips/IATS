<span id="twitter-count" class="hidden">
	<?php echo getTwitterFollowers('inattheside'); ?>
</span>

<div class="push"></div>
</div><!-- #joebudden -->

<footer id="footer">
	<div class="inner-container clearfix">
		<div class="footer-links column col-1-2">
			<?php dynamic_sidebar('Footer'); ?>			
		</div><!-- .footer-links -->

		<div class="footer-social column col-1-4">
			<div class="social-link">
				<h4 class="widget-title">Find us on Facebook</h4>
				<p><a href="https://www.facebook.com/inattheside" target="_blank"><i class="icon-facebook"></i></a></p>					
			</div>
			<div class="social-link">
				<h4 class="widget-title">Follow us on Twitter</h4>
				<p><a href="https://twitter.com/Inattheside" target="_blank"><i class="icon-twitter"></i></a></p>					
			</div>
		</div><!-- .footer-social -->

		<div class="logo column col-1-4">
			<a href="<?php echo bloginfo('url' ); ?>">
				<i class="icon-logo"></i>
			</a>
			<p>Copyright&copy; All Rights Reserved. In At The Side Media Limited</p>
		</div><!-- .logo -->

	</div>
</footer>
<?php wp_footer(); ?>
<script type="text/javascript">if(typeof wabtn4fg==="undefined"){wabtn4fg=1;h=document.head||document.getElementsByTagName("head")[0],s=document.createElement("script");s.type="text/javascript";s.src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/whatsapp-button.js";h.appendChild(s);}</script>
</body>
</html>