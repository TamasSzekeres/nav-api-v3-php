<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\TakeoverType;

/**
 * A környezetvédelmi termékdíj kötelezettség átvállalásával kapcsolatos adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class ProductFeeTakeoverDataType extends BaseType
{
    public function __construct(
        /**
         * @var TakeoverType Az átvállalás iránya és jogszabályi alapja.
         */
        public TakeoverType $takeoverReason,

        /**
         * @var ?float Az átvállalt termékdíj összege forintban, ha a vevő vállalja át az eladó termékdíj-kötelezettségét.
         */
        #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
        #[SkipWhenEmpty]
        public ?float $takeoverAmount = null,
    ) {
        parent::__construct();
    }
}
