<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
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
    public ?string $errorCode = null;

    /**
     * @var ?string Feldolgozási üzenet.
     */
    public ?string $message = null;

    /**
     * @var array Egyéb értesítések.
     */
    #[SkipWhenEmpty]
    public array $notifications = [];
}
