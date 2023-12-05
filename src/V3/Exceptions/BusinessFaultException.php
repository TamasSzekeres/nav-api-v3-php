<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Exceptions;

use Exception;
use LightSideSoftware\NavApi\V3\Types\Responses\BusinessFaultResponse;
use Throwable;

/**
 * Represents an exception caused by API-Client getting BusinessFaultResponse.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
class BusinessFaultException extends Exception
{
    public function __construct(
        string $message,
        private readonly BusinessFaultResponse $response,
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): BusinessFaultResponse
    {
        return $this->response;
    }
}
