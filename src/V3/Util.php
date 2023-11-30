<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

class Util
{
    public static function decryptAes128(string $string, string $key): string|false
    {
        return openssl_decrypt($string, "AES-128-ECB", $key);
    }
}
