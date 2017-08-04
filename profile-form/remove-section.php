<?php
/**
 * You may decide that you do not need some of the sections in the Profile form at all. 
 * This code will allow you to remove an entire section.
 *
 * If you just want to remove individual fields from a section, use this instead:
 * https://github.com/Charitable/library/blob/master/forms/general/remove-form-fields.php
 * 
 * These are the sections in the profile form:
 * 
 * user_fields
 * password_fields
 * address_fields
 * social_fields
 *
 * @param  array $section The sections in the form.
 * @return array
 */
function ed_charitable_remove_profile_form_section( $sections ) {
    // Remove the Address section.
    unset( $sections['address_fields'] );
    
    return $sections;
}

add_filter( 'charitable_user_profile_fields', 'ed_charitable_remove_profile_form_section' );
