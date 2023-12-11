<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\XmlElement;
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
         * @var ?InvoiceDigestType Számla kivonat lekérdezési eredmény
         */
        #[SkipWhenEmpty]
        #[XmlElement(namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public ?InvoiceDigestType $invoiceDigest = null,
    ) {
        parent::__construct();
    }
}
