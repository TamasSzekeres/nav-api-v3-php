<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Termék/szolgáltatás tételek.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class LinesType extends BaseType
{
    /**
     * @var bool Jelöli, ha az adatszolgáltatás méretcsökkentés miatt összevont soradatokat tartalmaz.
     */
    public bool $mergedItemIndicator;

    /**
     * @var LineType Termék/szolgáltatás tétel.
     */
    public LineType $line;
}
