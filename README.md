# CCAgreement

Mediawiki extension.

## Description

Extension adds agreement with wiki policy to the registration page.


## Instalation

* Make sure you have MediaWiki 1.29+ installed.
* Download and place the extension to your /extensions/ folder.
* Add the following code to your LocalSettings.php: `wfLoadExtension( 'CCAgreement' )`;


## Configuration

* Create "cca-agreement-$wgSitename" items in /i18n/ files with correct licensing info.


## Internationalization

This extension is available in English and Czech language. For other languages, just edit files in /i18n/ folder.

## Release Notes

### 1.1.1

* Static SpecialPageFactory deprecated for MW 1.36.

## Authors and license

* [Josef Martiňák](https://www.wikiskripta.eu/w/User:Josmart)
* MIT License, Copyright (c) 2023 First Faculty of Medicine, Charles University
