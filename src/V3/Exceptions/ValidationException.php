<?php

namespace LightSideSoftware\NavApi\V3\Exceptions;

use Exception;
use Throwable;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
class ValidationException extends Exception
{
    public function __construct(
        string $message = '',
        private readonly array $validationErrors = [],
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getValidationErrors(): array
    {
        return $this->validationErrors;
    }
}
