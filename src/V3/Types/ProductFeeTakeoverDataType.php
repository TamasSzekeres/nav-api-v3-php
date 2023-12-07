<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\TakeoverType;

/**
 * A környezetvédelmi termékdíj kötelezettség átvállalásával kapcsolatos adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
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
        #[MonetaryTypeValidation]
        #[SkipWhenEmpty]
        public ?float $takeoverAmount = null,
    ) {
        parent::__construct();
    }
}
