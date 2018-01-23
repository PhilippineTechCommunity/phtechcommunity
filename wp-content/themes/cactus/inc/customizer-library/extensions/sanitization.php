<?php
/**
 * Customizer Sanization
 *
 */

if ( ! function_exists( 'customizer_library_sanitize_text' ) ) :
/**
 * Sanitize a string to allow only tags in the allowedtags array.
 *
 * @param  string    $string    The unsanitized string.
 * @return string               The sanitized string.
 */
function customizer_library_sanitize_text( $string ) {
	global $allowedtags;
	return wp_kses( $string , $allowedtags );
}
endif;

if ( ! function_exists( 'customizer_library_sanitize_checkbox' ) ) :
/**
 * Sanitize a checkbox to only allow 0 or 1
 *
 * @param  boolean    $value    The unsanitized value.
 * @return boolean				The sanitized boolean.
 */
function customizer_library_sanitize_checkbox( $value ) {
	if ( $value == 1 ) {
		return 1;
    } else {
		return 0;
    }
}
endif;

if ( ! function_exists( 'customizer_library_sanitize_choices' ) ) :
/**
 * Sanitize a value from a list of allowed values.
 *
 * @param  mixed    $value      The value to sanitize.
 * @param  mixed    $setting    The setting for which the sanitizing is occurring.
 * @return mixed                The sanitized value.
 */
function customizer_library_sanitize_choices( $value, $setting ) {
	if ( is_object( $setting ) ) {
		$setting = $setting->id;
	}

	$choices = customizer_library_get_choices( $setting );
	$allowed_choices = array_keys( $choices );

	if ( ! in_array( $value, $allowed_choices ) ) {
		$value = customizer_library_get_default( $setting );
	}

	return $value;
}
endif;

if ( ! function_exists( 'customizer_library_sanitize_file_url' ) ) :
/**
 * Sanitize the url of uploaded media.
 *
 * @param  string    $value      The url to sanitize
 * @return string    $output     The sanitized url.
 */
function customizer_library_sanitize_file_url( $url ) {

	$output = '';

	$filetype = wp_check_filetype( $url );
	if ( $filetype["ext"] ) {
		$output = esc_url_raw( $url );
	}

	return $output;
}
endif;

if ( ! function_exists( 'sanitize_hex_color' ) ) :
/**
 * Sanitizes a hex color.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @param string $color
 * @return string|null
 */
function sanitize_hex_color( $color ) {
	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return null;
}
endif;

if ( ! function_exists( 'customizer_library_sanitize_range' ) ) :
/**
 * Sanitizes a range value
 *
 * @param string $color
 * @return string|null
 */
function customizer_library_sanitize_range( $value ) {

	if ( is_numeric( $value ) ) {
		return $value;
	}

	return 0;
}
endif;

if ( ! function_exists( 'customizer_sanitize_repeater_setting' ) ) :
function customizer_sanitize_repeater_setting( $value ) {

		if ( ! is_array( $value ) ) {
			$value = json_decode( urldecode( $value ) );
		}
		
		$sanitized = ( empty( $value ) || ! is_array( $value ) ) ? array() : $value;

		// Make sure that every row is an array, not an object.
		foreach ( $sanitized as $key => $_value ) {
			if ( empty( $_value ) ) {
				unset( $sanitized[ $key ] );
			} else {
				$sanitized[ $key ] = (array) $_value;
			}
		}

		// Reindex array.
		if ( is_array( $sanitized ) ) {
			$sanitized = array_values( $sanitized );
		}

		return $sanitized;

	}
endif;