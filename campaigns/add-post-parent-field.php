<?php
/**
 * Register a Post Parent field for campaigns.
 *
 * This will allow the campaign post parent to be edited in the
 * campaign management page in the WordPress dashboard.
 */
function ed_charitable_register_campaign_post_parent_field() {
    $campaigns = get_posts( array(
        'post_type'      => Charitable::CAMPAIGN_POST_TYPE,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ) );

    $options = array(
        0 => 'No Parent',
    );

    $options = $options + array_combine(
        $campaigns,
        array_map( 'get_the_title', $campaigns )
    );

    $field = new Charitable_Campaign_Field( 'post_parent', array(
        'label'          => 'Post Parent',
        'data_type'      => 'core',
        'value_callback' => 'charitable_get_campaign_post_field',
        'admin_form'     => array(
            'priority' => 1,
            'type'     => 'select',
            'options'  => $options,
        )
    ));
    
    charitable()->campaign_fields()->register_field( $field );
}

add_action( 'init', 'ed_charitable_register_campaign_post_parent_field' );
