<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Fizetés módja.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum PaymentMethodType: string
{
    /**
     * Banki átutalás.
     */
    case TRANSFER = 'TRANSFER';

    /**
     * Készpénz.
     */
    case CASH = 'CASH';

    /**
     * Bankkártya, hitelkártya, egyéb készpénz helyettesítő eszköz.
     */
    case CARD = 'CARD';

    /**
     * Utalvány, váltó, egyéb pénzhelyettesítő eszköz.
     */
    case VOUCHER = 'VOUCHER';

    /**
     * Egyéb.
     */
    case OTHER = 'OTHER';
}
