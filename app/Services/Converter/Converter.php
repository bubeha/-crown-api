<?php

declare(strict_types=1);

namespace App\Services\Converter;

use Illuminate\Support\Arr;

/**
 * Class Converter
 * @package App\Services\Converter
 */
class Converter
{
    /**
     * @var Driver[]
     */
    private $drivers;

    /**
     * @param $driver
     * @return Converter
     */
    public function addDriver($driver): Converter
    {
        $driver = Arr::wrap($driver);

        foreach ($driver as $item) {
            if (!($driver instanceof Driver)) {
                throw new IncorrectDriverException();
            }

            $this->drivers[] = $item;
        }

        return $this;
    }

    /**
     * @param $from
     * @param $to
     * @return Driver
     */
    public function resolverDriver($from, $to): Driver
    {
        foreach ($this->drivers as $driver) {
            if ($driver->canConvert($from, $to)) {
                return $driver;
            }
        }

        throw new \RuntimeException(
            sprintf('Unable to find a driver from %s to %s', $from, $to)
        );
    }
}
