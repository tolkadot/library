<?php
/**
 * Filter the email footer text & link.
 *
 * @param  string $text The default text.
 * @return string
 */
function ed_charitable_change_email_footer_text( $text ) {
    $text = 'Your footer text';
    $link = home_url();

    return '<a href="' . esc_url( $link ) . '">' . $text . '</a>';
}

add_filter( 'charitable_email_footer_text', 'ed_charitable_change_email_footer_text' );
