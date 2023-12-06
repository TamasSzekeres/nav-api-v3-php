<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\CommunityVatNumberTypeValidation;

beforeEach(function () {
    $this->validation = new CommunityVatNumberTypeValidation();
});

test('community vat number validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['AB01', false],
    ['CD0123456789EFG', false],
    ['AB0', true],
    ['CD0123456789_FG', true],
    ['CD0123456789EFGH', true],
]);
