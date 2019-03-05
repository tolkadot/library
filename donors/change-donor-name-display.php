<?php
/**
 * Change the donors widget so only the first name and last name
 * initial of the donor are shown.
 *
 * @param  string $name The name to be displayed
 * @param  array  $args Arguments passed to the donor-loop/donor.php template.
 * @return string
 */
add_filter( 'charitable_donor_loop_donor_name', function( $name, $args ) {

    $donor = $args['donor'];

    $first_name = $donor->get_donor_meta( 'first_name' );
    $last_name  = $donor->get_donor_meta( 'last_name' );

    $name = $first_name . ' ' . strtoupper( substr( $last_name, 0, 1 ) );

    return $name;

}, 10, 2 );