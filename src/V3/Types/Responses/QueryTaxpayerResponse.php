<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\TaxpayerDataType;

/**
 * A POST /queryTaxpayer REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class QueryTaxpayerResponse extends BasicOnlineInvoiceResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,
        SoftwareType $software,

        /**
         * @var ?DateTimeImmutable Az adatok utolsó változásának időpontja.
         */
        #[SkipWhenEmpty]
        public ?DateTimeImmutable $infoDate = null,

        /**
         * @var ?bool Jelzi, hogy a lekérdezett adózó létezik és érvényes-e.
         */
        #[SkipWhenEmpty]
        public ?bool $taxpayerValidity = null,

        /**
         * @var ?TaxpayerDataType Az adózó lekérdezés válasz adatai.
         */
        #[SkipWhenEmpty]
        public ?TaxpayerDataType $taxpayerData = null,
    ) {
        parent::__construct($header, $result, $software);
    }
}
