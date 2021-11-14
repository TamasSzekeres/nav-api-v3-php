<?php

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\XmlSerializationVisitorFactory;
use LightSideSoftware\NavApi\V3\Base\BaseObject;

/**
 * BaseType
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract class BaseType extends BaseObject
{
    public static function fromXml(string $xml): self
    {
        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build()
            ->deserialize($xml, static::class, 'xml');
    }

    public function toXml(bool $indent = false): string
    {
        $serializationVisitorFactory = new XmlSerializationVisitorFactory();

        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->setSerializationVisitor('xml', $serializationVisitorFactory->setFormatOutput($indent))
            ->build()
            ->serialize($this, 'xml');
    }
}
