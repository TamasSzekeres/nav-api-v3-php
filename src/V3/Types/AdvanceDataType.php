<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Előleghez kapcsolódó adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class AdvanceDataType extends BaseType
{
    public function __construct(
        /**
         * @var bool Értéke true, ha a számla tétel előleg jellegű.
         */
        public bool $advanceIndicator,

        /**
         * @var ?AdvancePaymentDataType Előleg fizetéshez kapcsolódó adatok.
         */
        #[SkipWhenEmpty]
        public ?AdvancePaymentDataType $advancePaymentData = null,
    ) {
        parent::__construct();
    }
}
