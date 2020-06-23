<?php
/**
 * Add additional titles to the donation form.
 *
 * NOTE: This snippet will not work if you add it to your theme's
 * functions.php file, since that is loaded after the filter below
 * is run. Instead, add it to a custom plugin or with the Code
 * Snippets plugin.
 *
 * @param  array $titles The default donation titles.
 * @return array
 */
add_filter(
	'charitable_gift_aid_donor_title_options',
	function( $titles ) {
		$titles[] = 'Sir';
		return $titles;
	}
);
