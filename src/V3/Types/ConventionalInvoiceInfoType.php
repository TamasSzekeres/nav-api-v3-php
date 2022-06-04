<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;

/**
 * A számlafeldolgozást segítő, egyezményesen nevesített egyéb adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class ConventionalInvoiceInfoType extends BaseType
{
    /**
     * @var array<string> Megrendelésszám(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'orderNumber', inline: false)]
    public array $orderNumbers = [];

    /**
     * @var array<string> Szállítólevél szám(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'deliveryNote', inline: false)]
    public array $deliveryNotes = [];

    /**
     * @var array<string> Szállítási dátum(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'shippingDate', inline: false)]
    public array $shippingdates = [];

    /**
     * @var array<string> Szerződésszám(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'contractNumber', inline: false)]
    public array $contractNumbers = [];

    /**
     * @var array<string> Az eladó vállalati kódja(i).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'supplierCompanyCode', inline: false)]
    public array $supplierCompanyCodes = [];

    /**
     * @var array<string> A vevő vállalati kódja(i).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'customerCompanyCode', inline: false)]
    public array $customerCompanyCodes = [];

    /**
     * @var array<string> Beszállító kód(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'dealerCode', inline: false)]
    public array $dealerCodes = [];

    /**
     * @var array<string> Költséghely(ek).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'costCenter', inline: false)]
    public array $costCenters = [];

    /**
     * @var array<string> Projektszám(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'projectNumber', inline: false)]
    public array $projectNumbers = [];

    /**
     * @var array<string> Főkönyvi számlaszám(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'generalLedgerAccountNumber', inline: false)]
    public array $generalLedgerAccountNumbers = [];

    /**
     * @var array<string> Kiállítói globális helyazonosító szám(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'glnNumber', inline: false)]
    public array $glnNumbersSupplier = [];

    /**
     * @var array<string> Anyagszám(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'materialNumber', inline: false)]
    public array $materialNumbers = [];

    /**
     * @var array<string> Cikkszám(ok).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'itemNumber', inline: false)]
    public array $itemNumbers = [];

    /**
     * @var array<string> EKÁER azonosító(k).
     */
    #[SkipWhenEmpty]
    #[Type('array<string>')]
    #[XmlList(entry: 'ekaerId', inline: false)]
    public array $ekaerIds = [];
}
