<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
use JMS\Serializer\Annotation\SkipWhenEmpty;
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
         * @var ?DateIntervalParamType Számla kiállításának dátumtartománya.
         */
        #[SkipWhenEmpty]
        public ?DateIntervalParamType $invoiceIssueDate = null,

        /**
         * @var ?DateTimeIntervalParamType Számla adatszolgáltatás feldolgozásának időpont tartománya UTC idő szerint.
         */
        #[SkipWhenEmpty]
        public ?DateTimeIntervalParamType $insDate = null,

        /**
         * @var ?string Az eredeti számla sorszáma, melyre a módosítás vonatkozik
         */
        #[SimpleText50NotBlankTypeValidation]
        #[SkipWhenEmpty]
        #[XmlElement(cdata: false)]
        public ?string $originalInvoiceNumber = null,
    ) {
        $numNotNullProperties =
            (($this->invoiceIssueDate instanceof DateIntervalParamType) ? 1 : 0) +
            (($this->insDate instanceof DateTimeIntervalParamType) ? 1 : 0) +
            (is_string($this->originalInvoiceNumber) ? 1 : 0);

        if ($numNotNullProperties != 1) {
            throw new InvalidArgumentException('A "invoiceIssueDate", "insDate" és "originalInvoiceNumber" paraméterek közül pontosan egyet meg kell adni.');
        }

        parent::__construct();
    }
}
