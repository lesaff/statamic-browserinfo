
# Browser Detection Add-on for Statamic
By Rudy Affandi (2015)
Version 1.0.0

## What is this?
`browserinfo` returns detailed information about the visiting browser.

## Changelog
1.0.0 - Initial release

## Installation
Copy the 'browserinfo' folder to the '_add-ons' folder in your Statamic website.

## How to use
```
    {{ browserinfo:language }} returns browser language setting
    {{ browserinfo:browser }} returns browser info (name and major version)
    {{ browserinfo:browser_name }} returns browser name
    {{ browserinfo:browser_version show="all|major|minor|patch" }} returns browser version, default is major version
    {{ browserinfo:os }} returns browser operating system info (name and major version)
    {{ browserinfo:os_name }} returns browser operating system name
    {{ browserinfo:os_version show="all|major|minor|patch" }} returns browser operating system version, default is major version.
    {{ browserinfo:device_type }} returns browser device type
    {{ browserinfo:device_brand }} returns browser device brand
    {{ browserinfo:device_model }} returns browser device model
```

### Use case

Use it for conditionals
```
{{ if {browserinfo:browser} == 'Chrome 43' }}
	You are using Chrome 43
{{ else }}
	You are not using Chrome 43
{{ /if }}
```
or
```
{{ if {browserinfo:browser_name} == 'Chrome' AND {browserinfo:browser_version show="major"} < 43 }}
	do something
{{ /if}}
```