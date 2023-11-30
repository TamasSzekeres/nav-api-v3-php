<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;

/**
 * A számlázóprogram adatai.
 *
 * A kérésekben a <i>software</i> elementet a <code>SoftwareType</code> implementálja.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class SoftwareType extends BaseType
{
    public function __construct(
        /**
         * @var string A számlázó program azonosítója. (kötelező)
         */
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareId,

        /**
         * @var string A számlázó program neve. (kötelező)
         */
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareName,

        /**
         * @var string A számlázó program működési típusa. (kötelező)
         */
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareOperation,

        /**
         * @var string A számlázó program fő verziója. (kötelező)
         */
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareMainVersion,

        /**
         * @var string A számlázó program fejlesztőjének neve. (kötelező)
         */
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareDevName,

        /**
         * @var string A számlázó program fejlesztőjének működő email címe. (kötelező)
         */
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareDevContact,

        /**
         * @var string A számlázó program fejlesztőjének országkódja. (opcionális)
         */
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareDevCountryCode,

        /**
         * @var string A számlázó program fejleszőjének adószáma. (opcionális)
         */
        #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public string $softwareDevTaxNumber,
    ) {
        parent::__construct();
    }
}
