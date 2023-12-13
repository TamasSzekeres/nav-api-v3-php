<?php

use LightSideSoftware\NavApi\V3\Types\AdditionalQueryParamsType;
use LightSideSoftware\NavApi\V3\Types\DateIntervalParamType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceAppearanceType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\PaymentMethodType;
use LightSideSoftware\NavApi\V3\Types\Enums\QueryOperatorType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;
use LightSideSoftware\NavApi\V3\Types\InvoiceQueryParamsType;
use LightSideSoftware\NavApi\V3\Types\MandatoryQueryParamsType;
use LightSideSoftware\NavApi\V3\Types\RelationalQueryParamsType;
use LightSideSoftware\NavApi\V3\Types\RelationQueryDateType;
use LightSideSoftware\NavApi\V3\Types\RelationQueryMonetaryType;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceDigestRequest;
use LightSideSoftware\NavApi\V3\Types\TransactionQueryParamsType;

test('convert inbound invoice-digest-request to xml', function () {
    $request = new QueryInvoiceDigestRequest(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        user: USER_HEADER_TYPE_EXAMPLE,
        software: SOFTWARE_TYPE_EXAMPLE,
        page: 1,
        invoiceDirection: InvoiceDirectionType::INBOUND,
        invoiceQueryParams: new InvoiceQueryParamsType(
            mandatoryQueryParams: new MandatoryQueryParamsType(
                invoiceIssueDate: new DateIntervalParamType(
                    dateFrom: new DateTimeImmutable('2019-01-01'),
                    dateTo: new DateTimeImmutable('2019-01-01'),
                ),
            ),
            additionalQueryParams: new AdditionalQueryParamsType(
                taxNumber: '22222222',
                groupMemberTaxNumber: '33333333',
                name: 'string',
                invoiceCategory: InvoiceCategoryType::AGGREGATE,
                paymentMethod: PaymentMethodType::CASH,
                invoiceAppearance: InvoiceAppearanceType::ELECTRONIC,
                source: SourceType::MGM,
                currency: 'WJP',
            ),
            relationalQueryParams: new RelationalQueryParamsType(
                invoiceDeliveries: [
                    new RelationQueryDateType(
                        queryOperator: QueryOperatorType::EQ,
                        queryValue: new DateTimeImmutable('2019-09-09'),
                    ),
                ],
                paymentDates: [
                    new RelationQueryDateType(
                        queryOperator: QueryOperatorType::GTE,
                        queryValue: new DateTimeImmutable('2019-09-09'),
                    ),
                ],
                invoiceNetAmounts: [
                    new RelationQueryMonetaryType(
                        queryOperator: QueryOperatorType::LTE,
                        queryValue: 1234.12,
                    ),
                ],
                invoiceNetAmountsHUF: [
                    new RelationQueryMonetaryType(
                        queryOperator: QueryOperatorType::GT,
                        queryValue: 1234.11,
                    ),
                ],
                invoiceVatAmounts: [
                    new RelationQueryMonetaryType(
                        queryOperator: QueryOperatorType::LT,
                        queryValue: 1234.13,
                    ),
                ],
                invoiceVatAmountsHUF: [
                    new RelationQueryMonetaryType(
                        queryOperator: QueryOperatorType::EQ,
                        queryValue: 1234.12,
                    ),
                ],
            ),
            transactionQueryParams: new TransactionQueryParamsType(
                transactionId: '2OY7YG4DM3GUR9WZ',
                index: 1,
                invoiceOperation: ManageInvoiceOperationType::STORNO,
            ),
        ),
    );

    $expected = loadTestRequest('QueryInvoiceDigestRequest');

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
