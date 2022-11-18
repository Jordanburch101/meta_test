<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/* ================== Scripts/Styles ======================== */

function meta_resources() {
     wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/libraries/bootstrap.min.css');
     wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/libraries/all.min.css');
     wp_enqueue_style('style', get_stylesheet_uri());
     wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.1.0', true );
     wp_enqueue_script( 'webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.2/webfont.js', array('jquery'), '1.6.26', true );
     wp_enqueue_script( 'meta-js', get_template_directory_uri() . '/js/meta.js', array('jquery'), '1', true );
 }
 add_action('wp_enqueue_scripts', 'meta_resources');

/* Add Latest Jquery */
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', get_template_directory_uri() . '/js/jQuery.min.js', false, null);
   wp_enqueue_script('jquery');
}

// Add title tag to header
add_theme_support( 'title-tag' );

/* ================== Image Sizes ======================== */

/* Image Sizes */
add_image_size('medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );
add_image_size('large', get_option( 'large_size_w' ), get_option( 'large_size_h' ), true );


/* ================== Admin layouts ======================== */

/* Move Yoast to bottom */
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/* Disable XML-RPC */
add_filter( 'xmlrpc_enabled', '__return_false' );

/* Hide Meta Boxes */
add_action( 'do_meta_boxes', 'remove_default_custom_fields_meta_box', 1, 3 );
function remove_default_custom_fields_meta_box( $post_type, $context, $post ) {
    remove_meta_box( 'postcustom', $post_type, $context );
    remove_meta_box( 'commentstatusdiv', $post_type, $context );
    remove_meta_box( 'commentsdiv', $post_type, $context );
}

add_action('wp_dashboard_setup', 'remove_all_dashboard_meta_boxes', 9998 );

function remove_all_dashboard_meta_boxes()
{
    global $wp_meta_boxes;
    $wp_meta_boxes['dashboard']['normal']['core'] = array();
    $wp_meta_boxes['dashboard']['side']['core'] = array();
}

// Remove tags from posts
function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');

// Remove comments from admin bar
function my_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );

/* ================== Menus ======================== */

/* Add Menus */
function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

/* Add Wrappers for Sub Menus */
class megaMenu extends Walker_Nav_Menu {
    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // build html
        if ($display_depth == 1) {
            $output .= "\n" . $indent . '
            <div class="sub-menu-wrap">
            <div class="container">
              <div class="row">
                <ul class="' . $class_names . ' col-12">' . "\n";
        } else {
            $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
        }
    }
}


/* ================== CPTS ======================== */ 

function register_custom_post_types() {
    register_post_type( 'part',
        array(
            'labels' => array(
                            'name' => __( 'Parts' ),
                            'singular_name' => __( 'Part' ),
                            'add_new' => __( 'Add New ' ),
                            'add_new_item' => __( 'Add New ' ),
                            'edit' => __( 'Edit ' ),
                            'edit_item' => __( 'Edit ' ),
                            'new_item' => __( 'New ' ),
                            'view' => __( 'View ' ),
                            'view_item' => __( 'View ' ),
                            'search_items' => __( 'Search ' ),
                            'not_found' => __( 'Nothing found' ),
                            'not_found_in_trash' => __( 'Nothing found in Trash' ),
                            'parent' => __( 'Parent' ),
                            'description' => __( '' ),
                        ),
                       
                        'public' => true,
                        'show_ui' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => false,
                        'menu_position' => 5,
                        'hierarchical' => true,
                        'query_var' => true,
                        'has_archive' => false,
                        'menu_icon'   => 'dashicons-products',
                        'rewrite' => array('with_front' => false,'slug' => 'find-parts/parts'),
                       'supports' => array( 'title', 'editor','page-attributes')
        )
    ); 
}
add_action( 'init', 'register_custom_post_types' );


/* ================== ACF ======================== */

/* Add ACF Options Page */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Contact Info',
        'menu_title'    => 'Contact Info',
        'menu_slug'     => 'contact-info',
        'icon_url'      => 'dashicons-share',
        'position'      => 6,
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/* Add Names to ACF Areas */
function my_acf_flexible_content_layout_title( $title, $field, $layout, $i ) {
    // load text sub field
    if( $text = get_sub_field('heading') ) {
        $title .= ' - '. $text ;
    }
    // return
    return $title;
}
add_filter('acf/fields/repeater/layout_title', 'my_acf_flexible_content_layout_title', 10, 4);
add_filter('acf/fields/flexible_content/layout_title', 'my_acf_flexible_content_layout_title', 10, 4);

/* ================== Woocommerce ======================== */

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


/* ================== Blog ======================== */

function wpdocs_custom_excerpt_length( $length ) {
   return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wpdocs_excerpt_more( $more ) {
   return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need
    $output = "<div class=\"px-0 gallery\">\n";
    $output .= "<div class=\"px-0 container-fluid\">\n";
    $output .= "<div class=\"row g-4\">\n";
    $output .= "<div class='my-5 g-3 gallery row'>\n";
    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');

        $output .= "<div class='col-4 col-lg-3'>\n";
        $output .= "<div class='img-wrap h-100'>\n";
        $output .= "<img data-fancybox='gallery' src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />\n";
        $output .= "</div>\n";
        $output .= "</div>\n";
    }

    $output .= "</div>\n";
    $output .= "</div>\n";
    $output .= "</div>\n";
    $output .= "</div>\n";

    return $output;
}

/* ================== Custom Login ======================== */

function meta_custom_login() { ?>
  <style type="text/css">
      #login h1 a, .login h1 a {
      background: transparent url(<?php bloginfo('template_directory'); ?>/images/meta-logo-small.webp) no-repeat 50% 5%;
      background-size: contain;
      margin: 0px auto 25px auto;
      overflow: hidden;
      text-indent: -9999px;
      height: 100px;
      width: 100px;
    }
    body {
      height: 100vh;
      -webkit-background-size: cover !important;
      -moz-background-size: cover !important;
      -o-background-size: cover !important;
      background-size: cover !important;
      background-position-x: center !important;
      background-position-y: center !important;
      background-image: url(<?php bloginfo('template_directory'); ?>/images/meta-bg.webp) !important;
      background-repeat: no-repeat !important;
      background-attachment: fixed !important;
    }
    #wrap {
      margin-top: 0px !important;
    margin-right: auto !important;
    margin-bottom: 0px !important;
    margin-left: auto !important;
    position: absolute !important;
    top: 0 !important;
    bottom: 0 !important;
    left: 0 !important;
    background-color: #fcfcfc !important;
    width: 40% !important;
    min-width: 350px !important;
    display: flex !important;
    align-items: center !important;
    /* Slide in animation */
    transition: all .8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform: translateX(-100%);
    }
    .language-switcher {
      display: none !important;
    }
    .message {
      border-left: 4px solid #72aee6;
      padding: 12px;
      margin-left: 0;
      margin-bottom: 20px;
      background-color: #fff;
      box-shadow: 0 1px 1px 0 rgb(0 0 0 / 10%);
      word-wrap: break-word;
    }
    #login {
      opacity: 0;
      transition: transform 0.5s ease-in-out;
    }
    .login form {
      background-color: #fcfcfc !important;
      border-width: 0px !important;
      box-shadow: none !important;
      padding: 24px 0 !important;
    }
  </style>
  <script>
    // Create a wrap div and insert everything in body into it after page load
    window.addEventListener('load', function() {
      const wrap = document.createElement('div');
      wrap.id = 'wrap';
      while (document.body.firstChild) {
        wrap.appendChild(document.body.firstChild);
      }
      document.body.appendChild(wrap);
      // append message div after first h1 in body 
      const message = document.createElement('div');
      message.innerHTML = '<p>Need help logging in? Email our support team at <a href="tel:support@metadigital.co.nz">support@metadigital.co.nz</a></p>';
      message.classList.add('message');
      document.body.querySelector('h1').after(message);
      // Slide in wrap on load after 2 seconds
      setTimeout(function() {
        wrap.style.transform = 'translateX(0)';
      }, 100);
      // Fade in #login on load
      document.getElementById('login').style.opacity = '1';
    });
  </script>
<?php }
add_action( 'login_enqueue_scripts', 'meta_custom_login' );

function wpb_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );

function wpb_login_logo_url_title() {
  return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

?>