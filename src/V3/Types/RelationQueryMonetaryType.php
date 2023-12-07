<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\QueryOperatorType;

/**
 * Kereső paraméter monetáris értékekhez.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class RelationQueryMonetaryType extends BaseType
{
    public function __construct(
        /**
         * @var QueryOperatorType Kereső operátor.
         */
        public QueryOperatorType $queryOperator,

        /**
         * @var float Kereső érték.
         */
        #[MonetaryTypeValidation]
        public float $queryValue,
    ) {
        parent::__construct();
    }
}
