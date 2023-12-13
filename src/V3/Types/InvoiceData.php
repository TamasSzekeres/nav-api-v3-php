<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlRoot;

/**
 * XML root element, számla vagy módosítás adatait leíró típus, amelyet BASE64 kódoltan tartalmaz az invoiceApi sémaleíró invoiceData elementje
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlRoot('InvoiceData')]
final readonly class InvoiceData extends InvoiceDataType
{
}
