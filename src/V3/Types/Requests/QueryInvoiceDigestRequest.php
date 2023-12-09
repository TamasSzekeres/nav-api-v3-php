<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\Annotations\RequestPageTypeValidation;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;
use LightSideSoftware\NavApi\V3\Types\InvoiceQueryParamsType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /queryInvoiceDigest REST operáció válaszának root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common', prefix: 'common')]
#[XmlRoot('QueryInvoiceDigestRequest')]
final readonly class QueryInvoiceDigestRequest extends BasicOnlineInvoiceRequestType
{
    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,
        SoftwareType $software,

        /**
         * @var int A lekérdezni kívánt lap száma.
         */
        #[RequestPageTypeValidation]
        public int $page,

        /**
         * @var InvoiceDirectionType Kimenő vagy bejövő számla keresési paramétere.
         */
        public InvoiceDirectionType $invoiceDirection,

        /**
         * @var InvoiceQueryParamsType Számla lekérdezési paraméterek.
         */
        public InvoiceQueryParamsType $invoiceQueryParams,
    ) {
        parent::__construct($header, $user, $software);
    }
}
