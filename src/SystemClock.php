<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use DateTimeImmutable;
use DateTimeZone;
use Psr\Clock\ClockInterface;

final readonly class SystemClock implements ClockInterface
{
    private DateTimeZone $timeZone;

    public function __construct(?DateTimeZone $timeZone = null)
    {
        if ($timeZone !== null) {
            trigger_error(
                "Passing time zone to " . self::class . " is deprecated, use " . LocalClock::class . "instead",
                E_USER_DEPRECATED
            );
        }
        $this->timeZone = $timeZone ?? new DateTimeZone(date_default_timezone_get());
    }

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable("now", $this->timeZone);
    }
}
