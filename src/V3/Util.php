<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

use function openssl_encrypt;
use function openssl_decrypt;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
class Util
{
    public static function encryptAes128(string $data, string $key): string|false
    {
        return openssl_encrypt($data, "AES-128-ECB", $key);
    }

    public static function decryptAes128(string $data, string $key): string|false
    {
        return openssl_decrypt($data, "AES-128-ECB", $key);
    }
}
