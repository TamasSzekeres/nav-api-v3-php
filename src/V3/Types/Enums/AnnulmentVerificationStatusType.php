<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Technikai érvénytelenítő kérések jóváhagyási státusza.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class AnnulmentVerificationStatusType
{
    /**
     * A technikai érvénytelenítés kliens hiba miatt nem hagyható jóvá.
     */
    const NOT_VERIFIABLE = 'NOT_VERIFIABLE';

    /**
     * A technikai érvénytelenítés jóváhagyásra vár.
     */
    const VERIFICATION_PENDING = 'VERIFICATION_PENDING';

    /**
     * A technikai érvénytelenítés jóváhagyásra került.
     */
    const VERIFICATION_DONE = 'VERIFICATION_DONE';

    /**
     * A technikai érvénytelenítés elutasításra került.
     */
    const VERIFICATION_REJECTED = 'VERIFICATION_REJECTED';
}
