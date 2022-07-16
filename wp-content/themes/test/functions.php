<?php
/**
 * Test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function test_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Test, use a find and replace
		* to change 'test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'test', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'test' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'test_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_scripts() {
	wp_enqueue_style( 'test-style', get_template_directory_uri() . '/css/app.css' );
	wp_enqueue_style( 'test-sweet-style', get_template_directory_uri() . '/css/sweetalert.css' );
	wp_enqueue_script( 'test-app', get_template_directory_uri() . '/js/app.js' );
	wp_enqueue_script( 'test-sweet', get_template_directory_uri() . '/js/sweetalert.min.js' );
	wp_enqueue_script( 'test-navigation', get_template_directory_uri() . '/js/navigation.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Custom functions
 */

// Advanced Custom Fields - Product Fields
if( function_exists('acf_add_local_field_group') ):

// Product Fields - Group Registration
acf_add_local_field_group(array(
	'key' => 'product_custom_fields',
	'title' => 'Product Custom Fields',
	'fields' => array (),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			),
		),
	),
));

// Product Fields - Product Image
acf_add_local_field(array(
	'key' => 'field_1',
	'label' => 'Product Image',
	'name' => 'product_image',
	'type' => 'image',
	'parent' => 'product_custom_fields'
));

// Product Fields - Product Publish Date
acf_add_local_field(array(
	'key' => 'field_2',
	'label' => 'Product Publish Date',
	'name' => 'product_publish_date',
	'type' => 'date_picker',
	'parent' => 'product_custom_fields',
	'format' => 'd/m/Y'
));

// Product Fields - Product Type
acf_add_local_field(array(
	'key' => 'field_3',
	'label' => 'Product Type',
	'name' => 'product_type',
	'type' => 'select',
	'parent' => 'product_custom_fields',
	'choices' => array(
		' '	=> ' ',
		'rare'	=> 'Rare',
		'frequent'	=> 'Frequent',
		'unusual'	=> 'Unusual'
	)
));

endif;

// Woocommerce - Use ACF Image instead as Featured Image
function acf_set_featured_image( $value, $post_id, $field  ){
    
    if($value){
	    add_post_meta($post_id, '_thumbnail_id', $value);
    }
    return $value;
}

// acf/update_value/name={$field_name} - where $field_name is the name of your custom field
add_filter('acf/update_value/name=product_image', 'acf_set_featured_image', 10, 3);

// Edit Product - Custom Update Button
function custom_update_button( $post ){
    if ( get_post_type( $post ) == 'product' ){
        echo '<input id="update-product" class="replace_update button button-primary button-large" type="submit" value="UPDATE" />';
    } 
} 
add_action('post_submitbox_start', 'custom_update_button', 10, 1);

add_action( 'admin_enqueue_scripts', function() {
    wp_enqueue_script( 'unique-admin-script', get_template_directory_uri() . '/js/app.js' );
} );
// Edit Product - Clear Custom Fields Button
function clear_custom_fields_button( $post ){
    if ( get_post_type( $post ) == 'product' ){
        echo '<input id="clear-fields" style="margin-right: 10px;" class="clear_fields button" type="submit" value="CLEAR" />';
    } 
} 
add_action('post_submitbox_minor_actions', 'clear_custom_fields_button', 10 );

// Edit Product - Hide Old Update/Publish Button only on Edit Product Page
function hide_publishing_actions(){
        $my_post_type = 'product';
        global $post;
        if($post->post_type == $my_post_type){
            echo '
                <style>
				    #publishing-action { display: none; }
				</style>
			';
        }
}
add_action('admin_head-post.php', 'hide_publishing_actions');
add_action('admin_head-post-new.php', 'hide_publishing_actions');

// Edit Nav Menu Link
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="header__auth-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


add_action( 'post_edit_form_tag' , 'post_edit_form_tag' );
