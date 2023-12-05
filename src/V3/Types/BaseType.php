<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\XmlSerializationVisitorFactory;
use LightSideSoftware\NavApi\V3\Base\BaseObject;
use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Serialization\DateTimeHandler;
use LightSideSoftware\NavApi\V3\Serialization\EnumHandler;

/**
 * XML-transzformációs típusok közös ősosztálya.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
abstract readonly class BaseType extends BaseObject
{
    /**
     * @throws ValidationException
     */
    public function __construct()
    {
        $this->validate();
    }

    /**
     * @throws ValidationException
     */
    public function validate(): void
    {
        $validationResult = $this->validateByAttributes();

        if ($validationResult !== true) {
            throw new ValidationException('Hiba az attribútumok érvényesítése során.', $validationResult);
        }
    }

    protected function validateByAttributes(): array|true
    {
        return true;
    }

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
