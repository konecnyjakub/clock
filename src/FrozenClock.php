<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use DateTimeImmutable;
use Psr\Clock\ClockInterface;

final readonly class FrozenClock implements ClockInterface
{
    public function __construct(private DateTimeImmutable $now)
    {
    }

    public function now(): DateTimeImmutable
    {
        return $this->now;
    }
}
