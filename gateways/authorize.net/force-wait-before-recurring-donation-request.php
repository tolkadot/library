<?php
/**
 * Force a 10 second wait before executing the API request.
 *
 * Note that this only applies to recurring donations; the OTS Token
 * error only seems to happen for recurring donations.
 *
 * This filter will only work in Charitable Authorize.Net 1.2+.
 *
 * @return int The number of seconds to wait.
 */
add_filter( 'charitable_authorize_net_wait_before_request', function() {
	return 10;
} );