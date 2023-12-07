<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType15Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\EntityIdTypeValidation;

/**
 * A kérés tranzakcionális adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
readonly class BasicHeaderType extends BaseType
{
    public function __construct(
        /**
         * @var string A kérés/válasz azonosítója, minden üzenetváltásnál - adószámonként - egyedi.
         */
        #[EntityIdTypeValidation]
        #[XmlElement(cdata: false, namespace: "http://schemas.nav.gov.hu/NTCA/1.0/common")]
        public string $requestId,

        /**
         * @var DateTimeImmutable A kérés/válasz keletkezésének UTC ideje.
         */
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(cdata: false, namespace: "http://schemas.nav.gov.hu/NTCA/1.0/common")]
        public DateTimeImmutable $timestamp,

        /**
         * @var string A kérés/válasz verziószáma, hogy a hívó melyik interfész verzió szerint küld adatot és várja a választ.
         */
        #[AtomicStringType15Validation]
        #[XmlElement(cdata: false, namespace: "http://schemas.nav.gov.hu/NTCA/1.0/common")]
        public string $requestVersion,

        /**
         * @var string|null A header verziószáma.
         */
        #[SkipWhenEmpty]
        #[AtomicStringType15Validation]
        #[XmlElement(cdata: false, namespace: "http://schemas.nav.gov.hu/NTCA/1.0/common")]
        public ?string $headerVersion = null,
    ) {
        parent::__construct();
    }
}
