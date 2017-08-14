<?php

/**
 * To prevent users from editing existing campaigns, you need to remove all
 * links to the edit page for published campaigns, and also remove the form
 * from the edit page if they happen to get to it.
 *
 * Besides the code below, you also need to remove the link in the [charitable_my_campaigns]
 * shortcode. To do that, do the following:
 *
 * 1. In your theme/child theme, create a file at your-theme/charitable/charitable-ambassadors/my-campaigns/campaign-actions.php
 * 2. Copy and paste the contents of the following file in Charitable Ambassadors into this: charitable-ambassadors/templates/my-campaigns/campaign-actions.php
 * 3. You can now customize the version in your theme/child theme without changing Charitable Ambassadors itself.
 */

/**
 * Prevent users from creating a new campaign.
 *
 * @param   array $args
 * @return  array
 */
function ed_charitable_disable_editing_of_published_campaigns( $args ) {
    $campaign_id = get_query_var( 'campaign_id', false );

    if ( ! $campaign_id || 'publish' != get_post_status( $campaign_id ) ) {
        return;
    }

    $args['hidden'] = true;

    return $args;
}

add_filter( 'charitable_campaign_submission_form_args', 'ed_charitable_disable_editing_of_published_campaigns' );

/**
 * Change the campaign editing link so it only appears for non-published campaigns.
 */
function charitable_ambassadors_template_edit_campaign_link() {
    if ( ! is_single()
        || 'campaign' != get_post_type()
        || 'publish' == get_post_status()
        || ! charitable_is_current_campaign_creator( get_the_ID() )
        ) {
        return false;
    }

    charitable_ambassadors_template( 'edit-campaign-link.php' );

    return true;
}
