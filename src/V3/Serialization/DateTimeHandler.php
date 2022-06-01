<?php /** @noinspection PhpComposerExtensionStubsInspection */

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Serialization;

use DateTimeImmutable;
use DOMText;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class DateTimeHandler implements SubscribingHandlerInterface
{
    public const DEFAULT_DATETIME_FORMAT = 'Y-m-d H:i:s';

    /**
     * @inheritdoc
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => DateTimeImmutable::class,
                'method' => 'serializeDateTimeImmutableToXml',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => DateTimeImmutable::class,
                'method' => 'deserializeDateTimeImmutableFromXml',
            ],
        ];
    }

    /**
     * @noinspection PhpUnusedParameterInspection
     * @noinspection PhpUnused
     */
    public function serializeDateTimeImmutableToXml(
        XmlSerializationVisitor $visitor,
        DateTimeImmutable $datetime,
        array $type,
        Context $context
    ): DOMText {
        $format = $type['params'][0] ?? self::DEFAULT_DATETIME_FORMAT;
        $formattedDateTime = $datetime->format($format);
        return $visitor->visitSimpleString($formattedDateTime, []);
    }

    /**
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function deserializeDateTimeImmutableFromXml(
        XmlDeserializationVisitor $visitor,
        $value,
        array $type,
        Context $context
    ) {
        $format = $type['params'][0] ?? self::DEFAULT_DATETIME_FORMAT;
        return DateTimeImmutable::createFromFormat($format, (string)$value);
    }
}
