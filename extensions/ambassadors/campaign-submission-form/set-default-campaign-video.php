<?php
/**
 * Set the default campaign video.
 *
 * @param  array $fields The fields in the Campaign Details section.
 * @return array Return the array of fields with the modified video value.
 */
function ed_charitable_set_default_campaign_video( $fields ) {
    if ( empty( $fields['video']['value'] ) ) {
		/**
		 * If no video has been set yet, set the value to
		 * the default video's ID.
		 *
		 * Replace 123 with the ID of your default video.
		 */
		$fields['video']['value'] = 'https://www.youtube.com/watch?v=NoXxAzhSZJw';
    }

    return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields', 'ed_charitable_set_default_campaign_video', 11 );