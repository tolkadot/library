<?php 
/**
 * Remove campaign length field and add an end date field instead.
 */
function ed_charitable_replace_campaign_length_with_end_date_field( $fields, $form ) {    
    unset( $fields['length'] );

    $fields['end_date'] = array(
        'label'     => __( 'End Date', 'ed-charitable' ), 
        'type'      => 'datepicker',
        'priority'  => 8, 
        'required'  => true, 
        'data_type' => 'meta',
        'editable'  => false,
    );

    if ( $form->get_campaign() ) {
        $fields['end_date']['value'] = $form->get_campaign()->get_end_date();
    }    

    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_replace_campaign_length_with_end_date_field', 10, 2 );

/**
 * Correctly handle an empty end date (when no end date is set).
 *
 * @param  string $end_date           The formatted end date.
 * @param  string $submitted_end_date The submitted value.
 * @return string|int The formatted end date, or 0 if there is no end date.
 */
function ed_charitable_format_empty_end_date( $end_date, $submitted_end_date ) {
	if ( 0 == $submitted_end_date ) {
		$end_date = 0;
	}

	return $end_date;
}

add_filter( 'charitable_ambassadors_get_formatted_end_date', 'ed_charitable_format_empty_end_date', 10, 2 );
