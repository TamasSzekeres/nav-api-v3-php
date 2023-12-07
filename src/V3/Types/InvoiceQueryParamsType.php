<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Számla lekérdezési paraméterek.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceQueryParamsType extends BaseType
{
    public function __construct(
        /**
         * @var MandatoryQueryParamsType A számla lekérdezés kötelező paraméterei.
         */
        public MandatoryQueryParamsType $mandatoryQueryParams,

        /**
         * @var ?AdditionalQueryParamsType A számla lekérdezés kiegészítő paraméterei.
         */
        #[SkipWhenEmpty]
        public ?AdditionalQueryParamsType $additionalQueryParams = null,

        /**
         * @var ?RelationalQueryParamsType A számla lekérdezés relációs paraméterei.
         */
        #[SkipWhenEmpty]
        public ?RelationalQueryParamsType $relationalQueryParams = null,

        /**
         * @var ?TransactionQueryParamsType A számla lekérdezés tranzakciós paraméterei.
         */
        #[SkipWhenEmpty]
        public ?TransactionQueryParamsType $transactionQueryParams = null,
    ) {
        parent::__construct();
    }
}
