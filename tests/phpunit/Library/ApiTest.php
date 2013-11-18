<?php

namespace SMW\Lua\Tests\Library;

use SMW\Lua\ScribuntoTestBase;

/**
 * @covers \SMW\Lua\Library\Api
 *
 * @group SMW
 * @group SMWExtensions
 *
 * @licence GNU GPL v2+
 * @since 1.9
 *
 * @author mwjames
 */
class ApiTest extends ScribuntoTestBase {

	/** Lua test module */
	protected static $moduleName = 'SMW\Lua\Tests\Library\ApiTest';

	/**
	 * Scribunto_LuaEngineTestBase::getTestModules
	 */
	public function getTestModules() {
		return parent::getTestModules() + array(
			'SMW\Lua\Tests\Library\ApiTest' => __DIR__ . '/' . 'mw.smw.api.tests.lua',
		);
	}

}