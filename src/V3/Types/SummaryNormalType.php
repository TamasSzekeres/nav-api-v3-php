<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Számla összesítés (nem egyszerűsített számla esetén).
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class SummaryNormalType extends BaseType
{
    /**
     * @var SummaryByVatRateType Összesítés ÁFA-mérték szerint.
     */
    public SummaryByVatRateType $summaryByVatRate;

    /**
     * @var float A számla nettó összege a számla pénznemében.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $invoiceNetAmount;

    /**
     * @var float A számla nettó összege forintban.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $invoiceNetAmountHUF;

    /**
     * @var float A számla ÁFA összege a számla pénznemében.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $invoiceVatAmount;

    /**
     * @var float A számla ÁFA összege forintban.
     */
    #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
    public float $invoiceVatAmountHUF;
}
