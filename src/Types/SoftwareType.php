<?php

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\Types\V3\BaseType;
use SimpleXMLElement;

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
    public $softwareId;
    public $softwareName;
    public $softwareOperation;
    public $softwareMainVersion;
    public $softwareDevName;
    public $softwareDevContact;
    public $softwareDevCountryCode;
    public $softwareDevTaxNumber;
}
