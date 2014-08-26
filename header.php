<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('-','true','right'); ?><?php bloginfo('name'); ?></title>
        <meta name="viewport" content="width=device-width">

        <?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <div id="joebudden" class="container">
            <div class="section advertisement">
                <div class="advert">
                    advertising
                </div>
            </div>
            
            <div class="sticky-header">
                <section id="header" class="clearfix">
                    <div class="logo">
                        <a href="<?php bloginfo('url' ); ?>">
                            <i class="icon-typelogo"></i>    
                        </a>
                    </div><!-- .logo -->

                    <div class="mob-menu">
                        <button id="menu-toggle" aria-role="toggle menu">
                            <i class="icon-menu"></i>
                        </button>                    
                    </div><!-- .mob-menu -->

                    <nav id="main-nav">
                        <?php $args = array('theme_location' => 'header_nav','menu' => '','container' => '', 'walker' => new Primary_Nav_Walker);
                            wp_nav_menu( $args ); 
                        ?>
                        <button id="search-toggle" class="search" aria-role="search toggle"></button>
                    </nav>
                    <div class="search-bar">
                        <?php get_search_form(); ?>
                    </div>
                </section><!-- #header -->                
            </div><!-- #sticky-header -->
