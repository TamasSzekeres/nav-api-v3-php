<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;

/**
 * Alap válaszeredmény adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class BasicResultType extends BaseType
{
    /**
     * @var FunctionCodeType Feldolgozási eredmény.
     */
    public FunctionCodeType $funcCode;

    /**
     * @var ?string A feldolgozási hibakód.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $errorCode = null;

    /**
     * @var ?string Feldolgozási üzenet.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 1024, pattern: ".*[^\s].*")]
    public ?string $message = null;

    /**
     * @var array<NotificationType> Egyéb értesítések.
     */
    #[SkipWhenEmpty]
    #[Type('array<LightSideSoftware\NavApi\V3\Types\NotificationType>')]
    #[XmlList(entry: 'notification', inline: true)]
    public array $notifications = [];
}
