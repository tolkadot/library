<?php

/**
 * Display a specific campaign's donation form.
 *
 * To integrate this snippet, you will need to insert it
 * into a custom template in your theme.
 */

/* Replace 123 with the ID of the campaign. */
$campaign_id = 123;

/* This displays the campaign's donation form in the page. */
charitable_get_campaign( $campaign_id )->get_donation_form()->render();
