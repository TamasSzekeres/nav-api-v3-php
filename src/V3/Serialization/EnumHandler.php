<?php /** @noinspection PhpComposerExtensionStubsInspection */

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Serialization;

use DOMText;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;
use LightSideSoftware\NavApi\V3\Types\Enums\AnnulmentCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\AnnulmentVerificationStatusType;
use LightSideSoftware\NavApi\V3\Types\Enums\BusinessResultCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\CustomerVatStatusType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceAppearanceType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceStatusType;
use LightSideSoftware\NavApi\V3\Types\Enums\LanguageType;
use LightSideSoftware\NavApi\V3\Types\Enums\LineNatureIndicatorType;
use LightSideSoftware\NavApi\V3\Types\Enums\LineOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageAnnulmentOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\MarginSchemeType;
use LightSideSoftware\NavApi\V3\Types\Enums\MetricTypeType;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;
use LightSideSoftware\NavApi\V3\Types\Enums\PaymentMethodType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductCodeCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeMeasuringUnitType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductStreamType;
use LightSideSoftware\NavApi\V3\Types\Enums\QueryOperatorType;
use LightSideSoftware\NavApi\V3\Types\Enums\RequestStatusType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;
use LightSideSoftware\NavApi\V3\Types\Enums\TakeoverType;
use LightSideSoftware\NavApi\V3\Types\Enums\TaxpayerAddressTypeType;
use LightSideSoftware\NavApi\V3\Types\Enums\TechnicalResultCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\UnitOfMeasureType;

use function array_map;
use function array_merge;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final class EnumHandler implements SubscribingHandlerInterface
{
    /**
     * @return array<string>
     */
    public static function supportedTypes(): array
    {
        return [
            AnnulmentCodeType::class,
            AnnulmentVerificationStatusType::class,
            BusinessResultCodeType::class,
            CustomerVatStatusType::class,
            FunctionCodeType::class,
            InvoiceAppearanceType::class,
            InvoiceCategoryType::class,
            InvoiceDirectionType::class,
            InvoiceStatusType::class,
            LanguageType::class,
            LineNatureIndicatorType::class,
            LineOperationType::class,
            ManageAnnulmentOperationType::class,
            ManageInvoiceOperationType::class,
            MarginSchemeType::class,
            MetricTypeType::class,
            OriginalRequestVersionType::class,
            PaymentMethodType::class,
            ProductCodeCategoryType::class,
            ProductFeeMeasuringUnitType::class,
            ProductFeeOperationType::class,
            ProductStreamType::class,
            QueryOperatorType::class,
            RequestStatusType::class,
            SoftwareOperationType::class,
            SourceType::class,
            TakeoverType::class,
            TaxpayerAddressTypeType::class,
            TechnicalResultCodeType::class,
            UnitOfMeasureType::class,
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribingMethods(): array
    {
        $supportedTypes = EnumHandler::supportedTypes();

        $serializerMethods = array_map(function (string $enumClass) {
            return [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => $enumClass,
                'method' => 'serializeStringBackedEnumToXml',
            ];
        }, $supportedTypes);

        $deserializerMethods = array_map(function (string $enumClass) {
            return [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => $enumClass,
                'method' => 'deserializeStringBackedEnumFromXml',
            ];
        }, $supportedTypes);

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
