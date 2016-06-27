<?php

class Html {

	public static function openElement( $element, $attribs = array() ) {
		$attribs = (array)$attribs;
		// This is not required in HTML5, but let's do it anyway, for
		// consistency and better compression.
		$element = strtolower( $element );

		// Remove invalid input types
		if ( $element == 'input' ) {
			$validTypes = array(
				'hidden',
				'text',
				'password',
				'checkbox',
				'radio',
				'file',
				'submit',
				'image',
				'reset',
				'button',

				// HTML input types
				'datetime',
				'datetime-local',
				'date',
				'month',
				'time',
				'week',
				'number',
				'range',
				'email',
				'url',
				'search',
				'tel',
				'color',
			);
			if ( isset( $attribs['type'] ) && !in_array( $attribs['type'], $validTypes ) ) {
				unset( $attribs['type'] );
			}
		}

		// According to standard the default type for <button> elements is "submit".
		// Depending on compatibility mode IE might use "button", instead.
		// We enforce the standard "submit".
		if ( $element == 'button' && !isset( $attribs['type'] ) ) {
			$attribs['type'] = 'submit';
		}

		return "<$element" . self::expandAttributes(
			self::dropDefaults( $element, $attribs ) ) . '>';
	}

	public static function element( $element, $attribs = array(), $contents = '' ) {
		return self::rawElement( $element, $attribs, strtr( $contents, array(
			// There's no point in escaping quotes, >, etc. in the contents of
			// elements.
			'&' => '&amp;',
			'<' => '&lt;'
		) ) );
	}

	public static function hidden( $name, $value, array $attribs = array() ) {
		return self::input( $name, $value, 'hidden', $attribs );
	}

	public static function closeElement( $element ) {
		$element = strtolower( $element );

		return "</$element>";
	}

	public static function submitButton( $contents, array $attrs, array $modifiers = array() ) {
		$attrs['type'] = 'submit';
		$attrs['value'] = $contents;
		return self::element( 'input', self::buttonAttributes( $attrs, $modifiers ) );
	}

	
}