<?php 

/**
 * Change the donation period to week.
 *
 * @param   array $values The parsed donation values.
 * @return  array
 */
function ed_charitable_set_recurring_period_to_week( $values ) {
    if ( array_key_exists( 'donation_period', $values ) ) {
        $values['donation_period'] = 'week';
    }

    if ( ! array_key_exists( 'campaigns', $values ) ) {
        return $values;
    }

    if ( array_key_exists( 'donation_period', $values['campaigns'][0] ) ) {
        $values['campaigns'][0]['donation_period'] = 'week';
    }

    return $values;
}

add_filter( 'charitable_donation_values', 'ed_charitable_set_recurring_period_to_week' );

/**
 * This changes the text in the donation form and admin to refer to weekly donations. 
 *
 * @param   string $translation The translation of the text.
 * @param   string $text        The original text.
 * @param   string $domain      The "domain" of the translation. Unique to each plugin.
 * @return  string
 */
function ed_charitable_change_monthly_to_weekly( $translation, $text, $domain ) {
    if ( 'charitable-recurring' != $domain ) {
        return $translation;
    }

    switch ( $translation ) {
        case 'month' : 
            $translation = 'week';
            break;

        case '%s months' : 
            $translation = '%s weeks';
            break;

        case 'Make it monthly' : 
            $translation = 'Make it weekly';
            break;

        case 'Custom monthly amount' : 
            $translation = 'Custom weekly amount';
            break;

        case 'Enter monthly donation amount' : 
            $translation = 'Enter weekly donation amount';
            break;

        case 'Your Monthly Donation' : 
            $translation = 'Your Weekly Donation';
            break;

        case 'Monthly Donation' : 
            $translation = 'Weekly Donation';
            break;   
    }

    return $translation;
}

add_filter( 'gettext', 'ed_charitable_change_monthly_to_weekly', 10, 3 );

/**
 * Change the recurring periods text.
 *
 * This catches a couple words/phrases that are not affected by the function above.
 *
 * @param   array $periods The periods.
 * @return  array
 */
function ed_charitable_change_recurring_periods_text( $periods ) {
    $periods['month'] = $periods['week'];
    return $periods;
}

add_filter( 'charitable_recurring_periods', 'ed_charitable_change_recurring_periods_text' );
