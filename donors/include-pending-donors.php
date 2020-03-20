<?php
/**
 * By default, the Donors widget & shortcode will only include donors with
 * Paid donations. With this snippet, you can make sure that
 * donors with Pending donations are also included.
 */
function ed_include_pending_donors_in_donors_widget_shortcode( $query_args ) {
	$query_args['status'] = [ 'charitable-pending', 'charitable-completed', 'charitable-preapproved' ];
	return $query_args;
}

add_filter( 'charitable_donors_widget_donor_query_args', 'ed_include_pending_donors_in_donors_widget_shortcode' );
add_filter( 'charitable_donors_shortcode_donor_query_args', 'ed_include_pending_donors_in_donors_widget_shortcode' );
