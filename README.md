Clock
=====

[![Total Downloads](https://poser.pugx.org/konecnyjakub/clock/downloads)](https://packagist.org/packages/konecnyjakub/clock) [![Latest Stable Version](https://poser.pugx.org/konecnyjakub/clock/v/stable)](https://gitlab.com/konecnyjakub/clock/-/releases) [![build status](https://gitlab.com/konecnyjakub/clock/badges/master/pipeline.svg?ignore_skipped=true)](https://gitlab.com/konecnyjakub/clock/-/commits/master) [![coverage report](https://gitlab.com/konecnyjakub/clock/badges/master/coverage.svg)](https://gitlab.com/konecnyjakub/clock/-/commits/master) [![License](https://poser.pugx.org/konecnyjakub/clock/license)](https://gitlab.com/konecnyjakub/clock/-/blob/master/LICENSE.md)

Collection of [PSR-20](https://www.php-fig.org/psr/psr-20/) clocks

Installation
------------

The best way to install Clock is via Composer. Just add konecnyjakub/clock to your dependencies.

Usage
-----

### System clock

This clock returns current time. It uses default timezone in PHP.

```php
<?php
declare(strict_types=1);

use DateTimeZone;
use Konecnyjakub\Clock\SystemClock;

(new SystemClock())->now();
```

### Local clock

This clock returns current time in the specified time zone.

```php
<?php
declare(strict_types=1);

use DateTimeZone;
use Konecnyjakub\Clock\LocalClock;

(new LocalClock(new DateTimeZone("Europe/Prague")))->now();
```

### Frozen clock

This clock always returns set time which makes it useful for tests.

```php
<?php
declare(strict_types=1);

use DateTimeImmutable;
use Konecnyjakub\Clock\FrozenClock;

(new FrozenClock(new DateTimeImmutable("1970-01-01")))->now();
```

If you need different values on subsequent calls, you can use FrozenClocksCollection. It returns the values in order which they were passed in or throws an exception if all values were already returned (each value is returned only 1 time). Example:

```php
<?php
declare(strict_types=1);

use DateTimeImmutable;
use Konecnyjakub\Clock\FrozenClocksCollection;

$dt1 = new DateTimeImmutable("2025-01-01");
$dt2 = new DateTimeImmutable("2025-02-01");
$clock = new FrozenClocksCollection($dt1, $dt2);
$clock->now(); // returns $dt1
$clock->now(); // returns $dt2
$clock->now(); // throws an exception
```

### UTC clock

This clock return current time in UTC.

```php
<?php
declare(strict_types=1);

use DateTimeImmutable;
use Konecnyjakub\Clock\UTCClock;

(new UTCClock())->now();
```
