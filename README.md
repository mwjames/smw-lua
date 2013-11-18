# SemanticMediaWiki Lua

Library containing an integration framework that provides [Lua (Scripunto)][scrlib] libraries, allowing an end-user to write modules and expose additional functionality using the <code>{{#invoke: ... }}</code> parser function.

## Libraries

* [mw.smw.property.lua](/src/SMW/Lua/Library/mw.smw.property.lua)
* [mw.smw.api.lua](/src/SMW/Lua/Library/mw.smw.api.lua)

## Example
```lua
-- Module:SMW/Property
local p = {}

-- Return property type
function p.type(frame)

	if not mw.smw.property then
		return "mw.smw.property module not found"
	end

	if frame.args[1] == nil then
		return "no parameter found"
	else
		type = mw.smw.property.getPropertyType( frame.args[1] )
	end

	if type == nil then
		return "(no values)"
	end

	return type
end
return p
```
```
{{#invoke:SMW/Property|type|Modification date}} will return "_dat"
```
```
{{#invoke:SMW/Property|type}}</code> will return "no parameter found"
```

## Tests
This library comes with a set of PHPUnit and Lua tests (see details on how to write Lua/Scribunto [unit tests][scrtest]).

* [mw.smw.property.tests.lua](/tests/phpunit/Library/mw.smw.property.tests.lua)
* [mw.smw.api.tests.lua](/tests/phpunit/Library/mw.smw.api.tests.lua)

[scrtest]: https://www.mediawiki.org/wiki/Extension:Scribunto/Lua_reference_manual#Test_cases
[scrlib]: https://www.mediawiki.org/wiki/Extension:Scribunto/Lua_reference_manual#Writing_Scribunto_libraries