<?php

use LightSideSoftware\NavApi\V3\Types\AddressType;
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
use LightSideSoftware\NavApi\V3\Types\InvoiceData;
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

test('create invoice-data from xml', function () {
    $invoiceXml = loadTestInvoice('Invoice1');

    $invoice = InvoiceData::fromXml($invoiceXml);

    expect($invoice)->toBeInstanceOf(InvoiceData::class)
        ->and($invoice->invoiceNumber)->toBe('2021/00345')
        ->and($invoice->invoiceIssueDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2021-05-15'))
        ->and($invoice->completenessIndicator)->toBeFalse()
        ->and($invoice->invoiceMain)->toBeInstanceOf(InvoiceMainType::class)
        ->and($invoice->invoiceMain->invoice)->toBeInstanceOf(InvoiceType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead)->toBeInstanceOf(InvoiceHeadType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo)->toBeInstanceOf(SupplierInfoType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierTaxNumber)->toBeInstanceOf(TaxNumberType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierTaxNumber->taxpayerId)->toBe('99999999')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierTaxNumber->vatCode)->toBe('2')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierTaxNumber->countyCode)->toBe('41')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierName)->toBe('Értékesítő Kft')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress)->toBeInstanceOf(AddressType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress->detailedAddress)->toBeInstanceOf(DetailedAddressType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress->detailedAddress->countryCode)->toBe('HU')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress->detailedAddress->postalCode)->toBe('1234')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress->detailedAddress->city)->toBe('Budapest')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress->detailedAddress->streetName)->toBe('Hármas')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress->detailedAddress->publicPlaceCategory)->toBe('utca')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress->detailedAddress->number)->toBe('1')
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierAddress->simpleAddress)->toBeNull()
        ->and($invoice->invoiceMain->invoice->invoiceHead->supplierInfo->supplierBankAccountNumber)->toBe('12345678-12345678-12345678')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo)->toBeInstanceOf(CustomerInfoType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerVatStatus)->toBe(CustomerVatStatusType::DOMESTIC)
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerVatData)->toBeInstanceOf(CustomerVatDataType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerVatData->customerTaxNumber)->toBeInstanceOf(CustomerTaxNumberType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerVatData->customerTaxNumber->taxpayerId)->toBe('99887764')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerVatData->customerTaxNumber->vatCode)->toBe('2')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerVatData->customerTaxNumber->countyCode)->toBe('02')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerName)->toBe('Beszerző Kft')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress)->toBeInstanceOf(AddressType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress->detailedAddress)->toBeInstanceOf(DetailedAddressType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress->detailedAddress->countryCode)->toBe('HU')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress->detailedAddress->postalCode)->toBe('7600')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress->detailedAddress->city)->toBe('Pécs')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress->detailedAddress->streetName)->toBe('Északi')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress->detailedAddress->publicPlaceCategory)->toBe('sugárút')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress->detailedAddress->number)->toBe('123')
        ->and($invoice->invoiceMain->invoice->invoiceHead->customerInfo->customerAddress->simpleAddress)->toBeNull()
        ->and($invoice->invoiceMain->invoice->invoiceHead->invoiceDetail)->toBeInstanceOf(InvoiceDetailType::class)
        ->and($invoice->invoiceMain->invoice->invoiceHead->invoiceDetail->invoiceCategory)->toBe(InvoiceCategoryType::NORMAL)
        ->and($invoice->invoiceMain->invoice->invoiceHead->invoiceDetail->invoiceDeliveryDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2021-05-10'))
        ->and($invoice->invoiceMain->invoice->invoiceHead->invoiceDetail->currencyCode)->toBe('EUR')
        ->and($invoice->invoiceMain->invoice->invoiceHead->invoiceDetail->exchangeRate)->toBe(343.0)
        ->and($invoice->invoiceMain->invoice->invoiceHead->invoiceDetail->paymentMethod)->toBe(PaymentMethodType::TRANSFER)
        ->and($invoice->invoiceMain->invoice->invoiceHead->invoiceDetail->paymentDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2021-05-30'))
        ->and($invoice->invoiceMain->invoice->invoiceHead->invoiceDetail->invoiceAppearance)->toBe(InvoiceAppearanceType::PAPER);

    expect($invoice->invoiceMain->invoice->invoiceLines)->toBeInstanceOf(LinesType::class)
        ->and($invoice->invoiceMain->invoice->invoiceLines->mergedItemIndicator)->toBeFalse()
        ->and($invoice->invoiceMain->invoice->invoiceLines->lines)->toBeArray()
        ->and($invoice->invoiceMain->invoice->invoiceLines->lines)->toHaveCount(3);

    $line0 = $invoice->invoiceMain->invoice->invoiceLines->lines[0];
    expect($line0)->toBeInstanceOf(LineType::class)
        ->and($line0->lineNumber)->toBe(1)
        ->and($line0->productCodes)->toBeArray()
        ->and($line0->productCodes)->toHaveCount(1)
        ->and($line0->productCodes[0])->toBeInstanceOf(ProductCodeType::class)
        ->and($line0->productCodes[0]->productCodeCategory)->toBe(ProductCodeCategoryType::VTSZ)
        ->and($line0->productCodes[0]->productCodeValue)->toBe('16010091')
        ->and($line0->lineExpressionIndicator)->toBeTrue()
        ->and($line0->lineNatureIndicator)->toBe(LineNatureIndicatorType::PRODUCT)
        ->and($line0->lineDescription)->toBe('Érlelt szalámi')
        ->and($line0->quantity)->toBe(1600.0)
        ->and($line0->unitOfMeasure)->toBe(UnitOfMeasureType::KILOGRAM)
        ->and($line0->unitPrice)->toBe(10.0)
        ->and($line0->unitPriceHUF)->toBe(3430.0)
        ->and($line0->lineAmountsNormal)->toBeInstanceOf(LineAmountsNormalType::class)
        ->and($line0->lineAmountsNormal->lineNetAmountData)->toBeInstanceOf(LineNetAmountDataType::class)
        ->and($line0->lineAmountsNormal->lineNetAmountData->lineNetAmount)->toBe(16000.0)
        ->and($line0->lineAmountsNormal->lineNetAmountData->lineNetAmountHUF)->toBe(5488000.0)
        ->and($line0->lineAmountsNormal->lineVatRate)->toBeInstanceOf(VatRateType::class)
        ->and($line0->lineAmountsNormal->lineVatRate->vatPercentage)->toBe(0.27)
        ->and($line0->lineAmountsNormal->lineVatData)->toBeInstanceOf(LineVatDataType::class)
        ->and($line0->lineAmountsNormal->lineVatData->lineVatAmount)->toBe(4320.0)
        ->and($line0->lineAmountsNormal->lineVatData->lineVatAmountHUF)->toBe(1481760.0)
        ->and($line0->lineAmountsNormal->lineGrossAmountData)->toBeInstanceOf(LineGrossAmountDataType::class)
        ->and($line0->lineAmountsNormal->lineGrossAmountData->lineGrossAmountNormal)->toBe(20320.0)
        ->and($line0->lineAmountsNormal->lineGrossAmountData->lineGrossAmountNormalHUF)->toBe(6969760.0);

    $invoiceSummary = $invoice->invoiceMain->invoice->invoiceSummary;
    expect($invoiceSummary)->toBeInstanceOf(SummaryType::class)
        ->and($invoiceSummary->summaryNormal)->toBeInstanceOf(SummaryNormalType::class)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate)->toBeArray()
        ->and($invoiceSummary->summaryNormal->summariesByVatRate)->toHaveCount(1)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0])->toBeInstanceOf(SummaryByVatRateType::class)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0]->vatRate)->toBeInstanceOf(VatRateType::class)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0]->vatRate->vatPercentage)->toBe(0.27)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0]->vatRateNetData)->toBeInstanceOf(VatRateNetDataType::class)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0]->vatRateNetData->vatRateNetAmount)->toBe(4000.0)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0]->vatRateNetData->vatRateNetAmountHUF)->toBe(1372000.0)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0]->vatRateVatData)->toBeInstanceOf(VatRateVatDataType::class)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0]->vatRateVatData->vatRateVatAmount)->toBe(1080.0)
        ->and($invoiceSummary->summaryNormal->summariesByVatRate[0]->vatRateVatData->vatRateVatAmountHUF)->toBe(370440.0)
        ->and($invoiceSummary->summaryNormal->invoiceNetAmount)->toBe(4000.0)
        ->and($invoiceSummary->summaryNormal->invoiceNetAmountHUF)->toBe(1372000.0)
        ->and($invoiceSummary->summaryNormal->invoiceVatAmount)->toBe(1080.0)
        ->and($invoiceSummary->summaryNormal->invoiceVatAmountHUF)->toBe(370440.0)
        ->and($invoiceSummary->summaryGrossData)->toBeInstanceOf(SummaryGrossDataType::class)
        ->and($invoiceSummary->summaryGrossData->invoiceGrossAmount)->toBe(5080.0)
        ->and($invoiceSummary->summaryGrossData->invoiceGrossAmountHUF)->toBe(1742440.0);
});

it('throws no exception', function () {
    new InvoiceData(
        invoiceNumber: '2021/00345',
        invoiceIssueDate: new DateTimeImmutable('2021-05-15'),
        completenessIndicator: false,
        invoiceMain: new InvoiceMainType(
            invoice: new InvoiceType(
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
                        summariesByVatRate: [
                            new SummaryByVatRateType(
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
                        ],
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
            ),
        )
);
})->throwsNoExceptions();
