<?php 

/**
 * Add a checkbox on the donation form to ask the donor whether they would like to receive a donation receipt.
 *
 * @return  void
 */
function ed_add_donation_receipt_opt_out_checkbox() {
    $ticked = isset( $_POST[ 'donation_receipt_optout' ] ) && $_POST[ 'donation_receipt_optout' ];
    ?>
<div id="charitable_field_donation_receipt_optout" class="charitable-form-field charitable-form-field-checkbox">
    <input type="checkbox" name="donation_receipt_optout" value="1" <?php checked( $ticked ) ?> />
    <label for="charitable_field_donation_receipt_optout"><?php _e( 'I do not want to receive a receipt for tax deduction purposes.', 'your-namespace' ) ?></label>
</div>
    <?php 
}

add_filter( 'charitable_donation_form_donor_fields_after', 'ed_add_donation_receipt_opt_out_checkbox' );

/**
 * Add donation_receipt_optout to the list of meta fields to be saved. 
 *
 * @param   mixed[] $meta
 * @param   int $donation_id
 * @param   Charitable_Donation_Processor $processor
 * @return  mixed[]
 */
function ed_save_donation_receipt_opt_out_meta_field( $meta, $donation_id, Charitable_Donation_Processor $processor ) {
    $meta[ 'donation_receipt_optout' ] = $processor->get_donation_data_value( 'donation_receipt_optout' );    
    return $meta;
}

add_filter( 'charitable_donation_meta', 'ed_save_donation_receipt_opt_out_meta_field', 10, 3 );

/**
 * The value for donation_receipt_optout should always be either 1 or 0.  
 *
 * @return  int
 */
function ed_save_submitted_value_donation_receipt_opt_out( $values ) {
    $values[ 'donation_receipt_optout' ] = isset( $_POST[ 'donation_receipt_optout' ] ) && $_POST[ 'donation_receipt_optout' ] ? 1 : 0;
    return $values;
}

add_filter( 'charitable_donation_values', 'ed_save_submitted_value_donation_receipt_opt_out' );