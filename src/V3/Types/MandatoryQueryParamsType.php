<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * A számla lekérdezés kötelező paraméterei.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class MandatoryQueryParamsType extends BaseType
{
    public function __construct(
        /**
         * @var DateIntervalParamType Számla kiállításának dátumtartománya.
         */
        public DateIntervalParamType $invoiceIssueDate,

        /**
         * @var DateTimeIntervalParamType Számla adatszolgáltatás feldolgozásának időpont tartománya UTC idő szerint.
         */
        public DateTimeIntervalParamType $insDate,

        /**
         * @var string Az eredeti számla sorszáma, melyre a módosítás vonatkozik
         */
        #[SimpleText50NotBlankTypeValidation]
        #[XmlElement(cdata: false)]
        public string $originalInvoiceNumber,
    ) {
        parent::__construct();
    }
}
