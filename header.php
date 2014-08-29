<!DOCTYPE html>
<!--                                                                                                                                                                 
 ad88888ba   88888888ba  8b        d8  88           88888888888  88888888888  88      a8P          db         88888888ba,    88  888888888888  88   ad88888ba   
d8"     "8b  88      "8b  Y8,    ,8P   88           88           88           88    ,88'          d88b        88      `"8b   88       88       88  d8"     "8b  
Y8,          88      ,8P   Y8,  ,8P    88           88           88           88  ,88"           d8'`8b       88        `8b  88       88       88  Y8,          
`Y8aaaaa,    88aaaaaa8P'    "8aa8"     88           88aaaaa      88aaaaa      88,d88'           d8'  `8b      88         88  88       88       88  `Y8aaaaa,    
  `"""""8b,  88""""""'       `88'      88           88"""""      88"""""      8888"88,         d8YaaaaY8b     88         88  88       88       88    `"""""8b,  
        `8b  88               88       88           88           88           88P   Y8b       d8""""""""8b    88         8P  88       88       88          `8b  
Y8a     a8P  88               88       88           88           88           88     "88,    d8'        `8b   88      .a8P   88       88       88  Y8a     a8P  
 "Y88888P"   88               88       88888888888  88888888888  88           88       Y8b  d8'          `8b  88888888Y"'    88       88       88   "Y88888P"                                                                                                                                                              
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
        </div><!-- cash money -->
            
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