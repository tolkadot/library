<?php
/**
 * By default, Charitable will hide the donor fields for users who
 * are logged in and have all the required fields filled out in their
 * profile. With this filter you can ensure that the fields are always
 * shown by default.
 */
add_filter( 'charitable_hide_fields_for_logged_in_users', '__return_false' );