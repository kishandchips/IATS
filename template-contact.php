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
				<form action="/">
					<fieldset>
						<label for="name">Name</label>
						<input type="text" id="name" class="form-text" placeholder="First Name Last Name"/>
						<p class="form-help">This is help text under the form field.</p>
					</fieldset>
					
					<fieldset>
						<label for="email">Email</label>
						<input type="email" id="email" class="form-text" placeholder="you@youremail.com"/>
					</fieldset>

					<fieldset>
						<label for="url">Website</label>
						<input type="url" id="url" class="form-text" placeholder="http://yourdomain.com" />
					</fieldset>

					<fieldset>
						<label for="message">Message</label>
						<textarea id="message" placeholder="Say Hi..."></textarea>
					</fieldset>

					<fieldset class="form-actions">
						<input type="submit" value="Send message" />
					</fieldset>
				</form>		
			</div>
		</div>
	</div><!-- #content -->

</div><!-- #live -->

<?php get_footer(); ?>