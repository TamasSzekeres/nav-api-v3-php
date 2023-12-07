<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számlatétel módosítás típusa.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum LineOperationType: string
{
    /**
     * Létrehozás.
     */
    case CREATE = 'CREATE';

    /**
     * Módosítás.
     */
    case MODIFY = 'MODIFY';
}
