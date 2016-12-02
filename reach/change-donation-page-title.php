<?php 

/**
 * On the Donation page, customize the title shown in the banner.
 *
 * @param   string $title
 * @return  string
 */
function ed_set_donation_page_banner_title( $title ) {
    if ( charitable_is_page( 'campaign_donation_page' ) ) {
        $title = 'Donation to ' . $title;
    }

    return $title;
}

add_filter( 'reach_banner_title', 'ed_set_donation_page_banner_title' );