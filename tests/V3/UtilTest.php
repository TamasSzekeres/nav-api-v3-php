<?php

use LightSideSoftware\NavApi\V3\Util;

test('encrypt with Aes128', function () {
    $data = 'test-data';
    $key = 'abcd1234';
    $expected = '9wxdS/QBSuXxXzFUkellfQ==';

    expect(Util::encryptAes128($data, $key))
        ->toBe($expected);
});

test('decrypt with Aes128', function () {
    $encrypted = '9wxdS/QBSuXxXzFUkellfQ==';
    $key = 'abcd1234';
    $expected = 'test-data';

    expect(Util::decryptAes128($encrypted, $key))
        ->toBe($expected);
});
