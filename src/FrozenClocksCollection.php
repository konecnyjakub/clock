<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use DateTimeImmutable;
use OutOfRangeException;
use Psr\Clock\ClockInterface;

final class FrozenClocksCollection implements ClockInterface
{
    /** @var DateTimeImmutable[] */
    private readonly array $clocks;

    private int $calledTimes = 0;

    public function __construct(DateTimeImmutable ...$clocks)
    {
        $this->clocks = $clocks;
    }

    public function now(): DateTimeImmutable
    {
        $index = $this->calledTimes;
        if (!array_key_exists($index, $this->clocks)) {
            throw new OutOfRangeException();
        }
        $this->calledTimes++;
        return $this->clocks[$index];
    }
}
