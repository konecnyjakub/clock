<?php
declare(strict_types=1);

namespace Konecnyjakub\Clock;

use MyTester\Attributes\TestSuite;
use MyTester\TestCase;

#[TestSuite("Frozen Clock")]
final class FrozenClockTest extends TestCase
{
    public function testNow(): void
    {
        $dt = new \DateTimeImmutable("1970-01-01");
        $clock = new FrozenClock($dt);
        $this->assertSame($dt, $clock->now());
        $this->assertSame($dt, $clock->now());
    }
}
