<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsListResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsResponse;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
interface MetricServiceClientInterface
{
    /**
     * Visszaadja egy előre meghatározott időablakban (elmúlt 1 óra) lévő összes elérhető metrikát, értékekkel együtt.
     *
     * @return QueryServiceMetricsResponse
     */
    public function metric(): QueryServiceMetricsResponse;

    /**
     * Visszaadja az összes elérhető metrika nevét és leírását, érték nélkül.
     *
     * @return QueryServiceMetricsListResponse
     */
    public function list(): QueryServiceMetricsListResponse;

    /**
     * Visszaadja `$metricName` paraméterben megadott metrika nevét, leírását és értékeit.
     *
     * @param string $metricName Metrika neve.
     * @return QueryServiceMetricsResponse
     */
    public function metricByName(string $metricName): QueryServiceMetricsResponse;
}
