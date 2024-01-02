<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Fizetés módja.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum PaymentMethodType implements EnumContract
{
    use EnumConcern;

    /**
     * Banki átutalás.
     */
    case TRANSFER;

    /**
     * Készpénz.
     */
    case CASH;

    /**
     * Bankkártya, hitelkártya, egyéb készpénz helyettesítő eszköz.
     */
    case CARD;

    /**
     * Utalvány, váltó, egyéb pénzhelyettesítő eszköz.
     */
    case VOUCHER;

    /**
     * Egyéb.
     */
    case OTHER;
}
