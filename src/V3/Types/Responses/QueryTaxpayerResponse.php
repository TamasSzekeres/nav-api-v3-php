<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\TaxpayerDataType;

/**
 * A POST /queryTaxpayer REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api', prefix: 'ns2')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/base', prefix: 'ns3')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/data', prefix: 'ns4')]
#[XmlRoot('QueryTaxpayerResponse')]
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
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?DateTimeImmutable $infoDate = null,

        /**
         * @var ?bool Jelzi, hogy a lekérdezett adózó létezik és érvényes-e.
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?bool $taxpayerValidity = null,

        /**
         * @var ?TaxpayerDataType Az adózó lekérdezés válasz adatai.
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?TaxpayerDataType $taxpayerData = null,
    ) {
        parent::__construct($header, $result, $software);
    }
}
