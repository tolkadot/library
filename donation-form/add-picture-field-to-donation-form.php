<?php
/**
 * In this example, a picture field is added to the donation form,
 * allowing donors to upload an image as part of the donation process.
 *
 * The picture ID is added in the donation meta, with a link to the
 * full image.
 */
add_action('init', function() {
	 /**
     * Define a new select field.
     */
    $field = new Charitable_Donation_Field( 'new_picture_field', array(
        'label' => __( 'New Picture Field', 'custom-namespace' ),
        'data_type' => 'meta',
		'value_callback' => function( Charitable_Abstract_Donation $donation ) {
			$picture_id = get_post_meta( $donation->ID, 'new_picture_field', true );
			return $picture_id ? '<a href="' . wp_get_attachment_image_url( $picture_id, 'full' ) . '">' . $picture_id . '</a>' : '-';
		},
        'donation_form' => array(
            'type' => 'picture',
            'show_before' => 'phone',
            'required' => false,
        ),
        'admin_form' => false,
        'show_in_meta' => true,
        'show_in_export' => false,
        'email_tag' => array(
            'description' => __( 'The new picture field' , 'charitable' ),
        ),
    ) );

    /**
     * Register the picture field.
     */
    charitable()->donation_fields()->register_field( $field );
});