<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Serialization;

use DOMText;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\LanguageType;
use LightSideSoftware\NavApi\V3\Types\Enums\MetricTypeType;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class EnumHandler implements SubscribingHandlerInterface
{
    /**
     * @return array|string[]
     */
    public static function supportedTypes(): array
    {
        return [
            FunctionCodeType::class,
            LanguageType::class,
            MetricTypeType::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribingMethods(): array
    {
        $serializerMethods = array_map(function (string $enumClass) {
            return [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => $enumClass,
                'method' => 'serializeStringBackedEnumToXml',
            ];
        }, EnumHandler::supportedTypes());

        $deserializerMethods = array_map(function (string $enumClass) {
            return [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => $enumClass,
                'method' => 'deserializeStringBackedEnumFromXml',
            ];
        }, EnumHandler::supportedTypes());

        return array_merge(
            $serializerMethods,
            $deserializerMethods,
        );
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
        return $visitor->visitSimpleString($enum->value, []);
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
        return $type['name']::from((string)$value);
    }
}
