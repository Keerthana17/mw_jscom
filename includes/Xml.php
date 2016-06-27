<?php
// A LOT OF COMMENTS
//xml reference calls handler

class Xml {

	public static function inputLabel( $label, $name, $id, $size = false,
		$value = false, $attribs = array()
	) {
		list( $label, $input ) = self::inputLabelSep( $label, $name, $id, $size, $value, $attribs );
		return $label . '&#160;' . $input;
	}

	public static function openElement( $element, $attribs = null ) {
		return '<' . $element . self::expandAttributes( $attribs ) . '>';
	}

	public static function radioLabel( $label, $name, $value, $id,
		$checked = false, $attribs = array()
	) {
		return self::radio( $name, $value, $checked, array( 'id' => $id ) + $attribs ) .
			'&#160;' .
			self::label( $label, $id, $attribs );
	}

	public static function closeElement( $element ) {
		return "</$element>";
	}
}

class XmlJsCode {
	public $value;

	function __construct( $value ) {
		$this->value = $value;
	}
}
