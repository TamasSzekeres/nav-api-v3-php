<?php

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\AnnulmentOperationType;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * A POST /manageAnnulment REST operáció kérés típusa.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
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
        public string $exchangeToken,

        /**
         * @var array<int, AnnulmentOperationType> A kéréshez tartozó kötegelt technikai érvénytelenítések.
         */
        #[XmlList(entry: "annulmentOperation", inline: false)]
        public array $annulmentOperations,
    ) {
        parent::__construct($header, $user, $software);
    }
}
