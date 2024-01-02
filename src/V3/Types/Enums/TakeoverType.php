<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Az átvállalás adatait tartalmazó típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum TakeoverType: string implements EnumContract
{
    /**
     * A 2011. évi LXXXV. tv. 14. § (4) bekezdés szerint az eladó (első belföldi forgalomba hozó)
     * vállalja át a vevő termékdíj-kötelezettségét.
     */
    case _01 = '01';

    /**
     * A 2011. évi LXXXV. tv. 14. § (5) aa) alpontja szerint a vevő szerződés alapján
     * átvállalja az eladó termékdíj-kötelezettségét.
     */
    case _02_aa = '02_aa';

    case _02_ab = '02_ab';
    case _02_b = '02_b';
    case _02_c = '02_c';
    case _02_d = '02_d';
    case _02_ea = '02_ea';
    case _02_eb = '02_eb';
    case _02_fa = '02_fa';
    case _02_fb = '02_fb';
    case _02_ga = '02_ga';
    case _02_gb = '02_gb';

    static function fromValue(mixed $value): EnumContract
    {
        return self::from((string)$value);
    }
}
