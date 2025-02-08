<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use DateTimeImmutable;
use DateTimeZone;
use MyTester\Attributes\TestSuite;
use MyTester\TestCase;

#[TestSuite("Local Clock")]
final class LocalClockTest extends TestCase
{
    public function testNow(): void
    {
        $timeZone = new DateTimeZone("America/Adak");
        $clock = new LocalClock($timeZone);
        $lower = new DateTimeImmutable(timezone: $timeZone);
        $dt = $clock->now();
        $upper = new DateTimeImmutable(timezone: $timeZone);
        $this->assertSame($timeZone->getName(), $dt->getTimezone()->getName());
        $this->assertTrue($dt->getTimestamp() >= $lower->getTimestamp());
        $this->assertTrue($dt->getTimestamp() <= $upper->getTimestamp());
    }
}
