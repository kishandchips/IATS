<?php
define('THEME_NAME', 'IATS');

$template_directory_uri = get_template_directory_uri();
$template_directory = get_template_directory();

// Enable Features
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'video', 'gallery' ) );
add_editor_style('/css/editor-style.css');
register_nav_menus(array(
	'header_nav' => 'Main Header Menu',
	'footer_nav' => 'Footer Menu',
	'' => '')
);

// Image sizes
add_image_size('gallery-slide',1000, 600, false );
add_image_size('gallery-thumb', 150, 150, true );
add_image_size('nav-thumb', 250, 150, true );
add_image_size('grid', 425,425, true);

// Add Actions
add_action( 'after_setup_theme', 'custom_after_setup_theme' );
add_action( 'wp_enqueue_scripts', 'custom_styles', 30 );
add_action( 'wp_enqueue_scripts', 'custom_scripts', 30 );
add_action( 'widgets_init', 'register_widgets');
add_action( 'template_include', 'load_single_template');
add_action( "gform_field_standard_settings", "custom_gform_standard_settings", 10, 2);
add_action( 'gform_enqueue_scripts',"custom_gform_enqueue_scripts", 10, 2);

// Functions
function custom_after_setup_theme(){
	global $template_directory;

	require($template_directory.'/inc/primary-nav-walker.php');
	require($template_directory.'/inc/custom-comment-walker.php');
}

function custom_styles(){
	global $template_directory_uri;
	wp_enqueue_style('main', $template_directory_uri . '/css/main.css');
}

function custom_scripts(){
	global $template_directory_uri;
	wp_localize_script( 'main', 'url', array(
		'template' => $template_directory_uri,
		'base' => site_url(),
	));
	
	wp_enqueue_script('modernizr', $template_directory_uri . '/js/vendor/modernizr-2.6.1.min.js', array('jquery'), '', false);
    wp_enqueue_script('sidebar', $template_directory_uri . '/js/vendor/sidebar.js', array('jquery'), '', true);
	wp_enqueue_script('flexslider', $template_directory_uri . '/js/vendor/jquery.flexslider.js', array('jquery'), '', true);
	wp_enqueue_script('imagesLoaded', $template_directory_uri . '/js/vendor/imagesloaded.js', array('jquery'), '', true);
	wp_enqueue_script('isotope', $template_directory_uri . '/js/vendor/isotope.js', array('jquery'), '', true);
	wp_enqueue_script('matchHeight', $template_directory_uri . '/js/vendor/matchheight.min.js', array('jquery'), '', true);
	wp_enqueue_script('main', $template_directory_uri . '/js/main.js', array('jquery'), '', true);
}

function register_widgets(){
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Sidebar' ),
			'description' => __( 'Sidebar' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

    register_sidebar(
        array(
            'id' => 'secondary',
            'name' => __( 'Category Sidebar' ),
            'description' => __( 'Category Page Sidebar' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );

	register_sidebar(
		array(
			'id' => 'footer',
			'name' => __( 'Footer' ),
			'description' => __( 'Footer Widgets' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);

	register_sidebar(
		array(
			'id' => 'social',
			'name' => __( 'Social' ),
			'description' => __( 'Social Widgets' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);

	require(get_template_directory().'/inc/widgets/nav-latest.php');
    require(get_template_directory().'/inc/widgets/twitter/feed.php');
    require(get_template_directory().'/inc/widgets/custom-recent-posts.php');

	register_widget( 'Nav_Latest' );
}

//TOP LEVEL CAT
function top_level_cat(){
	$categories = get_the_category();
	foreach ($categories as $category) {
		if($category->category_parent == 0){
			return $category->term_id;
		}
	}
}

// FITNESS CATEGORY
function fitness_cat(){
 $category = get_the_category(); 
 $categories = array(); 

 foreach ($category as $cat){
 	if($cat->category_parent !== 0){
		$categories[] = $cat->name; 
 	}
 }

 $classes = implode(' ', $categories);
 return strtolower($classes);
}

// CUSTOM POST FORMAT TEMPLATES
function load_single_template($template) {
  $new_template = '';
 
  // single post template
  if( is_single() ) {
    global $post;
 
    // template for post with video format
    if ( has_post_format( 'video' )) {
		// use template file single-video.php for video format
		$new_template = locate_template(array('single-video.php' ));
    } else if (has_post_format( 'gallery' )){
		// use template file single-video.php for video format
      	$new_template = locate_template(array('single-gallery.php' ));
    }
 
  }
  return ('' != $new_template) ? $new_template : $template;
}

//PLACEHOLDER FOR GF
function custom_gform_standard_settings($position, $form_id){
    if($position == 25){
    	?>
        <li style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text</label>
            <input type="text" id="field_placeholder" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php
    }
}
function custom_gform_enqueue_scripts($form, $is_ajax=false){
    ?>
<script>
    jQuery(function(){
        <?php
        foreach($form['fields'] as $i=>$field){
            if(isset($field['placeholder']) && !empty($field['placeholder'])){
                ?>
                jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');
                <?php
            }
        }
        ?>
    });
    </script>
    <?php
}

//Twitter

function getTwitterFollowers($screenName = 'inattheside')
{
    // some variables
    $consumerKey = 'IbKWr3rwpptkszys4F7LpAcfy';
    $consumerSecret = 'sfkBRcj5cPvzACOpa9my1yr6SMK8Z8zA97lwV9sa7YDAbKkn6R';
    $token = get_option('cfTwitterToken');
 
    // get follower count from cache
    $numberOfFollowers = get_transient('cfTwitterFollowers');
 
    // cache version does not exist or expired
    if (false === $numberOfFollowers) {
        // getting new auth bearer only if we don't have one
        if(!$token) {
            // preparing credentials
            $credentials = $consumerKey . ':' . $consumerSecret;
            $toSend = base64_encode($credentials);
 
            // http post arguments
            $args = array(
                'method' => 'POST',
                'httpversion' => '1.1',
                'blocking' => true,
                'headers' => array(
                    'Authorization' => 'Basic ' . $toSend,
                    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
                ),
                'body' => array( 'grant_type' => 'client_credentials' )
            );
 
            add_filter('https_ssl_verify', '__return_false');
            $response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);
 
            $keys = json_decode(wp_remote_retrieve_body($response));
 
            if($keys) {
                // saving token to wp_options table
                update_option('cfTwitterToken', $keys->access_token);
                $token = $keys->access_token;
            }
        }
        // we have bearer token wether we obtained it from API or from options
        $args = array(
            'httpversion' => '1.1',
            'blocking' => true,
            'headers' => array(
                'Authorization' => "Bearer $token"
            )
        );
 
        add_filter('https_ssl_verify', '__return_false');
        $api_url = "https://api.twitter.com/1.1/users/show.json?screen_name=$screenName";
        $response = wp_remote_get($api_url, $args);
 
        if (!is_wp_error($response)) {
            $followers = json_decode(wp_remote_retrieve_body($response));
            $numberOfFollowers = $followers->followers_count;
        } else {
            // get old value and break
            $numberOfFollowers = get_option('cfNumberOfFollowers');
            // uncomment below to debug
            //die($response->get_error_message());
        }
 
        // cache for an hour
        set_transient('cfTwitterFollowers', $numberOfFollowers, 1*60*60);
        update_option('cfNumberOfFollowers', $numberOfFollowers);
    }
 
    return $numberOfFollowers;
}

//CDN
function cdnify($url)
{
    return str_replace([
        site_url(false, 'http') . '/wp-content/uploads',
        site_url(false, 'https') . '/wp-content/uploads',
        'http://134.213.53.187/wp-content/uploads',
        'https://134.213.53.187/wp-content/uploads'
    ], [
        'http://8e3e9343ba79890fa866-de14c4817643e8b76b6ae36789eb89da.r42.cf3.rackcdn.com',
        'https://270d40956d33bdd1c081-de14c4817643e8b76b6ae36789eb89da.ssl.cf3.rackcdn.com',
        'http://8e3e9343ba79890fa866-de14c4817643e8b76b6ae36789eb89da.r42.cf3.rackcdn.com',
        'https://270d40956d33bdd1c081-de14c4817643e8b76b6ae36789eb89da.ssl.cf3.rackcdn.com',
    ], $url);
}

add_filter('wp_get_attachment_url', 'cdnify');

// WOOCOMMERCE

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);

 return $tabs;
}