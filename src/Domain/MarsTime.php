<?php

declare(strict_types=1);

namespace Wajdisawa\MarsT\Domain;

use DateTimeInterface;

final class MarsTime
{
    /** @var float */
    private float $marsSolDate;
    /** @var string */
    private string $martianCoordinatedTime;

    /**
     * MarsTime constructor.
     * @param DateTimeInterface $dateTime
     */
    public function __construct(DateTimeInterface $dateTime)
    {
        $timestamp = $dateTime->getTimestamp();

        $this->marsSolDate = $this->calculateMarsSolDate($timestamp);
        $this->martianCoordinatedTime = $this->calculateMartianCoordinatedTime($this->marsSolDate);
    }

    /**
     * @param int $timestamp
     * @return float
     */
    private function calculateMarsSolDate(int $timestamp): float
    {
        // reference: MSD = (t + (TAI−UTC)) / Sec per SOL + JD
        $marsSolDate = ($timestamp + TimeConstants::LEAP_SECONDS) / TimeConstants::SECONDS_PER_SOL + TimeConstants::JD_CORRECTION;

        return round($marsSolDate, TimeConstants::MSD_PRECISION, PHP_ROUND_HALF_UP);
    }

    /**
     * @param float $marsSolDate
     * @return string
     */
    private function calculateMartianCoordinatedTime(float $marsSolDate): string
    {
        // reference: MTC = (MSD mod 1) × 24 h
        $martianCoordinatedTime = round(fmod($marsSolDate, 1) * TimeConstants::SECONDS_PER_DAY, 0, PHP_ROUND_HALF_UP);

        return gmdate(TimeConstants::MTC_FORMAT, (int)$martianCoordinatedTime);
    }

    /**
     * @return float
     */
    public function marsSolDate(): float
    {
        return $this->marsSolDate;
    }

    /**
     * @return string
     */
    public function martianCoordinatedTime(): string
    {
        return $this->martianCoordinatedTime;
    }
}
