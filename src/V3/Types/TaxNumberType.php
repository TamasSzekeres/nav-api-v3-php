<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\CountyCodeTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\VatCodeTypeValidation;

/**
 * Adószám típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
readonly class TaxNumberType extends BaseType
{
    public function __construct(
        /**
         * @var string Az adóalany adó törzsszáma. Csoportos adóalany esetén csoportazonosító szám.
         */
        #[TaxPayerIdTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/base')]
        public string $taxpayerId,

        /**
         * @var ?string ÁFA kód az adóalanyiság típusának jelzésére. Egy számjegy.
         */
        #[SkipWhenEmpty]
        #[VatCodeTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/base')]
        public ?string $vatCode = null,

        /**
         * @var ?string Megyekód, két számjegy.
         */
        #[SkipWhenEmpty]
        #[CountyCodeTypeValidation]
        #[XmlElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/base')]
        public ?string $countyCode = null,
    ) {
        parent::__construct();
    }
}
