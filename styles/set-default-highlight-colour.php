<?php 
/**
 * NOTE: This snippet will not work in versions of Charitable prior to 1.2. 
 * 
 * Set the default colour used by Charitable.
 *
 * @return  string
 */
function en_set_default_highlight_colour() {
    return '#123456';
}

add_filter( 'charitable_default_highlight_colour', 'en_set_default_highlight_colour' );