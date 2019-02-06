<?php
/**
 * Set the default campaign image.
 *
 * @param  array $fields The fields in the Campaign Details section.
 * @return array Return the array of fields with the modified image value.
 */
function ed_charitable_set_default_campaign_image( $fields ) {
    if ( empty( $fields['image']['value'] ) ) {
		/**
		 * If no image has been set yet, set the value to
		 * the default image's ID.
		 *
		 * Replace 123 with the ID of your default image.
		 */
		$fields['image']['value'] = 123;
    }

    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_set_default_campaign_image' );
