<?php
add_filter('the_content_more_link', 'blankslate_read_more_link');
function blankslate_read_more_link() {
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}
add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');
function blankslate_excerpt_read_more_link($more) {
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}
add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');
function blankslate_image_insert_override($sizes) {
    unset($sizes['medium_large']);
    return $sizes;
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
}
add_action('wp_head', 'blankslate_pingback_header');
function blankslate_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
function wpdocs_custom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'post')
        return 25;
    else
        return 18;
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

// Load the theme stylesheets
function theme_styles() {
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('carousel-css', get_template_directory_uri().'/css/owl.carousel.min.css');
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('responsive', get_template_directory_uri().'/css/responsive.css');
}
add_action('wp_enqueue_scripts', 'theme_styles');

// Load the theme jQuery Scripts   
function my_theme_scripts() {
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js');
 //  wp_enqueue_script('html5lightbox', get_template_directory_uri().'/js/html5lightbox.js');
   	wp_enqueue_script('my-script', get_template_directory_uri().'/js/owl.carousel.min.js');
 //    wp_enqueue_script('jq-js', get_template_directory_uri().'/js/jquery.fancybox.js');
    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');  

/* Custom POST Type */
function create_posttype() {
    register_post_type('nap',
                array(
        'labels' => array(
            'name' => __('NAP'),
            'singular_name' => __('NAP')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'nap'),
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

add_action('init', 'create_posttype');
// Our custom post type FAQs
function faqs_post() {
    $labels = array(
        'name' => __('FAQ'),
        'singular_name' => __('faq'),  
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,  
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'revisions')
    );
    register_post_type('FAQ', $args);
}
add_action('init', 'faqs_post');

/* * Team * */
function team_post_type() {
    register_post_type('Our Team', array(
        'labels' => array(
            'name' => __('Team'),
            'singular_name' => __('Team')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-book-alt',
        'has_archive' => false,
        'supports' => array('thumbnail', 'title', 'editor', 'custom-fields')
            )
    );
}
add_action('init', 'team_post_type'); 
function news_post_type() {
    register_post_type('In The News', array(
        'labels' => array(
            'name' => __('In The News'),
            'singular_name' => __('In The News')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-book-alt', 
        'has_archive' => false,
        'supports' => array('thumbnail', 'title', 'editor', 'custom-fields')
            )
    );
}
add_action('init', 'news_post_type');



/* * Case Review  * */
function case_post_type() {
    register_post_type('Case Review', array(
        'labels' => array(
            'name' => __('Case Review'),
            'singular_name' => __('Case Reviews')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-book-alt',  
        'has_archive' => false,
        'supports' => array('thumbnail', 'title', 'editor', 'custom-fields')
            )
    );
} 
add_action('init', 'case_post_type');

/* Video Post  */
function video_post_type() {
register_post_type('video', array(
        'labels' => array(
            'name' => __('Videos'),
            'singular_name' => __('video')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'video'),
        'supports' => array('title', 'thumbnail', 'editor'),
    ));
}
add_action('init', 'video_post_type');


// create a  faq taxonomy
function faqs_post_cat(){
    register_taxonomy(  
            'faqs_post_cat', 'faq', array(
        'label' => __('faqs Category'),
        'rewrite' => array('slug' => 'faqs_post_cat'),
        'has_archive' => true,
        'hierarchical' => true,
       )
    );
}
add_action('init', 'faqs_post_cat');


// Our custom post type function
function reviews_post() {
    $labels = array(
        'name' => __('Testimonials'),
        'singular_name' => __('testimonials'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'revisions')
    );

    register_post_type('Testimonials', $args); 
}
add_action('init', 'reviews_post');


/* new theme options for header and footer */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}


/* * **********Ipad Function************* */
add_filter('wp_is_mobile', 'mobile_edits');
function mobile_edits() {
    static $is_mobile;

    if (isset($is_mobile))
        return $is_mobile;

    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $is_mobile = false;
    } elseif (
            strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }
    return $is_mobile;
}
/*  Thank you  pages   */
add_action('wp_footer', 'redirect_cf7');
function redirect_cf7() {   ?>
    <script type="text/javascript">
         document.addEventListener('wpcf7mailsent', function (event) {
            if ('267' == event.detail.contactFormId) {
                location = '/sidebar-thank-you/';
            } else if ('228' == event.detail.contactFormId) {
                location = '/contact-us-thank-you/';
            } else if ('268' == event.detail.contactFormId) {
                location = '/404-error-thank-you/';
            } else if ('7' == event.detail.contactFormId) {
               location = '/home-thank-you/';
            }else if ('468' == event.detail.contactFormId) {
               location = '/trucking-accidents-thank-you/';
            }else if ('467' == event.detail.contactFormId) {
               location = '/accidents-thank-you/';
            }else if ('466' == event.detail.contactFormId) {
               location = '/personal-Injury-thank-you/'; 
            }else { 
            location = '/thank-you/';  
            } 
	    }, false);
				
    </script>  
    <?php }

/*  Disable the Schema - Yoast */
function disable_yoast_schema_data($data) {
    $data = array();
    return $data;
}

add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);
add_filter('style_loader_src', 'sdt_remove_ver_css_js', 9999, 2);
add_filter('script_loader_src', 'sdt_remove_ver_css_js', 9999, 2);

function sdt_remove_ver_css_js($src, $handle) {
    $handles_with_version = ['style']; // <-- Adjust to your needs!
    if (strpos($src, 'ver=') && !in_array($handle, $handles_with_version, true))
        $src = remove_query_arg('ver', $src);
    return $src;
}

function enable_extended_upload($mime_types = array()) {
    $mime_types['svg'] = 'application/svg';
    return $mime_types;
}
add_filter('upload_mimes', 'enable_extended_upload');

/**
 * Replace # with js
 * @param string $menu_item item HTML
 * @return string item HTML
 */
add_filter('walker_nav_menu_start_el', 'wpse_226884_replace_hash', 999);
function wpse_226884_replace_hash($menu_item) {
    if (strpos($menu_item, 'href="#"') !== false) {
        $menu_item = str_replace('href="#"', 'href="javascript:void(0);"', $menu_item);
    }
    return $menu_item;
}

add_filter('use_block_editor_for_post', '__return_false');
add_theme_support('post-thumbnails');

function mv_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_IE) {
                $classes[] = 'ie';
                if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                $classes[] = 'ie'.$browser_version[1];
        } else $classes[] = 'unknown';
        if($is_iphone) $classes[] = 'iphone';
        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
           }
        return $classes;
}
add_filter('body_class','mv_browser_body_class');
