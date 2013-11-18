<?php

namespace SMW\Lua\Library;

use SMW\Lua\ScribuntoBase;
use SMW\DIProperty;

/**
 * Property library access
 *
 * @licence GNU GPL v2+
 * @since 1.9
 *
 * @author mwjames
 */
class Property extends ScribuntoBase {

	/**
	 * Register mw.smw.property.lua
	 *
	 * @since 1.9
	 */
	public function register() {

		$lib = array(
			'getPropertyType' => array( $this, 'getPropertyType' ),
		);

		$this->getEngine()->registerInterface( __DIR__ . '/' . 'mw.smw.property.lua', $lib, array() );
	}

	/**
	 * Returns property type
	 *
	 * @since 1.9
	 *
	 * @param string $propertyName
	 *
	 * @return array
	 */
	public function getPropertyType( $propertyName = null ) {

		$this->checkType( 'getPropertyType', 1, $propertyName, 'string' );
		$propertyName = trim( $propertyName );

		if ( $propertyName === '' ) {
			return array( null );
		}

		$property = DIProperty::newFromUserLabel( $propertyName );

		if ( $property === null ) {
			return array( null );
		}

		return array( $property->findPropertyTypeID() );
	}

}