# OXID Academy Product Promotion Banner

[![Latest Version](https://img.shields.io/packagist/v/oxid-academy/product-promotion-banner?logo=composer&label=latest&color=orange)](https://packagist.org/packages/oxid-academy/product-promotion-banner)
[![PHP Version](https://img.shields.io/packagist/php-v/oxid-academy/product-promotion-banner)](https://github.com/oxid-academy/product-promotion-banner)

This package is part of the **OXID Academy Training Development Basics**. Please see our website for current training offers in [german](https://www.oxid-esales.com/ressourcen/academy/schulungen/) or [english](https://www.oxid-esales.com/en/resources/academy/training-courses/) language.

## Description

This extension is an **OXID eShop Module**. It displays a banner on the start page to promote a specific product. The product is selected in the module settings by entering its item number. As soon as the stock of the selected product drops under ten items, the setting is reset and an info is written to the `source/log/oxideshop.log`.

## Compatibility

### Versions

- 2.x.x version is compatible with OXID eShop 7.1.
- 1.x.x version is compatible with OXID eShop 7.1 and 7.0.

### Branches

- b-7.1.x branch is compatible with OXID eShop compilation b-7.1.x.
- b-7.0.x branch is compatible with OXID eShop compilation b-7.1.x and b-7.0.x.

## Installation

### Production

In your shop's root directory, execute the following Composer command:
```console
composer require oxid-academy/product-promotion-banner:^2.0.0
```
### Development

In your shop's root directory, execute the following commands:
```console
git clone -b b-7.1.x https://github.com/oxid-academy/product-promotion-banner.git ./EXTENSIONS/product-promotion-banner
composer config repositories.oxac-ppb path ./EXTENSIONS/product-promotion-banner
composer require oxid-academy/product-promotion-banner:dev-b-7.1.x
```

## Usage

### Activation

You can activate the module in your OXID eShop administration area or via [OE Console](https://docs.oxid-esales.com/developer/en/latest/development/tell_me_about/console.html) by running the command `oe:module:activate` on your CLI:
```console
./vendor/bin/oe-console oe:module:activate oxacppb
```

### Configuration

You must provide an existing item number in the module settings.

## Troubleshooting

### Banner Not Displaying

If the banner is not displaying, verify the following:
- Your module is active.
- You are on the start page of your shop.
- An existing item number is provided in the module settings.
- The matching product is active and available for the current user.

If you still encounter any issues, clear your `source/tmp` directory. You can do this by running the `oe:cache:clear` command:

```console
./vendor/bin/oe-console oe:cache:clear
```

### No Log Entries

If you do not see corresponding entries in `source/log/oxideshop.log`, open your `source/config.inc.php` file and change your log level to `info` at least:
```php
/**
 * String PSR3 log level Psr\Log\LogLevel
 */
$this->sLogLevel = 'info';
```
