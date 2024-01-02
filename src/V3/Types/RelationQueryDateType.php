<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\QueryOperatorType;

/**
 * Kereső paraméter dátum értékekhez.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class RelationQueryDateType extends BaseType
{
    public function __construct(
        /**
         * @var QueryOperatorType Kereső operátor.
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\QueryOperatorType'>")]
        public QueryOperatorType $queryOperator,

        /**
         * @var DateTimeImmutable Kereső érték.
         */
        #[InvoiceDateTypeValidation]
        #[Type("DateTimeImmutable<'Y-m-d'>")]
        public DateTimeImmutable $queryValue,
    ) {
        parent::__construct();
    }
}
