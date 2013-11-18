--[[
	Tests for mw.smw.api module

	@since 0.1

	@licence GNU GPL v2+
	@author mwjames
]]

local testframework = require 'Module:TestFramework'

-- Tests
local tests = {
	--getQueryResult
	{ name = 'getQueryResult (empty query)', func = mw.smw.api.getQueryResult,
		args = { '' },
		expect = { nil }
	},
	{ name = 'getQueryResult (meta count)',
		func = function ( args )
		  local ret =  mw.smw.api.getQueryResult( args )
		  return ret.printrequests[0].label
		end,
		args = { '[[Modification date::+]]|?Modification date|limit=0|mainlabel=-' },
		expect = { 'Modification date' }
	}
}

return testframework.getTestProvider( tests )