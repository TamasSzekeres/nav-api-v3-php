<?php

use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;
use LightSideSoftware\NavApi\V3\Types\InvoiceNumberQueryType;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceDataRequest;

test('convert invoice-check-request to xml', function () {
    $request = new QueryInvoiceDataRequest(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        user: USER_HEADER_TYPE_EXAMPLE,
        software: SOFTWARE_TYPE_EXAMPLE,
        invoiceNumberQuery: new InvoiceNumberQueryType(
            invoiceNumber: '2022/1233',
            invoiceDirection: InvoiceDirectionType::OUTBOUND,
            batchIndex: 3,
            supplierTaxNumber: '22223344',
        ),
    );

    $expected = loadTestRequest('QueryInvoiceDataRequest');

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
