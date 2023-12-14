<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

use LightSideSoftware\NavApi\V3\Exceptions\GeneralErrorResponseException;
use LightSideSoftware\NavApi\V3\Exceptions\GeneralExceptionResponseException;
use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\AnnulmentOperationType;
use LightSideSoftware\NavApi\V3\Types\DateTimeIntervalParamType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;
use LightSideSoftware\NavApi\V3\Types\Enums\RequestStatusType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainQueryType;
use LightSideSoftware\NavApi\V3\Types\InvoiceNumberQueryType;
use LightSideSoftware\NavApi\V3\Types\InvoiceOperationListType;
use LightSideSoftware\NavApi\V3\Types\InvoiceQueryParamsType;
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
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
interface InvoiceServiceClientInterface
{
    /**
     * A technikai érvénytelenítés beküldésére szolgáló operáció.
     *
     * @param array<int, AnnulmentOperationType> $annulmentOperations
     * @return ManageAnnulmentResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function manageAnnulment(array $annulmentOperations): ManageAnnulmentResponse;

    /**
     * A számlaadat-szolgáltatás beküldésre szolgáló operáció, ezen keresztül van
     * lehetőség számla vagy módosító okirat adatait a NAV-nak beküldeni.
     *
     * @param InvoiceOperationListType $invoiceOperations
     * @return ManageInvoiceResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function manageInvoice(InvoiceOperationListType $invoiceOperations): ManageInvoiceResponse;

    /**
     * Számlalánc kivonatos lekérdezésére szolgáló operáció.
     *
     * @param InvoiceChainQueryType $invoiceChainQuery
     * @param int $page
     * @return QueryInvoiceChainDigestResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function queryInvoiceChainDigest(
        InvoiceChainQueryType $invoiceChainQuery,
        int $page = 1,
    ): QueryInvoiceChainDigestResponse;

    /**
     * Sikeres számlaadat-szolgáltatás ellenőrzésére szolgáló operáció.
     *
     * @param InvoiceNumberQueryType $invoiceNumberQuery
     * @return QueryInvoiceCheckResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function queryInvoiceCheck(InvoiceNumberQueryType $invoiceNumberQuery): QueryInvoiceCheckResponse;

    /**
     * A számlaadatok teljes adattartalmú lekérdezésére szolgáló operáció
     * számlasorszám alapján.
     *
     * @param InvoiceNumberQueryType $invoiceNumberQuery
     * @return QueryInvoiceDataResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function queryInvoiceData(InvoiceNumberQueryType $invoiceNumberQuery): QueryInvoiceDataResponse;

    /**
     * Számlaadatok kivonatos lekérdezésére szolgáló operáció, kötelező és
     * opcionális keresőparaméterek alapján.
     *
     * @param InvoiceDirectionType $invoiceDirection
     * @param InvoiceQueryParamsType $invoiceQueryParams
     * @param int $page
     * @return QueryInvoiceDigestResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function queryInvoiceDigest(
        InvoiceDirectionType $invoiceDirection,
        InvoiceQueryParamsType $invoiceQueryParams,
        int $page = 1,
    ): QueryInvoiceDigestResponse;

    /**
     * Beküldött tranzakciók lekérdezése megadott időintervallum alapján.
     *
     * @param DateTimeIntervalParamType $insDate
     * @param RequestStatusType|null $requestStatus
     * @param int $page
     * @return QueryTransactionListResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function queryTransactionList(
        DateTimeIntervalParamType $insDate,
        ?RequestStatusType $requestStatus = null,
        int $page = 1,
    ): QueryTransactionListResponse;

    /**
     * Számlaadat-szolgáltatás és technikai érvénytelenítés feldolgozási
     * eredményének lekérdezésére szolgáló operáció.
     *
     * @param string $transactionId
     * @param bool|null $returnOriginalRequest
     * @return QueryTransactionStatusResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function queryTransactionStatus(
        string $transactionId,
        ?bool $returnOriginalRequest = null,
    ): QueryTransactionStatusResponse;

    /**
     * Belföldi adószám validáló operáció, mely a számlakiállítás folyamatába
     * építve képes a megadott adószám valódiságáról és érvényességéről a NAV adatbázisa alapján
     * adatot szolgáltatni.
     *
     * @param string $taxNumber
     * @return QueryTaxpayerResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function queryTaxpayer(string $taxNumber): QueryTaxpayerResponse;

    /**
     * A számlaadat-szolgáltatás és a technikai érvénytelenítés beküldését
     * megelőző egyszer használatos adatszolgáltatási token kiadását végző operáció.
     *
     * @return TokenExchangeResponse
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws ValidationException
     */
    public function tokenExchange(): TokenExchangeResponse;
}
