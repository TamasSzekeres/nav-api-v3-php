<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
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
        public string $taxpayerId,

        /**
         * @var ?string ÁFA kód az adóalanyiság típusának jelzésére. Egy számjegy.
         */
        #[SkipWhenEmpty]
        #[VatCodeTypeValidation]
        public ?string $vatCode = null,

        /**
         * @var ?string Megyekód, két számjegy.
         */
        #[SkipWhenEmpty]
        #[CountyCodeTypeValidation]
        public ?string $countyCode = null,
    ) {
        parent::__construct();
    }
}
