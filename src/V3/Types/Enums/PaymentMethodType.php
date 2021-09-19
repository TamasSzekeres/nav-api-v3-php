<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Fizetés módja.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class PaymentMethodType
{
    /**
     * Banki átutalás.
     */
    const TRANSFER = 'TRANSFER';

    /**
     * Készpénz.
     */
    const CASH = 'CASH';

    /**
     * Bankkártya, hitelkártya, egyéb készpénz helyettesítő eszköz.
     */
    const CARD = 'CARD';

    /**
     * Utalvány, váltó, egyéb pénzhelyettesítő eszköz.
     */
    const VOUCHER = 'VOUCHER';

    /**
     * Egyéb.
     */
    const OTHER = 'OTHER';
}
