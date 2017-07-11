<?php
/**
 * Some themes automatically add a link to edit a post via the dashboard, and this
 * can appear to campaign creators. The following snippet removes it.
 *
 * @param   string $link    The link to return.
 * @param   int    $post_id The current post ID.
 * @return  string
 */
function ed_charitable_remove_edit_post_link_for_campaign_creators( $link, $post_id ) {
    if ( Charitable::CAMPAIGN_POST_TYPE != get_post_type( $post_id ) ) {
        return $link;
    }

    if ( ! current_user_can( 'edit_posts' ) ) {
        return;
    }

    return $link;
}

add_filter( 'get_edit_post_link', 'ed_charitable_remove_edit_post_link_for_campaign_creators', 10, 2 );