<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\LoginTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;

/**
 * A kérés authentikációs adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class UserHeaderType extends BaseType
{
    public function __construct(
        /**
         * @var string A technikai felhasználó login neve.
         */
        #[LoginTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
        public string $login,

        /**
         * @var CryptoType A kérés aláírásának hash értéke.
         */
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
        public CryptoType $passwordHash,

        /**
         * @var string A rendszerben regisztrált adózó adószáma, aki nevében a technikai felhasználó tevékenykedik.
         */
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
        public string $taxNumber,

        /**
         * @var CryptoType A kérés aláírásának hash értéke.
         */
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
        public CryptoType $requestSignature,
    ) {
        parent::__construct();
    }
}
