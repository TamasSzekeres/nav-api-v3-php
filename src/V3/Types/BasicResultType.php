<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Alap válaszeredmény adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class BasicResultType extends BaseType
{
    /**
     * @var string Feldolgozási eredmény.
     */
    public $funcCode;

    /**
     * @var string A feldolgozási hibakód.
     */
    public $errorCode;

    /**
     * @var string Feldolgozási üzenet.
     */
    public $message;

    /**
     * @var array Egyéb értesítések.
     */
    public $notification;
}
