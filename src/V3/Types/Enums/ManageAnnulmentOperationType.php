<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Technikai érvénytelenítés műveleti típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum ManageAnnulmentOperationType: string
{
    /**
     * Korábbi adatszolgáltatás technikai érvénytelenítése.
     */
    case ANNUL = 'ANNUL';
}
