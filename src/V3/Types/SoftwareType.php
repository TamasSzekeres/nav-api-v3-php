<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\CountryCodeTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText15NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText200NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SoftwareIdTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;

/**
 * A számlázóprogram adatai.
 *
 * A kérésekben a <i>software</i> elementet a <code>SoftwareType</code> implementálja.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class SoftwareType extends BaseType
{
    public function __construct(
        /**
         * @var string A számlázó program azonosítója. (kötelező)
         */
        #[SoftwareIdTypeValidation]
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareId,

        /**
         * @var string A számlázó program neve. (kötelező)
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareName,

        /**
         * @var string A számlázó program működési típusa. (kötelező)
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType'>")]
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public SoftwareOperationType $softwareOperation,

        /**
         * @var string A számlázó program fő verziója. (kötelező)
         */
        #[SimpleText15NotBlankTypeValidation]
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareMainVersion,

        /**
         * @var string A számlázó program fejlesztőjének neve. (kötelező)
         */
        #[SimpleText512NotBlankTypeValidation]
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareDevName,

        /**
         * @var string A számlázó program fejlesztőjének működő email címe. (kötelező)
         */
        #[SimpleText200NotBlankTypeValidation]
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareDevContact,

        /**
         * @var ?string A számlázó program fejlesztőjének országkódja. (opcionális)
         */
        #[CountryCodeTypeValidation]
        #[SkipWhenEmpty]
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $softwareDevCountryCode = null,

        /**
         * @var ?string A számlázó program fejleszőjének adószáma. (opcionális)
         */
        #[SimpleText50NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?string $softwareDevTaxNumber = null,
    ) {
        parent::__construct();
    }
}
