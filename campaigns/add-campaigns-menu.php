<?php 

/**
 * This function will add a top-level Campaigns menu tab to the menu
 * in the WordPress dashboard.
 *
 * For the most part this isn't required, but you may find it more
 * convenient this way.
 *
 * Another situation in which you might need this is if you are using
 * MailPoet (less than version 3) and you want an automatic newsletter
 * for campaigns, since MailPoet won't allow automated newsletters from
 * campaigns unless they appear in the menu.
 */
function ed_charitable_add_campaigns_to_admin_menu( $post_type ) {
    $post_type['show_in_menu'] = true;
    return $post_type;
}

add_filter( 'charitable_campaign_post_type', 'ed_charitable_add_campaigns_to_admin_menu' );
