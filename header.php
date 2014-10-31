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

        <?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <div id="joebudden" class="container">

        <section id="header">
<!--        <div class="space-jam clearfix">
                <div class="space-logo">

                </div>                
                <div class="advertisement">
                    <div class="banner">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle"
                             style="display:inline-block;width:970px;height:90px"
                             data-ad-client="ca-pub-1566926890494756"
                             data-ad-slot="7646876626"></ins>
                        <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>            
                    </div>
                </div>        
            </div> -->

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