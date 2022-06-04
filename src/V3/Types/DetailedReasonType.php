<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Mentesség, kivétel részletes indokolása.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class DetailedReasonType extends BaseType
{
    /**
     * @var string Az eset leírása kóddal.
     */
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public string $case;

    /**
     * @var string Az eset leírása szöveggel.
     */
    #[StringValidation(minLength: 1, maxLength: 200, pattern: ".*[^\s].*")]
    public string $reason;
}
