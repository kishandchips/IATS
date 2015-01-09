<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('-','true','right'); ?></title>
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<script type='text/javascript'>
var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') + 
'//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();
</script>

<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/37702763/IAB_728x90_Test', [728, 90], 'div-gpt-ad-1418399064729-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
<script type='text/javascript'>
googletag.cmd.push(function() {
googletag.defineSlot('/37702763/IAB_300x250_Test', [300, 250], 'div-gpt-ad-1418398905771-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.enableServices();
});
</script>
        <?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>
    
        <div id="joebudden" class="container">

        <section id="header">

            <div class="advertisement">
                <!-- IAB_728x90_Test -->
                <div id='div-gpt-ad-1418399064729-0' style='width:728px; height:90px;'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('div-gpt-ad-1418399064729-0'); });
                </script>
                </div>         
            </div>

            <section id="navigation" class="clearfix">
                <div class="logo-wrapper">
                    <a class="logo" href="<?php bloginfo('url' ); ?>">
                        <i class="icon-typelogo"></i>    
                    </a>
                    <a class="logo" href="<?php bloginfo('url' ); ?>">
                        <i class="icon-logo"></i>    
                    </a>
                </div><!-- .logo-wrapper -->
                <div class="mob-menu">
                    <button id="menu-toggle" aria-role="toggle menu">
                        <i class="icon-menu"></i> Menu
                    </button>                    
                </div><!-- .mob-menu -->

                <nav id="main-nav">
                    <?php $args = array('theme_location' => 'header_nav','menu' => '','container' => '', 'walker' => new Primary_Nav_Walker);
                        wp_nav_menu( $args ); 
                    ?>
                    <?php get_search_form(); ?>
                </nav>
            </section><!-- #navigation -->

        </section><!-- #header -->