# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [3.0.0-alpha1] - 2018-07-06
### Added
- Add new method `getOriginalDictionary` on TraceableDictionary
- New feature: if you use the `CategoryDictionaryInterface` you'll be able to sort dictionaries by using
  the registry.
- The `RegistryDictionary` has now a new filter method.

### Changed
- Upgrade `php-cs-fixer` package from `^1.11` to `^2.11` && update `.php_cs` rules
- PHP 7.1 is now the minimum version requirement
- Add composer package in Dockerfile
- Add support for arguments for the callable dictionary
- Makes command output more readable than before:
  - Nicer tables
  - Avoid too long tables by showing only 15 keys


### Fixed
- Dictionary validator now accept arrays if you specify "multiple" option at `true`

## [2.1.2] - 2018-02-16
### Fixed
- `knp_dictionary.registry` service declaration set public to true (Symfony 4 fix)

## [2.1.1] - 2018-01-22
### Changed
- Improve the format when call dump command

## [2.1.0] - 2017-12-22
### Added
- Add `knp:dictionary:dump` command for dictionary listing and preview
- Add auto-registration of `Dictionary` implementations as actual dictionary for users of Sf >= 3.3

### Fixed
- Documentation formattage is now great again

## [2.0.1] - 2017-12-15

### Fixed
- Fix template management for Symfony flex

## [2.0.0] - 2017-12-12
### Added
- Add tag `knp_dictionary.factory` for DI services so you can add dictionary factories
- Add tag `knp_dictionary.dictionary` for DI services so you can add dictionary as service
- Add `knp_dictionary.data_collector.dictionary_data_collector` service so you can trace what dictionnary is available
- New factory interface `Knp\DictionaryBundle\Dictionary\Factory`
- New interface `Knp\DictionaryBundle\Dictionary`
- This changelog is also new :)

### Changed
- Some namespace changes for `SimpleDictionary` and `ValueTransformer`
- Add `add` method on `DictionaryRegistry`
- New view in the web profiler of Symfony

### Removed
- `service` and `method` nodes from configuration: dictionnaries are now loaded automatically by factories registered as it with the new tag
