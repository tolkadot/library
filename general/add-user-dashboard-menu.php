<?php

/**
 * By default, Charitable includes a User Dashboard menu, but
 * this is not automatically added unless the theme builds
 * in support for it.
 *
 * If you want to include the User Dashboard menu at the top
 * of all pages that are included in the User Dashboard,
 * you can user the following snippet of code.
 */

if ( ! function_exists( 'charitable_add_user_dashboard_menu' ) ) {

	function charitable_add_user_dashboard_menu( WP_Query $query ) {
		if ( ! $query->is_main_query() ) {
			return;
		}

		if ( ! charitable_get_user_dashboard()->in_nav() ) {
			return;
		}

		charitable_get_user_dashboard()->nav( array(
			'container_class' => 'user-dashboard-menu',
		) );
	}

	add_action( 'loop_start', 'charitable_add_user_dashboard_menu', 1 );

}
