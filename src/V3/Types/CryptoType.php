<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlValue;
use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;

/**
 * Kriptográfiai metódust leíró típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class CryptoType extends BaseType
{
    public const SHA_512 = 'SHA-512';
    public const SHA3_512 = 'SHA3-512';

    public function __construct(
        #[SimpleText50NotBlankTypeValidation]
        #[XmlAttribute]
        public string $cryptoType,

        #[SimpleText512NotBlankTypeValidation]
        #[XmlValue]
        #[XmlElement(cdata: false)]
        public string $hash,
    ) {
        parent::__construct();
    }

    /**
     * @throws ValidationException
     */
    public static function sha(string $data): self
    {
        return new CryptoType(
            cryptoType: self::SHA_512,
            hash: strtoupper(hash('SHA512', trim($data)))
        );
    }

    /**
     * @throws ValidationException
     */
    public static function sha3(string $data): self
    {
        return new CryptoType(
            cryptoType: self::SHA3_512,
            hash: strtoupper(hash('SHA3-512', trim($data)))
        );
    }
}
