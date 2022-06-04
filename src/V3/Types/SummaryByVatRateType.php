<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * ÁFA mértékek szerinti összesítés.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class SummaryByVatRateType extends BaseType
{
    /**
     * @var VatRateType Adómérték vagy adómentesség jelölése.
     */
    public VatRateType $vatRate;

    /**
     * @var VatRateNetDataType Adott adómértékhez tartozó nettó adatok.
     */
    public VatRateNetDataType $vatRateNetData;

    /**
     * @var VatRateVatDataType Adott adómértékhez tartozó ÁFA adatok.
     */
    public VatRateVatDataType $vatRateVatData;

    /**
     * @var ?VatRateGrossDataType Adott adómértékhez tartozó bruttó adatok.
     */
    #[SkipWhenEmpty]
    public ?VatRateGrossDataType $vatRateGrossData = null;
}
