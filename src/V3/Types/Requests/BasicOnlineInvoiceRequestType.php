<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * Online Számla rendszerre specifikus általános kérés adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
abstract readonly class BasicOnlineInvoiceRequestType extends BasicRequestType
{
    public function __construct(
        BasicHeaderType $header,
        UserHeaderType $user,

        /**
         * @var SoftwareType A számlázóprogram adatai.
         */
        public SoftwareType $software,
    ) {
        parent::__construct($header, $user);
    }
}
