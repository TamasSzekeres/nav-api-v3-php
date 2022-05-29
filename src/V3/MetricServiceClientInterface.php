<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsListResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsResponse;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
interface MetricServiceClientInterface
{
    public function metric(): QueryServiceMetricsResponse;

    public function list(): QueryServiceMetricsListResponse;

    public function metricByName(string $metricName): QueryServiceMetricsResponse;
}
