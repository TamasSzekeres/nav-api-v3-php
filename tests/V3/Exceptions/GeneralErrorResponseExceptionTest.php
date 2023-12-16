<?php

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use LightSideSoftware\NavApi\V3\Exceptions\GeneralErrorResponseException;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralErrorResponse;

test('creating GeneralErrorResponseException', function () {
    $request = new Request(method: 'GET', uri: 'www.example.com');
    $response = createResponseFromXml(loadTestResponse('GeneralErrorResponse'));
    $clientException = new ClientException('Message', $request, $response);

    $generalErrorResponseException = GeneralErrorResponseException::fromClientException($clientException);

    expect($generalErrorResponseException->getResponse())->toBeInstanceOf(GeneralErrorResponse::class);
});
