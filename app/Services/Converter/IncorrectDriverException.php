<?php

namespace App\Services\Converter;

/**
 * Class WriteOperationIsNotAllowedForReadModel
 * @package App\Exceptions
 */
final class IncorrectDriverException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Incorrect driver. Driver must be implements from Driver interface');
    }
}
