<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Előleghez kapcsolódó adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class AdvanceDataType extends BaseType
{
    public function __construct(
        /**
         * @var bool Értéke true, ha a számla tétel előleg jellegű.
         */
        public bool $advanceIndicator,

        /**
         * @var AdvancePaymentDataType Előleg fizetéshez kapcsolódó adatok.
         */
        public AdvancePaymentDataType $advancePaymentData,
    ) {
        parent::__construct();
    }
}
