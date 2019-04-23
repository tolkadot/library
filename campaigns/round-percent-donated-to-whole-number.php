<?php
/**
 * Display percent donated as rounded whole number.
 *
 * @param   string $return
 * @param   int $percent
 * @return  string
 */
function ed_round_percent_donated_to_whole_number( $return, $percent ) {
    return ceil( $percent ) . '%';
}

add_filter( 'charitable_percent_donated', 'ed_round_percent_donated_to_whole_number', 10, 2 );