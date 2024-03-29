<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * Alap kérés adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
abstract readonly class BasicRequestType extends BaseType
{
    public function __construct(
        /**
         * @var BasicHeaderType A kérés tranzakcionális adatai.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
        public BasicHeaderType $header,

        /**
         * @var UserHeaderType A kérés authentikációs adatai.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
        public UserHeaderType $user,
    ) {
        parent::__construct();
    }
}
