--[[
	Registers methods that can be accessed through the Scribunto extension

	@since 0.1

	@licence GNU GPL v2+
	@author mwjames
]]

-- Variable instantiation
local property = {}
local php

function property.setupInterface()
	-- Interface setup
	property.setupInterface = nil
	php = mw_interface
	mw_interface = nil

	-- Register library within the "mw.smw" namespace
	mw = mw or {}
	mw.smw = mw.smw or {}
	mw.smw.property = property

	package.loaded['mw.smw.property'] = property
end

-- getPropertyType
function property.getPropertyType( name )
	local propertyType = php.getPropertyType( name )
	if propertyType == nil then return nil end
	return propertyType
end

return property