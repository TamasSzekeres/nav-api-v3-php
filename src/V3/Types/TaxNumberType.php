<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Adószám típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
readonly class TaxNumberType extends BaseType
{
    public function __construct(
        /**
         * @var string Az adóalany adó törzsszáma. Csoportos adóalany esetén csoportazonosító szám.
         */
        #[StringValidation(minLength: 8, maxLength: 8, pattern: "[0-9]{8}")]
        public string $taxpayerId,

        /**
         * @var ?string ÁFA kód az adóalanyiság típusának jelzésére. Egy számjegy.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 1, maxLength: 1, pattern: "[0-5]{1}")]
        public ?string $vatCode = null,

        /**
         * @var ?string Megyekód, két számjegy.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 2, maxLength: 2, pattern: "[0-9]{2}")]
        public ?string $countyCode = null,
    ) {
        parent::__construct();
    }
}
