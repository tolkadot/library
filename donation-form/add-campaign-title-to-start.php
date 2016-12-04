<?php 

/**
 * This snippet shows you how you can easily add the campaign name
 * as a heading before the donation form.
 *
 * @param   Charitable_Form $form
 * @return  void
 */
function ed_show_campaign_title_before_donation_before( $form ) {

    if ( ! is_a( $form, 'Charitable_Donation_Form_Interface' ) ) {
        return;
    }

    echo '<h3>' . get_the_title( $form->get_campaign()->ID ) . '</h3>';
}

add_action( 'charitable_form_before_fields', 'ed_show_campaign_title_before_donation_before' );
