<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'WPselect' );
define( 'CHILD_THEME_URL', 'http://wpselect.com/' );

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

// Add support for custom background
add_theme_support( 'custom-background' );

// Add support for custom header
add_theme_support( 'genesis-custom-header', array(
	'width' => 1152,
	'height' => 120
) );

// Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

/** Add Adsense Widget Areas */
include_once( CHILD_DIR . '/lib/adsense-widgetize.php');

/** Add YARPP Related Posts */
add_action( 'genesis_after_post_content', 'wpselect_related_posts', 9 );
function wpselect_related_posts() {
	if ( is_single() && function_exists('related_posts') ) { 
		related_posts();
	}
}

/**
 * Customize post info
 * genesis/lib/structure/post.php
 */
add_filter( 'genesis_post_info', 'wpselect_post_info' );
function wpselect_post_info($post_info) {
if (!is_page()) {
    $post_info = 'Posted on [post_date] [post_edit] [post_comments]';
    return $post_info;
	}
}

/**
 * Customize footer
 * genesis/lib/structure/footer.php
 */
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'wpselect_do_footer' );
function wpselect_do_footer() {
    ?><div class="creds">
    <p>&copy; Copyright <?php echo date( 'Y' ); ?> <a title="wpselect.com" href="http://wpselect.com/">wpselect.com</a></p>
	<p>Powered by <a title="Genesis Framework" href="http://wpselect.com/go/genesis/">Genesis</a>, 
	<a title="Hosting by HostGator" href="http://wpselect.com/go/hostgator/">HostGator</a>, 
	and <a title="WordPress" href="http://wordpress.org/">WordPress</a></p>
	<p><a title="Privacy Policy" href="http://wpselect.com/privacy-policy/">Privacy Policy</a> &middot; 
	<a title="Disclaimer" href="http://wpselect.com/disclaimer/">Disclaimer</a> &middot; 
	<a title="FTC Disclosure" href="http://wpselect.com/ftc-disclosure/">FTC Disclosure</a> &middot; 
	<a title="Image Attribution" href="http://wpselect.com/image-attribution/">Image Attribution</a></p>
    </div><?php
}
