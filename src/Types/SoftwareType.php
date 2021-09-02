<?php

namespace LightSideSoftware\NavApi\Types;

use LightSideSoftware\NavApi\Types\BaseType;
use SimpleXMLElement;

/**
 * A számlázóprogram adatai.
 *
 * A kérésekben a software elementet a SoftwareType implementálja.
 *
 * @property string $softwareId [kötelező] A számlázó program azonosítója.
 * @property string $softwareName [kötelező] A számlázó program neve.
 * @property string $softwareOperation [kötelező]A számlázó program működési típusa.
 * @property string $softwareMainVersion [kötelező] A számlázó program fő verziója.
 * @property string $softwareDevName [kötelező]A számlázó program fejlesztőjének neve.
 * @property string $softwareDevContact [kötelező] A számlázó program fejlesztőjének működő email címe.
 * @property string $softwareDevCountryCode [opcionális] A számlázó program fejlesztőjének országkódja.
 * @property string $softwareDevTaxNumber [opcionális] A számlázó program fejleszőjének adószáma.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class SoftwareType extends BaseType
{
    /**
     * @var string
     */
    public $softwareId;

    /**
     * @var string
     */
    public $softwareName;

    /**
     * @var string
     */
    public $softwareOperation;

    /**
     * @var string
     */
    public $softwareMainVersion;

    /**
     * @var string
     */
    public $softwareDevName;

    /**
     * @var string
     */
    public $softwareDevContact;

    /**
     * @var string
     */
    public $softwareDevCountryCode;

    /**
     * @var string
     */
    public $softwareDevTaxNumber;

    public function xmlElementName(): string
    {
        return 'software';
    }

    /*public function toArray(): array
    {
        return [
            'softwareId' => $this->softwareId,
            'softwareName' => $this->softwareName,
            'softwareOperation' => $this->softwareOperation,
            'softwareMainVersion' => $this->softwareMainVersion,
            'softwareDevName' => $this->softwareDevName,
            'softwareDevContact' => $this->softwareDevContact,
            'softwareDevCountryCode' => $this->softwareDevCountryCode,
            'softwareDevTaxNumber' => $this->softwareDevTaxNumber,
        ];
    }

    public function toXmlElement(): SimpleXMLElement
    {
    }*/
}
