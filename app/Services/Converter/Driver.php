<?php

declare(strict_types=1);

namespace App\Services\Converter;

/**
 * Interface Driver
 * @package App\Services\Converter
 */
interface Driver
{
    public function canConvert($from, $to): bool;

    public function convert($video, $format, $size);
}
