<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\ResponsePageTypeValidation;

/**
 * Számla lekérdezési eredmények.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceDigestResultType extends BaseType
{
    public function __construct(
        /**
         * @var int A jelenleg lekérdezett lapszáma.
         */
        #[ResponsePageTypeValidation]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public int $currentPage,

        /**
         * @var int A lekérdezés eredménye szerint elérhető utolsó lapszám.
         */
        #[ResponsePageTypeValidation]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public int $availablePage,

        /**
         * @var array<int, InvoiceDigestType> Számla kivonat lekérdezési eredmény.
         */
        #[ArrayValidation(itemType: InvoiceDigestType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\InvoiceDigestType>')]
        #[XmlList(entry: 'invoiceDigest', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public array $invoiceDigests = [],
    ) {
        parent::__construct();
    }
}
