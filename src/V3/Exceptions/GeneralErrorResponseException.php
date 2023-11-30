<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Exceptions;

use Exception;
use GuzzleHttp\Exception\ClientException;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralErrorResponse;
use Throwable;

/**
 * Represents an exception caused by API-Client getting GeneralErrorResponse.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class GeneralErrorResponseException extends Exception
{
    public function __construct(
        string $message,
        private readonly GeneralErrorResponse $response,
        int $code = 0,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): GeneralErrorResponse
    {
        return $this->response;
    }

    public static function fromClientException(ClientException $clientException): static
    {
        $xmlResponse = $clientException->getResponse()->getBody()->getContents();

        $generalErrorResponse = GeneralErrorResponse::fromXml($$xmlResponse);

        return new static(
            $clientException->getMessage(),
            $generalErrorResponse,
            $clientException->getCode(),
            $clientException
        );
    }
}
