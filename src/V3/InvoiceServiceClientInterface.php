<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

use LightSideSoftware\NavApi\V3\Types\Responses\ManageAnnulmentResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\ManageInvoiceResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceChainDigestResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceCheckResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceDataResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceDigestResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTaxpayerResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTransactionListResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTransactionStatusResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\TokenExchangeResponse;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
interface InvoiceServiceClientInterface
{
    public function manageAnnulment(): ManageAnnulmentResponse;

    public function manageInvoice(): ManageInvoiceResponse;

    public function queryInvoiceChainDigest(): QueryInvoiceChainDigestResponse;

    public function queryInvoiceCheck(): QueryInvoiceCheckResponse;

    public function queryInvoiceData(): QueryInvoiceDataResponse;

    public function queryInvoiceDigest(): QueryInvoiceDigestResponse;

    public function queryTransactionList(): QueryTransactionListResponse;

    public function queryTransactionStatus(): QueryTransactionStatusResponse;

    public function queryTaxpayer(string $taxNumber): QueryTaxpayerResponse;

    public function tokenExchange(): TokenExchangeResponse;
}
