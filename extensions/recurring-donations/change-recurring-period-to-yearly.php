<?php 
/**
 * Change the donation period to year.
 *
 * @param   array $values The parsed donation values.
 * @return  array
 */
function ed_charitable_set_recurring_period_to_year( $values ) {
    if ( array_key_exists( 'donation_period', $values ) ) {
        $values['donation_period'] = 'year';
    }

    if ( ! array_key_exists( 'campaigns', $values ) ) {
        return $values;
    }

    if ( array_key_exists( 'donation_period', $values['campaigns'][0] ) ) {
        $values['campaigns'][0]['donation_period'] = 'year';
    }

    return $values;
}

add_filter( 'charitable_donation_values', 'ed_charitable_set_recurring_period_to_year' );

/**
 * This changes the text in the donation form and admin to refer to yearly donations. 
 *
 * @param   string $translation The translation of the text.
 * @param   string $text        The original text.
 * @param   string $domain      The "domain" of the translation. Unique to each plugin.
 * @return  string
 */
function ed_charitable_change_monthly_to_yearly( $translation, $text, $domain ) {
    if ( 'charitable-recurring' != $domain ) {
        return $translation;
    }

    switch ( $translation ) {
        case 'month' : 
            $translation = 'year';
            break;
        case '%s months' : 
            $translation = '%s years';
            break;
        case 'Make it monthly' : 
            $translation = 'Make it yearly';
            break;
        case 'Custom monthly amount' : 
            $translation = 'Custom yearly amount';
            break;
        case 'Enter monthly donation amount' : 
            $translation = 'Enter annual donation amount';
            break;
        case 'Your Monthly Donation' : 
            $translation = 'Your Annual Donation';
            break;
        case 'Monthly Donation' : 
            $translation = 'Yearly Donation';
            break;
        case 'Monthly' :
            $translation = 'Annually';
            break;
    }

    return $translation;
}

add_filter( 'gettext', 'ed_charitable_change_monthly_to_yearly', 10, 3 );

/**
 * Change the recurring periods text.
 *
 * This catches a couple words/phrases that are not affected by the function above.
 *
 * @param   array $periods The periods.
 * @return  array
 */
function ed_charitable_change_recurring_periods_text( $periods ) {
    $periods['month'] = $periods['year'];
    return $periods;
}

add_filter( 'charitable_recurring_periods', 'ed_charitable_change_recurring_periods_text' );
