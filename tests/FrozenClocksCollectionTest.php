<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use DateTimeImmutable;
use MyTester\Attributes\TestSuite;
use MyTester\TestCase;

#[TestSuite("Frozen Clocks Collection")]
final class FrozenClocksCollectionTest extends TestCase
{
    public function testNow(): void
    {
        $dt1 = new DateTimeImmutable("2025-01-01");
        $dt2 = new DateTimeImmutable("2025-02-01");
        $clock = new FrozenClocksCollection($dt1, $dt2);
        $this->assertSame($dt1, $clock->now());
        $this->assertSame($dt2, $clock->now());
        $this->assertThrowsException(function () use ($clock) {
            $clock->now();
        }, \OutOfRangeException::class);
    }
}
