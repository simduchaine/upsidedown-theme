<?php

/**
 * Upsidedown's functions and definitions
 *
 * @package Upsidedown
 * @since Upsidedown 1.0
 */
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */

if ( ! isset( $content_width ) )
    $content_width = 900; /* pixels */


if ( ! function_exists( 'upsidedown_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function upsidedown_setup() {
 
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'upsidedown', get_template_directory() . '/languages' );

    /*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
 
    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1330, 700, array( 'center', 'center')  ); // 50 pixels wide by 50 pixels tall, crop from the center
    	add_image_size( 'card', 580, 410, array( 'center', 'center' ) ); 


     /**
     * Custom background color.
     */
     add_theme_support( 'custom-background' );

 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'upsidedown' ),
    ) );
 
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'gallery', 'quote', 'image', 'video' ) );

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    // Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 440,
		'height'	  => 85,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' )
	) );
}
endif; // upsidedown_setup
add_action( 'after_setup_theme', 'upsidedown_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function upsidedown_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'upsidedown' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'upsidedown' ),
		'before_widget' => '<div id="%1$s" class="column widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'upsidedown' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'upsidedown' ),
		'before_widget' => '<div id="%1$s" class="column widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'upsidedown' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'upsidedown' ),
		'before_widget' => '<div id="%1$s" class="column widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Logo', 'upsidedown' ),
		'id'            => 'footer-logo',
		'description'   => __( 'Add <img /> here to appear as your footer logo.', 'upsidedown' ),
		'before_widget' => '<div id="%1$s" class="row logo %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="hidden">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Copyright', 'upsidedown' ),
		'id'            => 'copyright',
		'description'   => __( 'Add text widget here to appear in your copyright section.', 'upsidedown' ),
		'before_widget' => '<div id="%1$s" class="column copyright %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="timestamp">',
		'after_title'   => '</h6>',
	) );

}
add_action( 'widgets_init', 'upsidedown_widgets_init' );


/**
 * Change Cloud Tag Style and limit number of tags to show
 *
*/
function set_widget_tag_cloud_args($args) {
  $my_args = array('smallest' => 12, 'largest' => 18, 'orderby'=>'count', 'order'=>'DESC' );
  $args = wp_parse_args( $args, $my_args );
return $args;
}

//Limit number of tags inside widget
function tag_widget_limit($args){
 //Check if taxonomy option inside widget is set to tags
 if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
  $args['number'] = 15; //Limit number of tags
 }
 return $args;
}

add_filter('widget_tag_cloud_args','set_widget_tag_cloud_args');
add_filter('widget_tag_cloud_args', 'tag_widget_limit');



/**
 * Filter the excerpt length to 30 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function set_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'set_excerpt_length');


/**
 * Remove <p> tag before and after excerpt.
 *
*/
remove_filter( 'the_excerpt', 'wpautop' );


/**
* Remove JetPack sharing buttons from post excerpt
*/
add_action( 'init', 'jp_remove_excerpt_share' );

function jp_remove_excerpt_share() {
if ( has_filter( 'the_excerpt', 'sharing_display' ) ) {
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
	}
}


/**
* Give a button class to previous/next post anchor link
*/
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $injection = 'class="button gray-button"';
    return str_replace('<a href=', '<a '.$injection.' href=', $output);
}

/**
 * Include custom pagination template
 */
require_once( get_template_directory() .'/inc/custom-pagination.php' );


/**
 * Enqueue scripts and styles.
 */	
function add_theme_style() {
	wp_enqueue_style('roboto_font', 'https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic');
	wp_enqueue_style('josefin_lora_fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans|Lora:400,700');
	wp_enqueue_style('entypo_icon_font', 'http://weloveiconfonts.com/api/?family=entypo');
	wp_enqueue_style( 'normalize_css', get_template_directory_uri() . '/assets/css/normalize.css');
	wp_enqueue_style( 'milligram_min_css', get_template_directory_uri() . '/assets/css/milligram.min.css');
	wp_enqueue_style( 'style', get_stylesheet_uri() );	
}

function add_theme_script() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js');
	wp_enqueue_script( 'scrollspeed_js', get_template_directory_uri() . '/assets/js/jQuery.scrollSpeed.js', array('jquery'), false, true);
	wp_enqueue_script( 'plugin_js', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), false, true);
	wp_enqueue_script( 'main_js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), false, true);	
}

add_action( 'wp_enqueue_scripts', 'add_theme_style' );
add_action( 'wp_enqueue_scripts', 'add_theme_script' );


/**
 * Include better-comments template
 */
require_once( get_template_directory() .'/inc/better-comments.php' );

// filter to replace class on reply link
add_filter('comment_reply_link', 'replace_reply_link_class');

function replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='button", $class);
    return $class;
}

// filter to remove url/website field
function disable_comment_url($fields) { 
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','disable_comment_url');


/**
 * Include the TGM_Plugin_Activation class.
 *
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'upsidedown_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function upsidedown_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => true,
		),

		array(
			'name'      => 'Jetpack by WordPress.com',
			'slug'      => 'jetpack',
			'required'  => true,
		),

		array(
			'name'      => 'Instagram Feed',
			'slug'      => 'instagram-feed',
			'required'  => true,
		),

		array(
			'name'      => 'Adorable Avatars',
			'slug'      => 'adorable-avatars',
			'required'  => false,
		),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'upsidedown',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'upsidedown' ),
			'menu_title'                      => __( 'Install Plugins', 'upsidedown' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'upsidedown' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'upsidedown' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'upsidedown' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'upsidedown'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'upsidedown'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'upsidedown'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'upsidedown'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'upsidedown'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'upsidedown'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'upsidedown'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'upsidedown'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'upsidedown'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'upsidedown' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'upsidedown' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'upsidedown' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'upsidedown' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'upsidedown' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'upsidedown' ),
			'dismiss'                         => __( 'Dismiss this notice', 'upsidedown' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'upsidedown' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'upsidedown' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}





