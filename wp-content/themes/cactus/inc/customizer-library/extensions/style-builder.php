<?php

if ( ! class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Singleton to collect and print CSS based on user input.
 *
 */
class Customizer_Library_Styles {

	/**
	 * The one instance of Customizer_Library_Styles.
	 *
	 * @var   Customizer_Library_Styles    The one instance for the singleton.
	 */
	private static $instance;

	/**
	 * The array for storing added CSS rule data.
	 *
	 * @var   array    Holds the data to be printed out.
	 */

	public $data = array();

	/**
	 * Optional line ending character for debug mode.
	 *
	 * @var   string    Line ending character used to better style the CSS.
	 */
	private $line_ending = '';

	/**
	 * Optional tab character for debug mode.
	 *
	 * @var   string    Line ending character used to better style the CSS.
	 */
	private $tab = '';

	/**
	 * Instantiate or return the one Customizer_Library_Styles instance.
	 *
	 * @return Customizer_Library_Styles
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initialize the object.
	 *
	 * @return Customizer_Library_Styles
	 */
	function __construct() {
		// Set line ending and tab
		if ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) {
			$this->line_ending = "\n";
			$this->tab = "\t";
		}
	}

	/**
	 * Add a new CSS rule to the array.
	 *
	 * Accepts data to eventually be turned into CSS. Usage:
	 *
	 * Customizer_Library_Styles()->add( array(
	 *     'selectors'    => array( '.site-header-main' ),
	 *     'declarations' => array(
	 *         'background-color' => $header_background_color
	 *     ),
	 *     'media' => 'print',
	 * ) );
	 *
	 *
	 * @param  array    $data    The selectors and properties to add to the CSS.
	 * @return void
	 */
	public function add( $data ) {
		if ( ! isset( $data['selectors'] ) || ! isset( $data['declarations'] ) ) {
			return;
		}

		$entry = array();

		// Sanitize selectors
		$entry['selectors'] = array_map( 'trim', (array) $data['selectors'] );
		$entry['selectors'] = array_unique( $entry['selectors'] );

		// Sanitize declarations
		$entry['declarations'] = array_map( 'trim', (array) $data['declarations'] );

		// Check for media query
		if ( isset( $data['media'] ) ) {
			$media = $data['media'];
		} else {
			$media = 'all';
		}

		// Create new media query if it doesn't exist yet
		if ( ! isset( $this->data[ $media ] ) || ! is_array( $this->data[ $media ] ) ) {
			$this->data[ $media ] = array();
		}

		// Look for matching selector sets
		$match = false;
		foreach ( $this->data[ $media ] as $key => $rule ) {
			$diff1 = array_diff( $rule['selectors'], $entry['selectors'] );
			$diff2 = array_diff( $entry['selectors'], $rule['selectors'] );
			if ( empty( $diff1 ) && empty( $diff2 ) ) {
				$match = $key;
				break;
			}
		}

		// No matching selector set, add a new entry
		if ( false === $match ) {
			$this->data[ $media ][] = $entry;
		}
		// Yes, matching selector set, merge declarations
		else {
			$this->data[ $media ][ $match ]['declarations'] = array_merge( $this->data[ $media ][ $match ]['declarations'], $entry['declarations'] );
		}
	}

	/**
	 * Compile the data array into standard CSS syntax
	 *
	 * @return string    The CSS that is built from the data.
	 */
	public function build() {
		if ( empty( $this->data ) ) {
			return '';
		}

		$n = $this->line_ending;

		// Make sure the 'all' array is first
		if ( isset( $this->data['all'] ) && count( $this->data ) > 1 ) {
			$all = array ( 'all' => $this->data['all'] );
			unset( $this->data['all'] );
			$this->data = array_merge( $all, $this->data);
		}

		$output = '';

		foreach ( $this->data as $query => $ruleset ) {
			$t = '';

			if ( 'all' !== $query ) {
				$output .= "\n@media " . $query . '{' . $n;
				$t = $this->tab;
			}

			// Build each rule
			foreach ( $ruleset as $rule ) {
				$output .= $this->parse_selectors( $rule['selectors'], $t ) . '{' . $n;
				$output .= $this->parse_declarations( $rule['declarations'], $t );
				$output .= $t . '}' . $n;
			}

			if ( 'all' !== $query ) {
				$output .= '}' . $n;
			}
		}

		return $output;
	}

	/**
	 * Compile the selectors in a rule into a string.
	 *
	 * @param  array     $selectors    Selectors to combine into single selector.
	 * @param  string    $tab          Tab character.
	 * @return string                  Results of the selector combination.
	 */
	private function parse_selectors( $selectors, $tab = '' ) {
		/**
		 * Note that these selectors are hardcoded in the code base. They are never the result of user input and can
		 * thus be trusted to be sane.
		 */
		$n      = $this->line_ending;
		$output = $tab . implode( ",{$n}{$tab}", $selectors );
		return $output;
	}

	/**
	 * Compile the declarations in a rule into a string.
	 *
	 * @param  array     $declarations    Declarations for a selector.
	 * @param  string    $tab             Tab character.
	 * @return string                     The combines declarations.
	 */
	private function parse_declarations( $declarations, $tab = '' ) {
		$n = $this->line_ending;
		$t = $this->tab . $tab;

		$output = '';

		/**
		 * Note that when this output is prepared, it is not escaped, sanitized or otherwise altered. The sanitization
		 * routines are implemented when the developer calls `Customizer_Library_Styles()->add`. Because every property value has
		 * special sanitization needs, it is handled at that point.
		 */
		foreach ( $declarations as $property => $value ) {
			// Exception for px/rem font size
			if ( 'font-size-px' === $property || 'font-size-rem' === $property ) {
				$property = 'font-size';
			}
			$output .= "{$t}{$property}:{$value};$n";
		}

		return $output;
	}
}
endif;

if ( ! function_exists( 'customizer_library_styles' ) ) :
/**
 * Return the one Customizer_Library_Styles object.
 *
 * @return Customizer_Library_Styles	The Customizer_Library_Styles object.
 */
function customizer_library_styles() {
	return Customizer_Library_Styles::instance();
}
endif;

add_action( 'init', 'customizer_library_styles', 1 );