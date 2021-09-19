<?php

namespace LightSideSoftware\NavApi\V3\Responses;

use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;

/**
 * Alap válasz adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class BasicResponseType extends BaseType
{
    /**
     * @var BasicHeaderType A válasz tranzakcionális adatai.
     */
    public $header;

    /**
     * @var BasicResultType Alap válaszeredmény adatok.
     */
    public $result;
}
