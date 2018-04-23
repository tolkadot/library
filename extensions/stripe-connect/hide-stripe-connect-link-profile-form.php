<?php
/**
 * The following snippet removes the link on the profile form that
 * prompts users to connect their Stripe account. It only removes
 * the link for users who have not created a campaign; any user who
 * has created a campaign but hasn't connected an account will still
 * see the link.
 *
 * @param  array $fields The form fields to show in the "Your Social Profiles" section.
 * @return array
 */
function ed_charitable_maybe_remove_stripe_connect_link( $fields ) {
    if ( ! array_key_exists( 'stripe_connect', $fields ) ) {
        return $fields;
    }

    $query = new WP_Query( array(
        'posts_per_page' => -1,
        'post_type'      => 'campaign',
        'post_status'    => 'any',
        'fields'         => 'ids',
        'author'         => get_current_user_id(),
    ) );

    if ( 0 === $query->found_posts ) {
        unset( $fields['stripe_connect'] );
    }

    return $fields;
}

add_action( 'charitable_user_social_fields', 'ed_charitable_maybe_remove_stripe_connect_link', 20 );
