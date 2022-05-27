<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Gazdasági típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum IncorporationType
{
    /**
     * Gazdasági társaság.
     */
    case ORGANIZATION;

    /**
     * Egyéni vállalkozó.
     */
    case SELF_EMPLOYED;

    /**
     * Adószámos magánszemély.
     */
    case TAXABLE_PERSON;
}
