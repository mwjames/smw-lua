--[[
	Registers methods that can be accessed through the Scribunto extension

	@since 0.1

	@licence GNU GPL v2+
	@author mwjames
]]

-- Variable instantiation
local api = {}
local php

function api.setupInterface()
	-- Interface setup
	api.setupInterface = nil
	php = mw_interface
	mw_interface = nil

	-- Register library within the "mw.smw" namespace
	mw = mw or {}
	mw.smw = mw.smw or {}
	mw.smw.api = api

	package.loaded['mw.smw.api'] = api
end

-- getQueryResult
function api.getQueryResult( queryString )
	local queryResult = php.getQueryResult( queryString )
	if queryResult == nil then return nil end
	return queryResult
end

return api