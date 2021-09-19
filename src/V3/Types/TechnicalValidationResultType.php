<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Technikai validációs választípus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class TechnicalValidationResultType extends BaseType
{
    /**
     * @var string Validációs eredmény.
     */
    public $validationResultCode;

    /**
     * @var string Validációs hibakód.
     */
    public $validationErrorCode;

    /**
     * @var string Feldolgozási üzenet.
     */
    public $message;
}
