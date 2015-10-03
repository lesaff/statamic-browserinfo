
# Browser Detection Add-on for Statamic
By Rudy Affandi (2015)

Version 1.0.2

## What is this?
`browserinfo` returns detailed information about the visiting browser.

## Changelog
- 1.0.2: Added user agent
- 1.0.1: Added slugify option, returns slugified output as default
- 1.0.0: Initial release

## Installation
Copy the 'browserinfo' folder to the '_add-ons' folder in your Statamic website.

## How to use
```
    {{ browserinfo:language slugify="true|false" }} returns browser language setting
    {{ browserinfo:browser slugify="true|false" }} returns browser info (name and major version)
    {{ browserinfo:browser_name slugify="true|false" }} returns browser name
    {{ browserinfo:browser_version show="all|major|minor|patch" }} returns browser version, default is major version
    {{ browserinfo:os slugify="true|false" }} returns browser operating system info (name and major version)
    {{ browserinfo:os_name slugify="true|false" }} returns browser operating system name
    {{ browserinfo:os_version show="all|major|minor|patch" }} returns browser operating system version, default is major version.
    {{ browserinfo:device_type slugify="true|false" }} returns browser device type
    {{ browserinfo:device_brand slugify="true|false" }} returns browser device brand
    {{ browserinfo:device_model slugify="true|false" }} returns browser device model
    {{ browserinfo:user_agent slugify="true|false" }} returns browser user agent
```

### Available parameters
`slugify` By default, this is set to `true`. Options (`true`, `false`)
`show` This parameter available for the version tag only. Options (`all`, `major`, `minor`, `patch`)

### Use case
Use it in your `<html>` tag
```
<html class="{{ browserinfo:browser }}">
```

Use it for conditionals
```
{{ if {browserinfo:browser} == 'chrome-43' }}
    You are using Chrome 43
{{ else }}
    You are not using Chrome 43
{{ /if }}
```
or
```
{{ if {browserinfo:browser_name} == 'chrome' AND {browserinfo:browser_version show="major"} < 43 }}
    do something
{{ /if}}
```
