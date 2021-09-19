<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * A számla lekérdezés kiegészítő paraméterei.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class AdditionalQueryParamsType extends BaseType
{
    /**
     * @var string A számla kiállítójának vagy vevőjének adószáma (a keresési feltétel az invoiceDirection tag értékétől függ).
     */
    public $taxNumber;

    /**
     * @var string A számla kiállítójának vagy vevőjének csoport tag adószáma (a keresési feltétel az invoiceDirection tag értékétől függ).
     */
    public $groupMemberTaxNumber;

    /**
     * @var string A számla kiállítójának vagy vevőjének keresőparamétere szó eleji egyezőségre (a keresési feltétel az invoiceDirection tag értékétől függ).
     */
    public $name;

    /**
     * @var string A számla típusa.
     */
    public $invoiceCategory;

    /**
     * @var string Fizetés módja.
     */
    public $paymentMethod;

    /**
     * @var string A számla megjelenési formája.
     */
    public $invoiceAppearance;

    /**
     * @var string Az adatszolgáltatás forrása.
     */
    public $source;

    /**
     * @var string A számla pénzneme.
     */
    public $currency;
}
