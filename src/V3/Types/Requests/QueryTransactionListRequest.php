<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\Annotations\RequestPageTypeValidation;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\DateTimeIntervalParamType;
use LightSideSoftware\NavApi\V3\Types\Enums\RequestStatusType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /queryTransactionList REST operáció kérésének root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common', prefix: 'common')]
#[XmlRoot('QueryTransactionListRequest')]
final readonly class QueryTransactionListRequest extends BasicOnlineInvoiceRequestType
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
         * @var DateTimeIntervalParamType A lekérdezni kívánt tranzakciók kiadásának szerver oldali ideje UTC időben.
         */
        public DateTimeIntervalParamType $insDate,

        /**
         * @var ?RequestStatusType A kérés feldolgozási státusza.
         */
        #[SkipWhenEmpty]
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\RequestStatusType'>")]
        public ?RequestStatusType $requestStatus = null,
    ) {
        parent::__construct($header, $user, $software);
    }
}
