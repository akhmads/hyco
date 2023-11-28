# Hyco

Common PHP library for hyco

## Usage

Install via composer

```
composer require akhmads/hyco:dev-main
```

On your php code

```php
<?php
require_once 'vendor/autoload.php';

use Akhmads\Hyco\Cast;

echo Cast::number('12A00B');
```
