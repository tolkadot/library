<?php 

/**
 * This code snippet shows you how to add some text before a form's fields.
 * In this example, we add something at the start of the donation form, but
 * you can adapt this to be used for other forms in Charitable.
 *
 * @param   Charitable_Form $form
 * @return  void
 */
function ed_charitable_add_snippet_before_form_fields( $form ) {

    /** 
     * This is how we make sure it's the form we want to change. For other
     * forms, replace Charitable_Donation_Form with the form class name:
     *
     * --- Donation form - Charitable_Donation_Form
     * --- Profile form - Charitable_Profile_Form
     * --- Registration form - Charitable_Registration_Form
     * --- Forgot Password form - Charitable_Forgot_Password_Form
     * --- Reset Password form - Charitable_Reset_Password_Form
     * --- Campaign form (Ambassadors) - Charitable_Ambassadors_Campaign_Form
     */
    if ( ! is_a( $form, 'Charitable_Donation_Form' ) ) {
        return;
    }
    
    /**
     * Next we close the PHP tags so that we can just display some HTML.
     */
?>

    <p>This is my special extra text before form fields.</p>

<?php
}

add_action( 'charitable_form_before_fields', 'ed_charitable_add_snippet_before_form_fields' );