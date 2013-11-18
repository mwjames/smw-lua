<?php

namespace SMW\Lua\Library;

use SMW\Lua\ScribuntoBase;

/**
 * Api library access
 *
 * @licence GNU GPL v2+
 * @since 1.9
 *
 * @author mwjames
 */
class Api extends ScribuntoBase {

	/**
	 * Register smw.api.lua
	 *
	 * @since 0.1
	 */
	public function register() {

		$lib = array(
			'getQueryResult' => array( $this, 'getQueryResult' ),
		);

		$this->getEngine()->registerInterface( __DIR__ . '/' . 'mw.smw.api.lua', $lib, array() );
	}

	/**
	 * Returns query results
	 *
	 * @since 1.9
	 *
	 * @param string $queryString
	 *
	 * @return array
	 */
	public function getQueryResult( $queryString = null ) {

		$this->checkType( 'getQueryResult', 1, $queryString, 'string' );
		$queryString = trim( $queryString );

		if ( $queryString === '' ) {
			return array( null );
		}

		$params = new \FauxRequest(
			array(
				'action' => 'ask',
				'query' => $queryString
			)
		);

		$api = new \ApiMain( $params );
		$api->execute();
		$data = $api->getResultData();

		return $data === null ? array( null ) : $data;
	}
}