<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Exceptions;

use Exception;
use GuzzleHttp\Exception\ClientException;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralExceptionResponse;
use Throwable;

/**
 * Represents an exception caused by API-Client getting GeneralErrorException.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
class GeneralExceptionResponseException extends Exception
{
    public function __construct(
        string $message,
        private readonly GeneralExceptionResponse $response,
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): GeneralExceptionResponse
    {
        return $this->response;
    }

    public static function fromClientException(ClientException $clientException): static
    {
        $xmlResponse = $clientException->getResponse()->getBody()->getContents();

        $generalErrorResponse = GeneralExceptionResponse::fromXml($xmlResponse);

        return new static(
            $clientException->getMessage(),
            $generalErrorResponse,
            $clientException->getCode(),
            $clientException
        );
    }
}
