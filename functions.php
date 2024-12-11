<?php
/**
 * Custom functions for Archetype theme
 *
 * @package Archetype
 */

/**
Remove meta generator.
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Fix ridiculous hard coded extra 10px width on captions.
 *
 * @param string $attrs does a thing.
 */
function fix_extra_caption_padding( $attrs ) {
	if ( ! empty( $attrs['width'] ) ) {
		$attrs['width'] -= 10;
	}
	return $attrs;
}
add_filter( 'shortcode_atts_caption', 'fix_extra_caption_padding' );

/**
 * Theme support elements.
 */
function archetype_theme_setup() {
	/**
	Add logo to customiser with ability to choose whether name and description shown.
	 */
	$defaults = array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
	/**
	Newer way of adding meta title.
	 */
	add_theme_support( 'title-tag' );
	/**
	Support Featured Images.
	 */
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'archetype_theme_setup' );


/**
 * Add customiser live update for blog name and description, just shows nothing without this.
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

/**
 * Customiser theme colours.
 * https://stackoverflow.com/questions/36786520/how-to-add-color-option-in-wordpress-customize.
 *
 * @param WP_Customize_Manager $wp_customize Object that holds the customizer data.
 */
function mytheme_customize_register( $wp_customize ) {
	/**
	 * All our sections, settings, and controls will be added here.
	 */
	$wp_customize->add_setting(
		'body_background',
		array(
			'default'   => '#fcfcfc',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_setting(
		'body_textcolour',
		array(
			'default'   => '#042825',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_setting(
		'heading_textcolour',
		array(
			'default'   => '#042825',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_setting(
		'link_colour',
		array(
			'default'   => '#00804D',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_setting(
		'link_hover_colour',
		array(
			'default'   => '#00D581',
			'transport' => 'refresh',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_background',
			array(
				'label'   => __( 'Background', 'mytheme' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_textcolour',
			array(
				'label'   => __( 'Text Colour', 'mytheme' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'heading_textcolour',
			array(
				'label'   => __( 'Heading Colour', 'mytheme' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_colour',
			array(
				'label'   => __( 'Link Colour', 'mytheme' ),
				'section' => 'colors',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_hover_colour',
			array(
				'label'   => __( 'Link Hover Colour', 'mytheme' ),
				'section' => 'colors',
			)
		)
	);
}
add_action( 'customize_register', 'mytheme_customize_register' );

/**
 * Add customizer styles to header of front end.
 */
function mytheme_customise_css() {
	?>
	<!-- User editable styles from customiser -->
	<style type="text/css">
		body { background-color: <?php echo esc_html( get_theme_mod( 'body_background', '#fcfcfc' ) ); ?>;	}
		body, #headerLogo a { color: <?php echo esc_html( get_theme_mod( 'body_textcolour', '#042825' ) ); ?>; }
		h1,h2,h3,h4,h5,h6 { color: <?php echo esc_html( get_theme_mod( 'heading_textcolour', '#042825' ) ); ?>; }
		a, a:visited { color: <?php echo esc_html( get_theme_mod( 'link_colour', '#00804D' ) ); ?>; } 
		button, .btn, input[type="button"], input[type="submit"] { background-color: <?php echo esc_html( get_theme_mod( 'link_colour', '#00804D' ) ); ?>; }
		button.menu-trigger { background-color:transparentx; }
		
		a:hover { color: <?php echo esc_html( get_theme_mod( 'link_hover_colour', '#00D581' ) ); ?>; }
		.button:hover, .btn:hover, input[type="submit"]:hover, input[type="reset"]:hover, input[type="button"]:hover { background-color: <?php echo esc_html( get_theme_mod( 'link_hover_colour', '#00D581' ) ); ?>; }
	</style>
	<?php
}
add_action( 'wp_head', 'mytheme_customise_css' );


/**
 * Remove CSS files - find the handle in the plugin file and add here.
 */
function remove_unwanted_css() {
	wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_unwanted_css', 100 );


/**
 * Add theme's CSS file.
 */
function archetype_css() {
	wp_enqueue_style( 'archetype-style', get_stylesheet_uri(), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'archetype_css', 200 );


/**
Custom read more function.
 */
function custom_read_more() {
	return '... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">Read more</a>';
}

/**
 * Custom excerpt - use echo excerpt(25); to output in theme.
 *
 * @param integer $limit Length of excerpt passed from get_the template tag.
 */
function excerpt( $limit ) {
	return wp_trim_words( get_the_excerpt(), $limit, custom_read_more() );
}

/**
 * Remove link from author name in comments section.
 */
function remove_author_url() {
	return '';
}
add_filter( 'get_comment_author_url', 'remove_author_url', 10, 3 );


/**
 * Admin login page CSS
 */
function my_login_stylesheet() {
	wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/style-login.css', 1.0, true );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


/**
 * Custom admin CSS to remove plugin ads etc.
 */
function register_custom_admin_css() {
	wp_enqueue_style( 'custom_admin_css', get_template_directory_uri() . '/style-admin.css', array(), 1.0, true );
}
add_action( 'admin_footer', 'register_custom_admin_css' );


/**
 * Add button class to blog pagination links.
 */
function posts_link_attributes() {
	return 'class="btn"';
}
add_filter( 'next_posts_link_attributes', 'posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'posts_link_attributes' );

/**
 * Remove emoji junk.
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
 * Remove jQuery migrate.
 *
 * @param array $scripts List of scripts loaded by WP.
 */
function remove_jquery_migrate( &$scripts ) {
	if ( ! is_admin() ) {
		$scripts->remove( 'jquery' );
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

/**
 * Disable theme editing.
 */
define( 'DISALLOW_FILE_EDIT', true );


/**
 * Move Yoast to bottom.
 */
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom' );


/**
 * Register Main Menu.
 */
function register_my_menu() {
	register_nav_menu( 'main-menu', __( 'Main Menu', 'intention-archetype' ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', 'intention-archetype' ) );
}
add_action( 'init', 'register_my_menu' );



/**
 * Register sidebars.
 */
function sidebar_widgets_init() {
	register_sidebar(
		array(
			'name'          => 'Blog Sidebar',
			'id'            => 'blog-sidebar',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		),
	);
	register_sidebar(
		array(
			'name'          => 'Page Sidebar',
			'id'            => 'page-sidebar',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'sidebar_widgets_init' );



/**
 * Load Scripts Properly.
 */
function my_scripts_method() {
	/**
	Add match height script.
	// wp_register_script('archetype-script', get_template_directory_uri() . '/js/jquery.archetype.min.js', array('jquery'));
	// wp_enqueue_script('archetype-script', true);*/
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


/**
 * Callback function to insert styleselect into the buttons array.
 *
 * @param array $buttons List of buttons loaded by WP editor.
 */
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

/**
 * Set up additional styles for editor button
 *
 * @param array $settings List of settings loaded by WP editor.
 */
function tuts_mce_before_init( $settings ) {
	$style_formats                           = array(
		array(
			'title'    => 'Positive',
			'selector' => 'p',
			'classes'  => 'positive',
		),
		array(
			'title'    => 'Error',
			'selector' => 'p',
			'classes'  => 'negative',
		),
		array(
			'title'    => 'Warning',
			'selector' => 'p',
			'classes'  => 'warning',
		),
		array(
			'title'    => 'Smaller text',
			'selector' => 'p',
			'classes'  => 'smallText',
		),
		array(
			'title'    => 'Larger text',
			'selector' => 'p',
			'classes'  => 'largeText',
		),
		array(
			'title'    => 'Button',
			'selector' => 'a',
			'classes'  => 'btn',
		),
	);
	$settings['style_formats']               = wp_json_encode( $style_formats );
	$settings['theme_advanced_blockformats'] = 'p,h3,h4';
	$settings['theme_advanced_disable']      = 'forecolor';

	return $settings;
}
add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );

/**
 * Add editor fonts/styles.
 */
function my_theme_add_editor_styles() {
	add_editor_style( 'style-editor.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
