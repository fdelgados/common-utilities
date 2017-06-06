# PHP Common Utilities

[![Build Status](https://travis-ci.org/fdelgados/common-utilities.svg?branch=master)](https://travis-ci.org/fdelgados/common-utilities)
[![Packagist](https://img.shields.io/packagist/v/fdelgados/common-utilities.svg)](https://github.com/fdelgados/common-utilities/releases)

A collection of PHP common utilities functions

### Prerequisites
You need PHP 5.6 or later and Composer to use this collection

### Installing
To install PHP Common Utilities, run the following command:
```
$ composer require fdelgados/common-utilities
```

### Utilities provided
* String processing

## Usage

First, you must import the function you are going to user:
```php
use function CiscoDelgado\CommonUtilities\StringProcessing\slugify;
```

Then use it:
```php
$slugified = slugify('Hello World!');
echo $slugified; // hello-world
```

## Authors
* **Cisco Delgado** - *Initial work* - [fdelgados](https://github.com/fdelgados)

## License
This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).