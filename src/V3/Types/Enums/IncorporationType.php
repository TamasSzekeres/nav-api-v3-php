<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Gazdasági típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum IncorporationType: string
{
    /**
     * Gazdasági társaság.
     */
    case ORGANIZATION = 'ORGANIZATION';

    /**
     * Egyéni vállalkozó.
     */
    case SELF_EMPLOYED = 'SELF_EMPLOYED';

    /**
     * Adószámos magánszemély.
     */
    case TAXABLE_PERSON = 'TAXABLE_PERSON';
}
