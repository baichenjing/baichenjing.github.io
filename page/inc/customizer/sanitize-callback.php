<?php
/**
 * Sanitization Functions
 *
 * @package Viable_Blog
 */

/**
 * Sanitization Function - Checkbox
 * 
 * @param $checked
 * @return bool
 */
if( !function_exists( 'viable_blog_sanitize_checkbox' ) ) :

	function viable_blog_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;

/**
 * Sanitization Function - Choices
 * 
 * @param $input, $setting
 * @return $input
 */
if( !function_exists( 'viable_blog_sanitize_choices' ) ) :

    function viable_blog_sanitize_choices( $input, $setting ) {
        global $wp_customize;
        
        if(!empty($input)){
            $input = array_map('absint', $input);
        }

        return $input;
    } 

endif;

/**
 * Sanitization Function - Select
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('viable_blog_sanitize_select') ) :

    function viable_blog_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
    
endif;

/**
 * Sanitization Function - Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('viable_blog_sanitize_number') ) :

    function viable_blog_sanitize_number( $input, $setting ) {

        $number = absint( $input );

        // If the input is a positibe number, return it; otherwise, return the default.
        return ( $number ? $number : $setting->default );
    }
    
endif;