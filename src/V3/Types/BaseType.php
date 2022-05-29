<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\XmlSerializationVisitorFactory;
use LightSideSoftware\NavApi\V3\Base\BaseObject;
use LightSideSoftware\NavApi\V3\Serialization\DateTimeHandler;
use LightSideSoftware\NavApi\V3\Serialization\EnumHandler;

/**
 * BaseType
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract class BaseType extends BaseObject
{
    public static function fromXml(string $xml): static
    {
        return SerializerBuilder::create()
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new DateTimeHandler());
                $registry->registerSubscribingHandler(new EnumHandler());
            })
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->build()
            ->deserialize($xml, static::class, 'xml');
    }

    public function toXml(bool $indent = false): string
    {
        $serializationVisitorFactory = new XmlSerializationVisitorFactory();

        return SerializerBuilder::create()
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new DateTimeHandler());
                $registry->registerSubscribingHandler(new EnumHandler());
            })
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->setSerializationVisitor('xml', $serializationVisitorFactory->setFormatOutput($indent))
            ->build()
            ->serialize($this, 'xml');
    }
}
