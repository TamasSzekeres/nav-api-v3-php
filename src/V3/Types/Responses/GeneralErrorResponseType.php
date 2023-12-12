<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\TechnicalValidationResultType;

/**
 * Online Számla rendszerre specifikus általános hibaválasz típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
abstract readonly class GeneralErrorResponseType extends GeneralErrorHeaderResponseType
{
    public function __construct(
        BasicHeaderType $header,
        BasicResultType $result,

        /**
         * @var SoftwareType A számlázóprogram adatai.
         */
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public SoftwareType $software,

        /**
         * @var array<TechnicalValidationResultType> A számlázóprogram adatai.
         */
        #[ArrayValidation(itemType: TechnicalValidationResultType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\TechnicalValidationResultType>')]
        #[XmlList(entry: 'technicalValidationMessages', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public array $technicalValidationMessages = [],
    ) {
        parent::__construct($header, $result);
    }
}
