<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use DateTimeImmutable;
use DateTimeZone;
use MyTester\Attributes\TestSuite;
use MyTester\TestCase;

#[TestSuite("System Clock")]
final class SystemClockTest extends TestCase
{
    public function testNow(): void
    {
        $clock = new SystemClock();
        $lower = new DateTimeImmutable();
        $dt = $clock->now();
        $upper = new DateTimeImmutable();
        $this->assertSame(date_default_timezone_get(), $dt->getTimezone()->getName());
        $this->assertTrue($dt->getTimestamp() >= $lower->getTimestamp());
        $this->assertTrue($dt->getTimestamp() <= $upper->getTimestamp());

        $timeZone = new DateTimeZone("America/Adak");
        $clock = new SystemClock($timeZone);
        $lower = new DateTimeImmutable(timezone: $timeZone);
        $dt = $clock->now();
        $upper = new DateTimeImmutable(timezone: $timeZone);
        $this->assertSame($timeZone->getName(), $dt->getTimezone()->getName());
        $this->assertTrue($dt->getTimestamp() >= $lower->getTimestamp());
        $this->assertTrue($dt->getTimestamp() <= $upper->getTimestamp());
    }
}
