<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText200NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Mentesség, kivétel részletes indokolása.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class DetailedReasonType extends BaseType
{
    public function __construct(
        /**
         * @var string Az eset leírása kóddal.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $case,

        /**
         * @var string Az eset leírása szöveggel.
         */
        #[SimpleText200NotBlankTypeValidation]
        public string $reason,
    ) {
        parent::__construct();
    }
}
