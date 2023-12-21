<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * Számla összesítés (nem egyszerűsített számla esetén).
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class SummaryNormalType extends BaseType
{
    public function __construct(
        /**
         * @var array<int, SummaryByVatRateType> Összesítés ÁFA-mérték szerint.
         */
        #[ArrayValidation(itemType: SummaryByVatRateType::class)]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\SummaryByVatRateType>')]
        #[XmlList(entry: 'summaryByVatRate', inline: true)]
        public array $summariesByVatRate,

        /**
         * @var float A számla nettó összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $invoiceNetAmount,

        /**
         * @var float A számla nettó összege forintban.
         */
        #[MonetaryTypeValidation]
        public float $invoiceNetAmountHUF,

        /**
         * @var float A számla ÁFA összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $invoiceVatAmount,

        /**
         * @var float A számla ÁFA összege forintban.
         */
        #[MonetaryTypeValidation]
        public float $invoiceVatAmountHUF,
    ) {
        parent::__construct();
    }
}
