<?php

// Remove meta generator
remove_action( 'wp_head', 'wp_generator' );

// Stop caption hard coded width
//add_filter( 'img_caption_shortcode_width', '__return_zero' );
add_filter('shortcode_atts_caption', 'fixExtraCaptionPadding');
function fixExtraCaptionPadding($attrs)
{
	if (!empty($attrs['width'])) {
		$attrs['width'] -= 10;
	}
	return $attrs;
}
	
// Theme support elements
function archetype_theme_setup() {
	// Add logo to customiser with ability to choose whether name and description shown
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' )
	);
	add_theme_support( 'custom-logo', $defaults );
	// Newer way of adding meta title
	add_theme_support( 'title-tag' );
	// Support Featured Images
	add_theme_support( 'post-thumbnails' ); 
}
add_action( 'after_setup_theme', 'archetype_theme_setup' );


// Add customiser live update for blog name and description, just shows nothing without this
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function susty_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'susty_wp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'susty_wp_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'susty_wp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function susty_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function susty_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

// Customiser theme colours
// https://stackoverflow.com/questions/36786520/how-to-add-color-option-in-wordpress-customize
function mytheme_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here
	$wp_customize->add_setting( 'body_textcolour' , array(
		'default'     => "#000000",
		'transport'   => 'refresh',
	) );
	$wp_customize->add_setting( 'heading_textcolour' , array(
		'default'     => "#000000",
		'transport'   => 'refresh',
	) );
	$wp_customize->add_setting( 'link_colour' , array(
		'default'     => "#000000",
		'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_textcolour', array(
		'label'      => __( 'Text Color', 'mytheme' ),
		'section'    => 'colors',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_textcolour', array(
		'label'      => __( 'Heading Color', 'mytheme' ),
		'section'    => 'colors',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
		'label'      => __( 'Link Color', 'mytheme' ),
		'section'    => 'colors',
	) ) );
}
add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_css()
{
	?>
	<style type="text/css">
		body, #headerLogo a { color: <?php echo get_theme_mod('body_textcolour', "#000000"); ?>; }
		h1,h2,h3,h4,h5,h6 { color: <?php echo get_theme_mod('heading_textcolour', "#000000"); ?>; }
		a, a:visited { color: <?php echo get_theme_mod('link_colour', "#000000"); ?>; } 
		button, .btn, input[type="button"], input[type="submit"] { background-color: <?php echo get_theme_mod('link_colour', "#000000"); ?>; }
		button.menu-trigger { background-color:transparent; }
	</style>
	<?php
}
add_action( 'wp_head', 'mytheme_customize_css');



// Remove admin bar
//show_admin_bar(false);




// Remove CSS files - find the handle in the plugin file and add here
function remove_unwanted_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wc-blocks-style' );
	wp_dequeue_style( 'global-styles' );
	wp_deregister_style('classic-theme-styles');
	wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts','remove_unwanted_css', 100);



// Custom read more function - use echo excerpt(25); to output in theme
function custom_read_more() {
    return '... <a class="read-more" href="'.get_permalink(get_the_ID()).'">Read more</a>';
}
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, custom_read_more());
}


// Admin login page css
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


// Custom admin CSS to remove plugin ads
function registerCustomAdminCss(){
	$src = "/wp-content/themes/archetype/style-admin.css";
	$handle = "customAdminCss";
	wp_register_script($handle, $src);
	wp_enqueue_style($handle, $src, array(), false, false);
    }
add_action('admin_head', 'registerCustomAdminCss');


// Add button class to blog pagination links
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="btn"';
}


// Remove emoji stuff
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 


// remove jquery migrate
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );
function remove_jquery_migrate( &$scripts)
{
    if(!is_admin())
    {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}

// Disable theme editing
define( 'DISALLOW_FILE_EDIT', true );


// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


// Register Main Menu 
function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu', 'intention-archetype' ));
  register_nav_menu('footer-menu',__( 'Footer Menu', 'intention-archetype' ));
}
add_action( 'init', 'register_my_menu' );


// Add menu parent item classes
//add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item'; 
		}
	}
	return $items;    
}


// Register sidebars
function sidebar_widgets_init() {
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}
add_action( 'widgets_init', 'sidebar_widgets_init' );





// Load Scripts Properly
function my_scripts_method() {
	
	// Add match height script
	//wp_register_script('match-script', get_template_directory_uri() . '/js/jquery.matchHeight.min.js', array('jquery'));
	//wp_enqueue_script('match-script');
		
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );




// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}


// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );
function tuts_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Positive',
            'selector' => 'p',
            'classes' => 'positive',
        ),
        array(
            'title' => 'Error',
            'selector' => 'p',
            'classes' => 'negative',
        ),
        array(
            'title' => 'Warning',
            'selector' => 'p',
            'classes' => 'warning',
        ),
		array(
			'title' => 'Smaller text',
			'selector' => 'p',
			'classes' => 'smallText',
		),
		array(
			'title' => 'Larger text',
			'selector' => 'p',
			'classes' => 'largeText',
		),
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'btn',
        )
    );
    $settings['style_formats'] = json_encode( $style_formats );
    
    $settings['theme_advanced_blockformats'] = 'p,h3,h4';
    $settings['theme_advanced_disable'] = 'forecolor';
    
    return $settings;
}


// Add editor fonts/styles
function my_theme_add_editor_styles() {
    add_editor_style( 'style-editor.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


// Remove WPCF7 stylesheet
add_filter( 'wpcf7_load_css', '__return_false' );

// Stop WPCF7 adding P tags to forms
add_filter('wpcf7_autop_or_not', '__return_false');

// Move JavaScript from the Head to the Footer
function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);
   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
//add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
 
// END Move JavaScript
