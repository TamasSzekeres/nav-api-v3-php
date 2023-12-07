<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Adott tételsor termékértékesítés vagy szolgáltatás nyújtás jellegének jelzése.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum LineNatureIndicatorType: string
{
    /**
     * Termékértékesítés.
     */
    case PRODUCT = 'PRODUCT';

    /**
     * Szolgáltatás nyújtás.
     */
    case SERVICE = 'SERVICE';

    /**
     * Egyéb, nem besorolható.
     */
    case OTHER = 'OTHER';
}
