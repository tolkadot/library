<?php 

/**
 * This function adds a custom select field to the campaign submission form.
 *
 * @param   array                                $fields
 * @param   Charitable_Ambassadors_Campaign_Form $form
 * @return  array
 */
function ed_charitable_add_campaign_form_select_field( $fields, $form ) {

    /**
     * Retrieve the current value of the field in the form.
     */
    $value = $form->get_campaign_value( 'custom_select_field' ); 
    
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

    /**
     * Add the field to the array of fields.
     */
    $fields['custom_select_field'] = array(
        'value'     => $value,
        'priority'  => 1, // Adjust this to change where the field is inserted.
        'data_type' => 'meta',
        'label'     => __( 'Custom Field', 'custom-namespace' ),
        'required'  => true,
        'clear'     => false,
        'type'      => 'select',
        'options'   => $options,
    );

     return $fields;
}

add_filter( 'charitable_campaign_submission_campaign_fields' , 'ed_charitable_add_campaign_form_select_field', 10, 2 ); 

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


