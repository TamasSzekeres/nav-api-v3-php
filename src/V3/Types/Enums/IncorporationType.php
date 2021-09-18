<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Gazdasági típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class IncorporationType
{
    /**
     * Gazdasági társaság.
     */
    const ORGANIZATION = 'ORGANIZATION';

    /**
     * Egyéni vállalkozó.
     */
    const SELF_EMPLOYED = 'SELF_EMPLOYED';

    /**
     * Adószámos magánszemély.
     */
    const TAXABLE_PERSON = 'TAXABLE_PERSON';
}
