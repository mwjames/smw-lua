<?php

/**
 * SemanticMediaWiki Lua integration framework
 *
 * @since 0.1
 * @codeCoverageIgnore
 *
 * @licence GNU GPL v2+
 * @author mwjames
 */

if ( defined( 'SMW_LUA_VERSION' ) ) {
	return 1;
}

define( 'SMW_LUA_VERSION', '0.1a' );

spl_autoload_register( function ( $className ) {

	$className = ltrim( $className, '\\' );
	$fileName = '';
	$namespace = '';

	if ( $lastNsPos = strripos( $className, '\\') ) {
		$namespace = substr( $className, 0, $lastNsPos );
		$className = substr( $className, $lastNsPos + 1 );
		$fileName  = str_replace( '\\', '/', $namespace ) . '/';
	}

	$fileName .= str_replace( '_', '/', $className ) . '.php';
	$namespaceSegments = explode( '\\', $namespace );

	if ( $namespaceSegments[0] === 'SMW' ) {
		if ( count( $namespaceSegments ) === 1 || $namespaceSegments[1] !== 'Tests' ) {
			if ( file_exists( __DIR__ . '/src/' . $fileName ) ) {
				require_once __DIR__ . '/src/' . $fileName;
			}
		}
	}

} );

if ( defined( 'MEDIAWIKI' ) ) {

	$GLOBALS['wgExtensionCredits']['semantic'][] = array(
		'path' => __DIR__,
		'name' => 'SemanticMediaWiki Lua Integration',
		'version' => SMW_LUA_VERSION,
		'author' => array( '' ),
		'url' => 'https://github.com/SemanticMediaWiki/lua-integration/',
		'description' => 'Making Lua/Scribunto capabilities available to SemanticMediaWiki',
	);

	$GLOBALS['wgExtensionFunctions'][] = function() {
		$setup = new \SMW\Lua\Setup( $GLOBALS );
		$setup->run();
	};

}
