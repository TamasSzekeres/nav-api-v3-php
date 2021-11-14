<?php

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Kriptográfiai metódust leíró típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class CryptoType extends BaseType
{
    /**
     * @XmlAttribute
     */
    public string $cryptoType;

    /**
     * @XmlValue
     * @XmlElement(cdata=false)
     */
    public string $hash;
}
