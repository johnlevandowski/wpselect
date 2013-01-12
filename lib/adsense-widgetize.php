<?php
/**
 * Add Adsense Widget Areas.
 * genesis/lib/functions/widgetize.php
 */

/**
 * Before Content Sidebar Wrap Widget Area
 * Displays on all pages except single posts
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_before_content_sidebar_wrap',
		'name'			=> __( 'Before Content Sidebar Wrap', 'genesis' ),
		'description'	=> __( 'Displays on all pages except single posts.', 'genesis' ),
	)
);

add_action( 'genesis_before_content_sidebar_wrap', 'wpselect_before_content_sidebar_wrap' );
function wpselect_before_content_sidebar_wrap() {
	if ( !is_single() ) {
		genesis_widget_area( 'wpselect_before_content_sidebar_wrap', array(
		'before' => '<div class="wpselect_before_content_sidebar_wrap widget-area">',
		) );
	}
}

/**
 * Before Loop Widget Area
 * Displays on all pages except single posts
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_before_loop',
		'name'			=> __( 'Before Loop', 'genesis' ),
		'description'	=> __( 'Displays on all pages except single posts.', 'genesis' ),
	)
);

add_action( 'genesis_before_loop', 'wpselect_before_loop', 1 );
function wpselect_before_loop() {
	if ( !is_single() ) {
		genesis_widget_area( 'wpselect_before_loop', array(
		'before' => '<div class="wpselect_before_loop widget-area">',
		) );
	}
}

/**
 * After First Post Widget Area
 * Displays on archive pages after first post
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_after_post',
		'name'			=> __( 'After First Post', 'genesis' ),
		'description'	=> __( 'Displays on archive pages after first post.', 'genesis' ),
	)
);

add_action( 'genesis_after_post', 'wpselect_after_post' );
function wpselect_after_post() {
	global $loop_counter; //important, this makes the variable available within this function.
	if ( !is_singular() && $loop_counter == 0 ) {
		genesis_widget_area( 'wpselect_after_post', array(
		'before' => '<div class="wpselect_after_post widget-area">',
		) );
	}
}

/**
 * After Second Post Widget Area
 * Displays on archive pages after second post
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_after_post_2',
		'name'			=> __( 'After Second Post', 'genesis' ),
		'description'	=> __( 'Displays on archive pages after second post.', 'genesis' ),
	)
);

add_action( 'genesis_after_post', 'wpselect_after_post_2' );
function wpselect_after_post_2() {
	global $loop_counter; //important, this makes the variable available within this function.
	if ( !is_singular() && $loop_counter == 1 ) {
		genesis_widget_area( 'wpselect_after_post_2', array(
		'before' => '<div class="wpselect_after_post widget-area">',
		) );
	}
}

/**
 * Before Post Content Widget Area
 * Displays on single posts before post content
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_before_post_content',
		'name'			=> __( 'Before Post Content', 'genesis' ),
		'description'	=> __( 'Displays on single posts before post content.', 'genesis' ),
	)
);

add_action( 'genesis_before_post_content', 'wpselect_before_post_content' );
function wpselect_before_post_content() {
	if ( is_single() ) {
		genesis_widget_area( 'wpselect_before_post_content', array(
		'before' => '<div class="wpselect_before_post_content widget-area">',
		) );
	}
}

/**
 * After Post Content Widget Area
 * Displays on single posts after post content
 */
genesis_register_sidebar(
	array(
		'id'			=> 'wpselect_after_post_content',
		'name'			=> __( 'After Post Content', 'genesis' ),
		'description'	=> __( 'Displays on single posts after post content.', 'genesis' ),
	)
);

add_action( 'genesis_after_post_content', 'wpselect_after_post_content', 1 );
function wpselect_after_post_content() {
	if ( is_single() ) {
		genesis_widget_area( 'wpselect_after_post_content', array(
		'before' => '<div class="wpselect_after_post_content widget-area">',
		) );
	}
}

/** AdSense Section Targeting */
add_action( 'genesis_before_content', 'wpselect_ad_section_before_content' );
function wpselect_ad_section_before_content() { ?>
	<!-- google_ad_section_start -->
<?php
}

add_action( 'genesis_after_content', 'wpselect_ad_section_after_content' );
function wpselect_ad_section_after_content() { ?>
	<!-- google_ad_section_end -->
<?php
}
