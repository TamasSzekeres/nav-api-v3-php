<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

use LightSideSoftware\NavApi\V3\Types\Requests\ManageAnnulmentRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\ManageInvoiceRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceChainDigestRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceCheckRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceDataRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceDigestRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTaxpayerRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTransactionListRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTransactionStatusRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\TokenExchangeRequest;
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
    public function manageAnnulment(ManageAnnulmentRequest $manageAnnulmentRequest): ManageAnnulmentResponse;

    public function manageInvoice(ManageInvoiceRequest $manageInvoiceRequest): ManageInvoiceResponse;

    public function queryInvoiceChainDigest(QueryInvoiceChainDigestRequest $queryInvoiceChainDigestRequest): QueryInvoiceChainDigestResponse;

    public function queryInvoiceCheck(QueryInvoiceCheckRequest $queryInvoiceCheckRequest): QueryInvoiceCheckResponse;

    public function queryInvoiceData(QueryInvoiceDataRequest $queryInvoiceDataRequest): QueryInvoiceDataResponse;

    public function queryInvoiceDigest(QueryInvoiceDigestRequest $queryInvoiceDigestRequest): QueryInvoiceDigestResponse;

    public function queryTransactionList(QueryTransactionListRequest $queryTransactionListRequest): QueryTransactionListResponse;

    public function queryTransactionStatus(QueryTransactionStatusRequest $queryTransactionStatusRequest): QueryTransactionStatusResponse;

    public function queryTaxpayer(QueryTaxpayerRequest $queryTaxpayerRequest): QueryTaxpayerResponse;

    public function tokenExchange(TokenExchangeRequest $tokenExchangeRequest): TokenExchangeResponse;
}
