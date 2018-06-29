<?php
/**
 * Add additional field data to send to MailChimp when a donor 
 * subscribes. This example assumes that you have created a custom
 * donation field in your form with a key of 'my_custom_field' and
 * the data_type set to 'user'.
 *
 * Besides adding this, you also need to add this as a list field
 * in your MailChimp account. In your MailChimp dashboard, go to
 * Lists and click on the list you are adding subscribers to.
 *
 * Next, under the Settings menu, click on "List fields and *|MERGE|* tags".
 *
 * On the following screen, click on Add a Field and then define
 * your new field. Make sure that the tag you choose corresponds
 * to the one in the code snippet below (i.e. CUSTOMFIELD).
 *
 * @see https://mailchimp.com/help/manage-list-and-signup-form-fields/
 */
function ed_charitable_add_mailchimp_merge_field_data( $data, $user ) {
    if ( array_key_exists( 'my_custom_field', $user ) ) {
        $data['merge_fields']['CUSTOMFIELD'] = $user['my_custom_field'];
    }

    return $data;
}

add_filter( 'charitable_newsletter_connect_mailchimp_subscriber_data', 'ed_charitable_add_mailchimp_merge_field_data', 10, 2 );
