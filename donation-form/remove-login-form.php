<?php

/**
 * Remove the login prompt from being displayed before the donation form.
 */
function ed_remove_login_form_before_donation_form() {
    remove_action( 'charitable_donation_form_before', 'charitable_template_donation_form_login', 4 );
}

add_action( 'after_setup_theme', 'ed_remove_login_form_before_donation_form', 20 );