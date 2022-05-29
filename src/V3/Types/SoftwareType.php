<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;

/**
 * A számlázóprogram adatai.
 *
 * A kérésekben a <i>software</i> elementet a <code>SoftwareType</code> implementálja.
 *
 * @property string $softwareId A számlázó program azonosítója. (kötelező)
 * @property string $softwareName A számlázó program neve. (kötelező)
 * @property string $softwareOperation A számlázó program működési típusa. (kötelező)
 * @property string $softwareMainVersion A számlázó program fő verziója. (kötelező)
 * @property string $softwareDevName A számlázó program fejlesztőjének neve. (kötelező)
 * @property string $softwareDevContact A számlázó program fejlesztőjének működő email címe. (kötelező)
 * @property string $softwareDevCountryCode A számlázó program fejlesztőjének országkódja. (opcionális)
 * @property string $softwareDevTaxNumber A számlázó program fejleszőjének adószáma. (opcionális)
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class SoftwareType extends BaseType
{
    #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public string $softwareId;

    #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public string $softwareName;

    #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public string $softwareOperation;

    #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public string $softwareMainVersion;

    #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public string $softwareDevName;

    #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public string $softwareDevContact;

    #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public string $softwareDevCountryCode;

    #[XMLElement(cdata: false, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
    public string $softwareDevTaxNumber;
}
