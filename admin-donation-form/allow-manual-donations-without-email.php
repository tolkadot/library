<?php
/**
 * Allow donors to be be added without an email address.
 *
 * Prior to Charitable 1.6, this was never permitted. As of Charitable 1.6, it's possible
 * to support manual donations without an email address by using this filter.
 *
 * NOTE: By default, the public donation form still requires an email address, so this
 * only affects programattically created donors, or donors created via manual donations
 * in the admin.
 */
add_filter( 'charitable_permit_donor_without_email', '__return_true' );
