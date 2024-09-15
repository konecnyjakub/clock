<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use DateTimeImmutable;
use DateTimeZone;
use MyTester\Attributes\TestSuite;
use MyTester\TestCase;

#[TestSuite("UTC Clock")]
final class UTCClockTest extends TestCase
{
    public function testNow(): void
    {
        $clock = new UTCClock();
        $timeZone = new DateTimeZone("UTC");
        $lower = new DateTimeImmutable(timezone: $timeZone);
        $dt = $clock->now();
        $upper = new DateTimeImmutable(timezone: $timeZone);
        $this->assertSame($timeZone->getName(), $dt->getTimezone()->getName());
        $this->assertTrue($dt->getTimestamp() >= $lower->getTimestamp());
        $this->assertTrue($dt->getTimestamp() <= $upper->getTimestamp());
    }
}
