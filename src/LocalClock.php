<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use DateTimeImmutable;
use DateTimeZone;
use Psr\Clock\ClockInterface;

final readonly class LocalClock implements ClockInterface
{
    public function __construct(private DateTimeZone $timeZone)
    {
    }

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable("now", $this->timeZone);
    }
}
