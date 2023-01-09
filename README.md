# OXID Academy Product Promotion Banner
This package is part of the **OXID Academy Training Development Basics**. Please see our website for current training offers in [german](https://www.oxid-esales.com/ressourcen/academy/schulungen/) or [english](https://www.oxid-esales.com/en/resources/academy/training-courses/) language.

## Description
This extension is an **OXID eShop Module**. It displays a banner on the start page to promote a specific product. The product is selected in the module settings by entering its item number. Everytime the setting is changed, an info is written to the `source/log/oxideshop.log`.

## Installation
In your shop's root directory, execute the following Composer command:
```
composer require oxid-academy/product-promotion-banner
```

## Usage

### Activation
You can activate the module in your OXID eShop administration area or via [OE Console](https://docs.oxid-esales.com/developer/en/latest/development/tell_me_about/console.html) by running the command `oe:module:activate` on your CLI:
```
./vendor/bin/oe-console oe:module:activate id
```

### Configuration
You must provide an existing item number in the module settings.

## Troubleshooting

### Banner Not Displaying
If the banner is not displaying, verify:
- Your module is active.
- An existing item number is provided in the module settings.
- The matching product is active and avialble for current user.
- You are on the start page of your shop.

If you still encounter any issues, clear your `source/tmp` directory. You can do this by running the `oe:cache:clear` command:

```
./vendor/bin/oe-console oe:cache:clear
```

### No Log Entries
If you do not see corresponding entries in `source/log/oxideshop.log` after changing the item number in the module settings, open your `source/config.inc.php` file and change your log level to `info` at least:
```
/**
 * String PSR3 log level Psr\Log\LogLevel
 */
$this->sLogLevel = 'info';
```
