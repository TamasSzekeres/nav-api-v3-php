<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Kriptográfiai metódust leíró típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class CryptoType extends BaseType
{
    public const SHA_512 = 'SHA-512';
    public const SHA3_512 = 'SHA3-512';

    #[XmlAttribute]
    public string $cryptoType;

    #[XmlValue]
    #[XmlElement(cdata: false)]
    public string $hash;

    public static function sha(string $data): self
    {
        return new CryptoType([
            'cryptoType' => self::SHA_512,
            'hash' => strtoupper(hash('SHA512', trim($data))),
        ]);
    }

    public static function sha3(string $data): self
    {
        return new CryptoType([
            'cryptoType' => self::SHA3_512,
            'hash' => strtoupper(hash('SHA3-512', trim($data))),
        ]);
    }
}
