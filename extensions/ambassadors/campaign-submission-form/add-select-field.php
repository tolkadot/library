<?php
/**
 * This function adds a custom select field to the campaign submission
 * form, as well as the admin campaign editor, campaign emails, and
 * campaign export.
 *
 * Note: This example requires Ambassadors 2+. For an example that worked
 * on previous version, see the link below.
 *
 * @see https://github.com/Charitable/library/blob/master/extensions/ambassadors/legacy/add-select-field.php
 *
 * @return void
 */
add_action( 'init', function() {
	$fields = charitable()->campaign_fields();

     /**
      * Set up the options that people can choose from in the select.
      *
      * You could also get options dynamically from a set of posts,
      * pages or custom post types, for example.
      *
      * @see ed_charitable_get_select_field_options()
      */
    $options = array(
        'yes' => __( 'Yes', 'custom-namespace' ),
        'no'  => __( 'No', 'custom-namespace' ),
    );

	/* Create the field. */
	$field = new Charitable_Campaign_Field(
		'custom_select_field',
		[
			'label'          => 'Custom Select Field',
			'data_type'      => 'meta',
			'campaign_form'  => [
				'required' => true,
				'type'     => 'select',
				'section'  => 'campaign-details',
				'options'  => $options,
			],
			'admin_form'     => true,
			'show_in_export' => true,
			'email_tag'      => true,
		]
	);

	// Register the field.
	$fields->register_field( $field );
} );

/**
 * This function shows how you can generate your list of options based on a
 * WP_Query result, which can be useful if you need to allow your campaign
 * creators to select from a list of posts, pages or another custom post type.
 *
 * @return  array
 */
function ed_charitable_get_select_field_options() {

    /**
     * @see https://codex.wordpress.org/Class_Reference/WP_Query
     */
    $query   = get_posts( array(
        'posts_per_page' => -1,
        'post_type'      => 'pages',
        'fields'         => 'ids',
    ) );

    $options = array();

    foreach ( $query as $post_id ) {
        $options[ $post_id ] = get_post_field( 'post_title', $post_id );
    }

    return $options;
}
