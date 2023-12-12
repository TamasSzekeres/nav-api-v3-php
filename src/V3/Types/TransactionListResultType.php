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
 * Tranzakció lekérdezési eredményei.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class TransactionListResultType extends BaseType
{
    public function __construct(
        /**
         * @var int A jelenleg lekérdezett lapszám.
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
         * @var array<int, TransactionType> Tranzakció lekérdezési eredmény.
         */
        #[ArrayValidation(itemType: TransactionType::class)]
        #[SkipWhenEmpty]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\TransactionType>')]
        #[XmlList(entry: 'transaction', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public array $transactions = [],
    ) {
        parent::__construct();
    }
}
