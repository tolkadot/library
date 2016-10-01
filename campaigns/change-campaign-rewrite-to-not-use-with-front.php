<?php 

/**
 * Customizes the definition of the campaign post type, setting the
 * with_front option to false.
 *
 * @param   array $post_type_args
 * @return  array
 */
function ed_set_campaign_post_type_to_not_use_front( $post_type_args ) {
    $post_type_args['rewrite']['with_front'] = false;
    return $post_type_args;
}

add_filter( 'charitable_campaign_post_type', 'ed_set_campaign_post_type_to_not_use_front' );
