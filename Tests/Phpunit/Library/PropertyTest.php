<?php

namespace SMW\Lua\Tests\Library;

use SMW\Lua\ScribuntoTestBase;

/**
 * @covers \SMW\Lua\Library\Property
 *
 * @group SMW
 * @group SMWExtension
 *
 * @licence GNU GPL v2+
 * @since 1.9
 *
 * @author mwjames
 */
class PropertyTest extends ScribuntoTestBase {

	/** Lua test module */
	protected static $moduleName = 'SMW\Lua\Tests\Library\PropertyTest';

	/**
	 * Scribunto_LuaEngineTestBase::getTestModules
	 */
	public function getTestModules() {
		return parent::getTestModules() + array(
			'SMW\Lua\Tests\Library\PropertyTest' => __DIR__ . '/' . 'mw.smw.property.tests.lua',
		);
	}

}