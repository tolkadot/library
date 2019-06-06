<?php
/**
 * Add additional titles to the donation form.
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
