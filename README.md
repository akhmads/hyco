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

## Class available

|Class|Description|
|Cast::number()|convert string to number|
Cast::currency()|convert string to number with format|
