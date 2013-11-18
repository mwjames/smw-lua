<?php

namespace SMW\Lua;

/**
 * Extension setup and registration
 *
 * @licence GNU GPL v2+
 * @since 1.9
 *
 * @author mwjames
 */
final class Setup {

	/** @var array */
	protected $globals;

	/**
	 * @since 0.1
	 *
	 * @param array &$globals
	 */
	public function __construct( &$globals ) {
		$this->globals =& $globals;
	}

	/**
	 * @since 0.1
	 */
	public function run() {
		$this->registerFunctionHooks();
	}

	/**
	 * @see https://www.mediawiki.org/wiki/Manual:$this->globals['wgHooks']
	 *
	 * @since 0.1
	 */
	protected function registerFunctionHooks() {

		/**
		 * Hook to add PHPUnit test cases.
		 *
		 * @see https://www.mediawiki.org/wiki/Manual:Hooks/UnitTestsList
		 *
		 * @param array &$files
		 *
		 * @return boolean
		 */
		$this->globals['wgHooks']['UnitTestsList'][] = function( array &$files ) {

			$directoryIterator = new RecursiveDirectoryIterator( __DIR__ . '/tests/phpunit/' );

			/**
			 * @var SplFileInfo $fileInfo
			 */
			foreach ( new RecursiveIteratorIterator( $directoryIterator ) as $fileInfo ) {
				if ( substr( $fileInfo->getFilename(), -8 ) === 'Test.php' ) {
					$files[] = $fileInfo->getPathname();
				}
			}

			return true;
		};

		/**
		* Register external libraries for Scribunto
		*
		* @since 0.1
		*
		* @param $engine
		* @param array $extraLibraries
		*
		* @return bool
		*/
		$this->globals['wgHooks']['ScribuntoExternalLibraries'][] = function( $engine, array &$extraLibraries ) {

			$addeddLibraries = array(
				'mw.smw.property' => 'SMW\Lua\Library\Property',
				'mw.smw.api' => 'SMW\Lua\Library\Api'
			);

			$extraLibraries = array_merge( $extraLibraries, $addeddLibraries );

			return true;
		};

	}

}
