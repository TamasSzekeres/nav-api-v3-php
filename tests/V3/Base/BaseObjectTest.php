<?php

use LightSideSoftware\NavApi\V3\Types\TaxNumberType;

beforeEach(function () {
    $this->object = new TaxNumberType('12345678', '1', '5');
});

test('get attribute names', function () {
    $expectedAttributes = [
        'taxpayerId',
        'vatCode',
        'countyCode',
    ];

    expect($this->object->attributes())->toBe($expectedAttributes);
});

test('convert object to array', function () {
    $expectedArray = [
        'taxpayerId' => '12345678',
        'vatCode' => '1',
        'countyCode' => '5',
    ];

    expect($this->object->toArray())->toBe($expectedArray);
});
