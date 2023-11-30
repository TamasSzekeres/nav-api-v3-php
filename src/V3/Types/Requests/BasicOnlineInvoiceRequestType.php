<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * Online Számla rendszerre specifikus általános kérés adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract readonly class BasicOnlineInvoiceRequestType extends BasicRequestType
{
    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,

        /**
         * @var SoftwareType
         */
        public SoftwareType $software,
    ) {
        parent::__construct($header, $user);
    }
}
