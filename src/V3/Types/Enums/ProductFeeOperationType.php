<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Termékdíj összesítés típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum ProductFeeOperationType: string
{
    /**
     * Visszaigénylés.
     */
    case REFUND = 'REFUND';

    /**
     * Raktárba szállítás.
     */
    case DEPOSIT = 'DEPOSIT';
}
