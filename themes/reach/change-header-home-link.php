<?php
/**
 * By default, Reach will show a link to your home url in the header
 * with your site title or logo. You can replace this with a custom link
 * using the example below.
 */
add_filter(
	'reach_site_title',
	function( $title ) {
		return str_replace( 'default-home-link.com', 'custom-home-link.com', $title );
	}
);
