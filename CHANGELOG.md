# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Changed
`StartController` Replaced custom trait with `ContainerFacade`.

### Removed
`Trait\ServiceContainer`.

## [1.0.0] - 2024-05-13

### Added
- `Module` to provide global constants.
- `ServiceContainer` to retrieve a service from container.
- `ModuleSettings` to retrieve current module settings.
- `StartController` to collect data for template regarding the settings.
- `AfterModelUpdate` to reset item number setting depending the item stock.
- Template extension to display banner.
- Translation files for settings and displayed promotion message.
- All configuration files and module logo.
