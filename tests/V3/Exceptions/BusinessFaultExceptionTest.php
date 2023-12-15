<?php

use LightSideSoftware\NavApi\V3\Exceptions\BusinessFaultException;
use LightSideSoftware\NavApi\V3\Types\Responses\BusinessFaultResponse;

test('get response from exception', function () {
    $businessFaultResponseXml = loadTestResponse('BusinessFault');
    $response = BusinessFaultResponse::fromXml($businessFaultResponseXml);
    $exception = new BusinessFaultException('Error', $response);

    expect($exception->getResponse())->toBeInstanceOf(BusinessFaultResponse::class)
        ->and($exception->getResponse()->toArray())->toBe($response->toArray());
});
