<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * További adat leírására szolgáló típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class AdditionalDataType extends BaseType
{
    public function __construct(
        /**
         * @var string Az adatmező egyedi azonosítója.
         */
        #[StringValidation(minLength: 1, maxLength: 255, pattern: "[A-Z][0-9]{5}[_][_A-Z0-9]{1,249}")]
        public string $dataName,

        /**
         * @var string Az adatmező tartalmának szöveges leírása
         */
        #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
        public string $dataDescription,

        /**
         * @var string Az adat értéke.
         */
        #[StringValidation(minLength: 1, maxLength: 512, pattern: ".*[^\s].*")]
        public string $dataValue,
    ) {
        parent::__construct();
    }
}
