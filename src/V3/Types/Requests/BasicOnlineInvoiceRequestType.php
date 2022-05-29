<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * Online Számla rendszerre specifikus általános kérés adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract class BasicOnlineInvoiceRequestType extends BasicRequestType
{
    /**
     * @var SoftwareType
     */
    public SoftwareType $software;
}
