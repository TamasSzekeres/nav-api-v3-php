<?php

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\AnnulmentOperationType;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /manageAnnulment REST operáció kérésének root elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common', prefix: 'common')]
#[XmlRoot('ManageAnnulmentRequest')]
final readonly class ManageAnnulmentRequest extends BasicOnlineInvoiceRequestType
{
    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,
        SoftwareType $software,

        /**
         * @var string A tranzakcióhoz kiadott egyedi és dekódolt token.
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $exchangeToken,

        /**
         * @var array<int, AnnulmentOperationType> A kéréshez tartozó kötegelt technikai érvénytelenítések.
         */
        #[ArrayValidation(maxItems: 100, itemType: AnnulmentOperationType::class)]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\AnnulmentOperationType>')]
        #[XmlList(entry: "annulmentOperation", inline: false)]
        public array $annulmentOperations,
    ) {
        parent::__construct($header, $user, $software);
    }
}
