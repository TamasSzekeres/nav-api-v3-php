<?php

use LightSideSoftware\NavApi\V3\Types\AddressType;
use LightSideSoftware\NavApi\V3\Types\BatchInvoiceType;
use LightSideSoftware\NavApi\V3\Types\CustomerInfoType;
use LightSideSoftware\NavApi\V3\Types\CustomerTaxNumberType;
use LightSideSoftware\NavApi\V3\Types\CustomerVatDataType;
use LightSideSoftware\NavApi\V3\Types\DetailedAddressType;
use LightSideSoftware\NavApi\V3\Types\Enums\CustomerVatStatusType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceAppearanceType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\LineNatureIndicatorType;
use LightSideSoftware\NavApi\V3\Types\Enums\PaymentMethodType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductCodeCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\UnitOfMeasureType;
use LightSideSoftware\NavApi\V3\Types\InvoiceDetailType;
use LightSideSoftware\NavApi\V3\Types\InvoiceHeadType;
use LightSideSoftware\NavApi\V3\Types\InvoiceMainType;
use LightSideSoftware\NavApi\V3\Types\InvoiceType;
use LightSideSoftware\NavApi\V3\Types\LineAmountsNormalType;
use LightSideSoftware\NavApi\V3\Types\LineGrossAmountDataType;
use LightSideSoftware\NavApi\V3\Types\LineNetAmountDataType;
use LightSideSoftware\NavApi\V3\Types\LinesType;
use LightSideSoftware\NavApi\V3\Types\LineType;
use LightSideSoftware\NavApi\V3\Types\LineVatDataType;
use LightSideSoftware\NavApi\V3\Types\ProductCodeType;
use LightSideSoftware\NavApi\V3\Types\SummaryByVatRateType;
use LightSideSoftware\NavApi\V3\Types\SummaryGrossDataType;
use LightSideSoftware\NavApi\V3\Types\SummaryNormalType;
use LightSideSoftware\NavApi\V3\Types\SummaryType;
use LightSideSoftware\NavApi\V3\Types\SupplierInfoType;
use LightSideSoftware\NavApi\V3\Types\TaxNumberType;
use LightSideSoftware\NavApi\V3\Types\VatRateNetDataType;
use LightSideSoftware\NavApi\V3\Types\VatRateType;
use LightSideSoftware\NavApi\V3\Types\VatRateVatDataType;

const INVOICE_TYPE_EXAMPLE = new InvoiceType(
    invoiceHead: new InvoiceHeadType(
        supplierInfo: new SupplierInfoType(
            supplierTaxNumber: new TaxNumberType(
                taxpayerId: '99999999',
                vatCode: '2',
                countyCode: '41',
            ),
            supplierName: 'Értékesítő Kft',
            supplierAddress: new AddressType(
                detailedAddress: new DetailedAddressType(
                    countryCode: 'HU',
                    postalCode: '1234',
                    city: 'Budapest',
                    streetName: 'Hármas',
                    publicPlaceCategory: 'utca',
                    number: '1',
                ),
            ),
            supplierBankAccountNumber: '12345678-12345678-12345678',
        ),
        invoiceDetail: new InvoiceDetailType(
            invoiceCategory: InvoiceCategoryType::NORMAL,
            invoiceDeliveryDate: new DateTimeImmutable('2021-05-10'),
            currencyCode: 'EUR',
            exchangeRate: 343.0,
            invoiceAppearance: InvoiceAppearanceType::PAPER,
            paymentMethod: PaymentMethodType::TRANSFER,
            paymentDate: new DateTimeImmutable('2021-05-30'),
        ),
        customerInfo: new CustomerInfoType(
            customerVatStatus: CustomerVatStatusType::DOMESTIC,
            customerVatData: new CustomerVatDataType(
                customerTaxNumber: new CustomerTaxNumberType(
                    taxpayerId: '99887764',
                    vatCode: '2',
                    countyCode: '02',
                ),
            ),
            customerName: 'Beszerző Kft',
            customerAddress: new AddressType(
                detailedAddress: new DetailedAddressType(
                    countryCode: 'HU',
                    postalCode: '7600',
                    city: 'Pécs',
                    streetName: 'Északi',
                    publicPlaceCategory: 'sugárút',
                    number: '123',
                ),
            ),
        ),
    ),
    invoiceSummary: new SummaryType(
        summaryNormal: new SummaryNormalType(
            summaryByVatRate: new SummaryByVatRateType(
                vatRate: new VatRateType(
                    vatPercentage: 0.27,
                ),
                vatRateNetData: new VatRateNetDataType(
                    vatRateNetAmount: 4000.0,
                    vatRateNetAmountHUF: 1372000.0,
                ),
                vatRateVatData: new VatRateVatDataType(
                    vatRateVatAmount: 1080.0,
                    vatRateVatAmountHUF: 370440.0,
                ),
            ),
            invoiceNetAmount: 4000.0,
            invoiceNetAmountHUF: 1372000.0,
            invoiceVatAmount: 1080.0,
            invoiceVatAmountHUF: 370440.0,
        ),
        summaryGrossData: new SummaryGrossDataType(
            invoiceGrossAmount: 5080.0,
            invoiceGrossAmountHUF: 1742440.0,
        ),
    ),
    invoiceLines: new LinesType(
        mergedItemIndicator: false,
        lines: [
            new LineType(
                lineNumber: 1,
                lineExpressionIndicator: true,
                productCodes: [
                    new ProductCodeType(
                        productCodeCategory: ProductCodeCategoryType::VTSZ,
                        productCodeValue: '16010091',
                    ),
                ],
                lineNatureIndicator: LineNatureIndicatorType::PRODUCT,
                lineDescription: 'Érlelt szalámi',
                quantity: 1600.0,
                unitOfMeasure: UnitOfMeasureType::KILOGRAM,
                unitPrice: 10.0,
                unitPriceHUF: 3430.0,
                lineAmountsNormal: new LineAmountsNormalType(
                    lineNetAmountData: new LineNetAmountDataType(
                        lineNetAmount: 16000.0,
                        lineNetAmountHUF: 5488000.0,
                    ),
                    lineVatRate: new VatRateType(
                        vatPercentage: 0.27,
                    ),
                    lineVatData: new LineVatDataType(
                        lineVatAmount: 4320.0,
                        lineVatAmountHUF: 1481760.0,
                    ),
                    lineGrossAmountData: new LineGrossAmountDataType(
                        lineGrossAmountNormal: 20320.0,
                        lineGrossAmountNormalHUF: 6969760.0,
                    ),
                ),
            ),
        ],
    ),
);

const BATCH_INVOICE_TYPE_EXAMPLE = new BatchInvoiceType(
    batchIndex: 1,
    invoice: INVOICE_TYPE_EXAMPLE,
);

it('throws no exceptions', function () {
    new InvoiceMainType(
        invoice: INVOICE_TYPE_EXAMPLE,
    );

    new InvoiceMainType(
        batchInvoices: [BATCH_INVOICE_TYPE_EXAMPLE],
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException', function (
    ?InvoiceType $invoice,
    array $batchInvoices
) {
    new InvoiceMainType(
        invoice: $invoice,
        batchInvoices: $batchInvoices,
    );
})->with([
    [null, []],
    [INVOICE_TYPE_EXAMPLE, [BATCH_INVOICE_TYPE_EXAMPLE]],
])->throws(InvalidArgumentException::class);
