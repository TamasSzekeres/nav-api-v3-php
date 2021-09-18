<?php

namespace LightSideSoftware\NavApi\V3\Types\Requests;

use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

/**
 * Alap kérés adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract class BasicRequestType extends BaseType
{
    /**
     * @var BasicHeaderType A kérés tranzakcionális adatai.
     * @XMLElement(name="common:header")
     */
    public $header;

    /**
     * @var UserHeaderType A kérés authentikációs adatai.
     * @XMLElement(name="common:user")
     */
    public $user;
}
