<!DOCTYPE html>
<!--
 .d8888b.  8888888b.  Y88b   d88P       888      8888888888 8888888888 888    d8P         d8888 8888888b.  8888888 88888888888  .d8888b.                                          
d88P  Y88b 888   Y88b  Y88b d88P        888      888        888        888   d8P         d88888 888  "Y88b   888       888     d88P  Y88b                                         
Y88b.      888    888   Y88o88P         888      888        888        888  d8P         d88P888 888    888   888       888     Y88b.                                              
 "Y888b.   888   d88P    Y888P          888      8888888    8888888    888d88K         d88P 888 888    888   888       888      "Y888b.                                           
    "Y88b. 8888888P"      888           888      888        888        8888888b       d88P  888 888    888   888       888         "Y88b.                                         
      "888 888            888           888      888        888        888  Y88b     d88P   888 888    888   888       888           "888                                         
Y88b  d88P 888            888           888      888        888        888   Y88b   d8888888888 888  .d88P   888       888     Y88b  d88P                                         
 "Y8888P"  888            888           88888888 8888888888 888        888    Y88b d88P     888 8888888P"  8888888     888      "Y8888P"                                          
888b     d888 8888888888 8888888b.  888     888        d8888        .d88888b.  888    d8P   .d88888b.  888b    888 88888888888        d8888                                       
8888b   d8888 888        888  "Y88b 888     888       d88888       d88P" "Y88b 888   d8P   d88P" "Y88b 8888b   888     888           d88888                                       
88888b.d88888 888        888    888 888     888      d88P888       888     888 888  d8P    888     888 88888b  888     888          d88P888                                       
888Y88888P888 8888888    888    888 888     888     d88P 888       888     888 888d88K     888     888 888Y88b 888     888         d88P 888                                       
888 Y888P 888 888        888    888 888     888    d88P  888       888     888 8888888b    888     888 888 Y88b888     888        d88P  888                                       
888  Y8P  888 888        888    888 888     888   d88P   888       888     888 888  Y88b   888     888 888  Y88888     888       d88P   888                                       
888   "   888 888        888  .d88P Y88b. .d88P  d8888888888       Y88b. .d88P 888   Y88b  Y88b. .d88P 888   Y8888     888      d8888888888                                       
888       888 8888888888 8888888P"   "Y88888P"  d88P     888        "Y88888P"  888    Y88b  "Y88888P"  888    Y888     888     d88P     888      
   -->
   
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
            <div class="section">
                <div class="advertisement banner">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Large Leaderboard -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:970px;height:90px"
                         data-ad-client="ca-pub-1566926890494756"
                         data-ad-slot="7646876626"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>                
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