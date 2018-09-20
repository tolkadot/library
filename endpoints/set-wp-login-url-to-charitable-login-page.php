<?php
/**
 * Always use the Charitable login page as the login.
 *
 * @param string $login_url    The login URL. Not HTML-encoded.
 * @param string $redirect     The path to redirect to on login, if supplied.
 * @param bool   $force_reauth Whether to force reauthorization, even if a cookie is present.
 */
function ed_charitable_set_login_page_as_login_url( $login_url ) {
	$page = charitable_get_option( 'login_page', 'wp' );

	if ( 'wp' !== $page ) {
		$login_url = add_query_arg( array(
			'redirect'     => $redirect,
			'force_reauth' => $force_reauth,
		), get_permalink( $page ) );
	}

	return $login_url;
}

add_filter( 'login_url', 'ed_charitable_set_login_page_as_login_url' );
