<?php

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;

/**
 * Alap válasz adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract readonly class BasicResponseType extends BaseType
{
    public function __construct(
        /**
         * @var BasicHeaderType A válasz tranzakcionális adatai.
         */
        public BasicHeaderType $header,

        /**
         * @var BasicResultType Alap válaszeredmény adatok.
         */
        public BasicResultType $result,
    ) {
        parent::__construct();
    }
}
