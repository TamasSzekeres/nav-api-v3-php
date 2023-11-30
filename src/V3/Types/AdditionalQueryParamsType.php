<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * A számla lekérdezés kiegészítő paraméterei.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class AdditionalQueryParamsType extends BaseType
{
    public function __construct(
        /**
         * @var string A számla kiállítójának vagy vevőjének adószáma (a keresési feltétel az invoiceDirection tag értékétől függ).
         */
        public string $taxNumber,

        /**
         * @var string A számla kiállítójának vagy vevőjének csoport tag adószáma (a keresési feltétel az invoiceDirection tag értékétől függ).
         */
        public string $groupMemberTaxNumber,

        /**
         * @var string A számla kiállítójának vagy vevőjének keresőparamétere szó eleji egyezőségre (a keresési feltétel az invoiceDirection tag értékétől függ).
         */
        public string $name,

        /**
         * @var string A számla típusa.
         */
        public string $invoiceCategory,

        /**
         * @var string Fizetés módja.
         */
        public string $paymentMethod,

        /**
         * @var string A számla megjelenési formája.
         */
        public string $invoiceAppearance,

        /**
         * @var string Az adatszolgáltatás forrása.
         */
        public string $source,

        /**
         * @var string A számla pénzneme.
         */
        public string $currency,
    ) {
        parent::__construct();
    }
}
