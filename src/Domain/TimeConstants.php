<?php

declare(strict_types=1);

namespace Wajdisawa\MarsT\Domain;

class TimeConstants
{
    /**
     * reference : https://en.wikipedia.org/wiki/Timekeeping_on_Mars
     */

    public const SECONDS_PER_DAY = 86400;

    public const SECONDS_PER_SOL = 88775.244147;

    /**
     * https://en.wikipedia.org/wiki/Leap_second
     */
    public const LEAP_SECONDS = 37;

    public const JD_CORRECTION = 34127.2954262;

    public const MSD_PRECISION = 5;

    public const MTC_FORMAT = 'H:i:s';
}
