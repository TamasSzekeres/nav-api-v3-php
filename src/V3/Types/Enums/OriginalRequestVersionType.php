<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A lekérdezett számla `requestVersion` értéke.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum OriginalRequestVersionType: string
{
    case VERSION_1_0 = '1.0';
    case VERSION_1_1 = '1.1';
    case VERSION_2_0 = '2.0';
    case VERSION_3_0 = '3.0';
}
