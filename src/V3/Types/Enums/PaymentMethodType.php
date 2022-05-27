<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Fizetés módja.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum PaymentMethodType
{
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
