<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Replace WP search with Addsearch.
 *
 * @since  1.1.0
 * @param  string $form Search form
 * @return string Modified search form
 */
function addsearch_search_form( $form ) {
	
	$addsearch_settings     = get_option( 'addsearch_settings' );
	$addsearch_customer_key = $addsearch_settings[ 'customer_key' ];
	
	/* Bail if there is no customer key. */
	if( empty( $addsearch_customer_key ) ) {
		return $form;
	}
	
	$format = current_theme_supports( 'html5', 'search-form' ) ? 'html5' : 'xhtml';
	
	if ( 'html5' == $format ) {
		
		$form = '<form role="search" class="search-form">
				<label>
					<span class="screen-reader-text">' . _x( 'Search for:', 'label', 'addsearch' ) . '</span>
					<input type="search" class="addsearch search-field" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder', 'addsearch' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'addsearch' ) . '" />	                                </label>
				</label>
				<input type="submit" class="search-submit" value="'. esc_attr_x( 'Search', 'submit button', 'addsearch' ) .'" />
		</form>';
	} else {
		$form = '<form role="search" id="searchform" class="searchform">
				<div>
					<label class="screen-reader-text" for="s">' . _x( 'Search for:', 'label', 'addsearch' ) . '</label>
					<input type="text" class="addsearch" value="' . get_search_query() . '" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="'. esc_attr_x( 'Search', 'submit button', 'addsearch' ) .'" />
				</div>
			</form>';
	}

	return $form;
	
}
add_filter( 'get_search_form', 'addsearch_search_form', 20 );