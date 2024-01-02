<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Technikai érvénytelenítő kérések jóváhagyási státusza.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum AnnulmentVerificationStatusType implements EnumContract
{
    use EnumConcern;

    /**
     * A technikai érvénytelenítés kliens hiba miatt nem hagyható jóvá.
     */
    case NOT_VERIFIABLE;

    /**
     * A technikai érvénytelenítés jóváhagyásra vár.
     */
    case VERIFICATION_PENDING;

    /**
     * A technikai érvénytelenítés jóváhagyásra került.
     */
    case VERIFICATION_DONE;

    /**
     * A technikai érvénytelenítés elutasításra került.
     */
    case VERIFICATION_REJECTED;
}
