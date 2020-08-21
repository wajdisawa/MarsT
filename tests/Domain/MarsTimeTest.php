<?php

declare(strict_types=1);

namespace Wajdisawa\MarsT\Tests\Domain;

use PHPUnit\Framework\TestCase;
use Wajdisawa\MarsT\Domain\MarsTime;

final class MarsTimeTest extends TestCase
{
    public function testMarsSolDate(): void
    {
        $marsTime = new MarsTime(new \DateTimeImmutable('20 Aug 2020 07:15:10 UTC'));

        self::assertSame(52126.76997, $marsTime->marsSolDate());
    }

    public function testMartianCoordinatedTime(): void
    {
        $marsTime = new MarsTime(new \DateTimeImmutable('20 Aug 2020 07:15:10 UTC'));

        self::assertSame('18:28:45', $marsTime->martianCoordinatedTime());
    }
}
