# Changelog

All notable changes to `FCARegisterLaravel` will be documented in this file.

## 1.0.4 - 2025-09-20

### Added
- Custom exception classes: `FcaApiException` and `FcaValidationException`
- `FcaErrorHandler` class for centralized FCA API error handling
- `FcaApiClient` class for improved API client functionality
- `FcaValidator` class with validation methods for FCA FRN numbers
- Comprehensive unit tests for new exception handling, error handling, API client, and validator functionality
- Install Command `php artisan fcaapi:install`
- FCA REST API documentation files for all endpoints and data structures
- `validateReqRef` method in `FcaValidator` for requirement reference validation
- `validateSearchType` method in `FcaValidator` for search type validation

### Changed
- Simplified composer.json dependencies and configuration
- Removed database factories autoload from composer.json
- Simplified TestCase setup and environment configuration
- Removed live test configuration loading from TestCase
- Streamlined test scripts in composer.json
- Refactored `Fcaapi` methods to use centralized validation for FCA FRN numbers
- Improved error handling throughout the FCA API integration
- Enhanced validation and error handling in core API methods
- Updated README.md to clarify FCA API support and installation instructions
- Updated `Fcaapi` to utilize new validation methods in `requirementsInvestmentTypes` and `search` methods

### Improved
- Better separation of concerns with dedicated classes for specific responsibilities
- More robust error handling and validation
- Enhanced test coverage for new functionality
- Added comprehensive tests for new validation methods in `FcaValidatorTest` and `FcaapiTest`

## 1.0.3 - 2025-09-20

### Added
- Pest testing framework integration
- Feature and Unit test structure
- Comprehensive testing documentation
- FCA API configuration in test setup

### Changed
- Modernized PHP requirement to ^8.2
- Updated Guzzle to ^7.8
- Updated Laravel Package Tools to ^1.16
- Migrated from PHPUnit to Pest for testing
- Modernized dev dependencies (Orchestra Testbench ^8.22, Collision ^7.9)
- Updated test scripts to use Pest
- Enhanced TestCase with better configuration

### Removed
- Old PHPUnit ExampleTest.php
- Legacy testing dependencies

## 1.0.2 - 2021-04-00

- Published Version 1.0.2 to Packagist.

## 1.0.0 - 202X-XX-XX

- initial release
