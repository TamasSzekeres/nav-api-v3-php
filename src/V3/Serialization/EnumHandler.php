<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Serialization;

use DOMText;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final class EnumHandler implements SubscribingHandlerInterface
{
    /**
     * @inheritdoc
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => 'Enum',
                'method' => 'serializeStringBackedEnumToXml',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => 'Enum',
                'method' => 'deserializeStringBackedEnumFromXml',
            ],
        ];
    }

    /**
     * @noinspection PhpUnused
     * @noinspection PhpUnusedParameterInspection
     */
    public function serializeStringBackedEnumToXml(
        XmlSerializationVisitor $visitor,
        $enum,
        array $type,
        Context $context
    ): DOMText {
        $value = property_exists($enum, property: 'value') ? $enum->value : $enum->name;
        return $visitor->visitSimpleString($value, []);
    }

    /**
     * @noinspection PhpUnused
     * @noinspection PhpUnusedParameterInspection
     */
    public function deserializeStringBackedEnumFromXml(
        XmlDeserializationVisitor $visitor,
        $value,
        array $type,
        Context $context
    ) {
        return $type['params'][0]::fromValue((string)$value);
    }
}
