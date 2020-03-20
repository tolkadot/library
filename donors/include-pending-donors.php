<?php
/**
 * By default, the Donors widget will only include donors with
 * Paid donations. With this snippet, you can make sure that
 * donors with Pending donations are also included.
 */
add_filter(
	'charitable_donors_widget_donor_query_args',
	function( $query_args ) {
		$query_args['status'][] = 'charitable-pending';
		return $query_args;
	}
);
