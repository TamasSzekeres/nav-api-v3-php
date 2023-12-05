<?php

use LightSideSoftware\NavApi\V3\Providers\FixedRandomProvider;

beforeEach(function () {
    $this->randomProvider = new FixedRandomProvider([5, 9, 3, 2, 7, 6, 0, 10, 1, 8, 4]);
});

test('random number in range (0..10)', function (array $expectedNumbers) {
    foreach ($expectedNumbers as $expectedNumber) {
        $number = $this->randomProvider->number(0, 10);
        expect($number)->toBe($expectedNumber);
    }
})->with([
    [[5, 9, 3]],
]);

test('random number in range (10..20)', function (array $expectedNumbers) {
    foreach ($expectedNumbers as $expectedNumber) {
        $number = $this->randomProvider->number(10, 20);
        expect($number)->toBe($expectedNumber);
    }
})->with([
    [[15, 19, 13]],
]);

test('random string', function () {
    $randomProvider = new FixedRandomProvider([0, 1, 2, 3, 4, 5, 61]);
    $string = $randomProvider->string(5);

    expect($string)->toBe('01234');
});

it('throws exception for empty parameter', function () {
    new FixedRandomProvider([]);
})->throws(InvalidArgumentException::class);
