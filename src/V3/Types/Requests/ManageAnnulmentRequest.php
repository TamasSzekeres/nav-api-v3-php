<?php

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
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
        public string $exchangeToken,

        /**
         * @var array<int, AnnulmentOperationType> A kéréshez tartozó kötegelt technikai érvénytelenítések.
         */
        #[ArrayValidation(itemType: AnnulmentOperationType::class)]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\AnnulmentOperationType>')]
        #[XmlList(entry: "annulmentOperation", inline: false)]
        public array $annulmentOperations,
    ) {
        parent::__construct($header, $user, $software);
    }
}
