<?php
/**
 * Customize the search text
 * genesis/lib/structure/search.php
 */
add_filter( 'genesis_search_text', 'wpselect_search_text');
function wpselect_search_text() {
	return esc_attr__( 'Google Search ...', 'genesis' );
}

/**
 * Customize the search form
 * genesis/lib/structure/search.php
 */
add_filter( 'genesis_search_form', 'wpselect_search_form', 10, 4);
function wpselect_search_form( $form, $search_text, $button_text, $label ) {
	$onfocus = " onfocus=\"if (this.value == '$search_text') {this.value = '';}\"";
	$onblur  = " onblur=\"if (this.value == '') {this.value = '$search_text';}\"";

	$form = '
		<form method="get" class="searchform search-form" action="' . home_url() . '/google-cse/" >
			' . $label . '
			<input type="text" value="' . esc_attr( $search_text ) . '" name="q" class="s search-input"' . $onfocus . $onblur . ' />
			<input type="submit" class="searchsubmit search-submit" value="' . esc_attr( $button_text ) . '" />
		</form>
	';
	return $form;
}
