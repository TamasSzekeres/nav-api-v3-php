<?php

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use LightSideSoftware\NavApi\V3\Exceptions\GeneralExceptionResponseException;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralExceptionResponse;

test('creating GeneralExceptionResponseException', function () {
    $request = new Request(method: 'GET', uri: 'www.example.com');
    $response = createResponseFromXml(loadTestResponse('GeneralExceptionResponse'));
    $clientException = new ClientException('Message', $request, $response);

    $generalExceptionResponseException = GeneralExceptionResponseException::fromClientException($clientException);

    expect($generalExceptionResponseException->getResponse())->toBeInstanceOf(GeneralExceptionResponse::class);
});
