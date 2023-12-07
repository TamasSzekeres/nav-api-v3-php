<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Számlaszámra történő lekérdezés eredménye.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceDataResultType extends BaseType
{
    public function __construct(
        /**
         * @var string Számla adatok BASE64-ben kódolt tartalma.
         */
        public string $invoiceData,

        /**
         * @var AuditDataType A számla audit adatai.
         */
        public AuditDataType $auditData,

        /**
         * @var bool Jelöli, ha az invoice tartalmát a BASE64 dekódolást követően még ki kell tömöríteni az olvasáshoz.
         */
        public bool $compressedContentIndicator,

        /**
         * @var ?CryptoType Elektronikus számla vagy módosító okirat állomány hash lenyomata.
         */
        #[SkipWhenEmpty]
        public ?CryptoType $electronicInvoiceHash = null,
    ) {
        parent::__construct();
    }
}
