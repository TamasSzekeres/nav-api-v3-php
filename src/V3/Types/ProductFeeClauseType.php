<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * A környezetvédelmi termékdíjról szóló 2011. évi LXXXV. tv. szerinti, tételre vonatkozó záradékok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class ProductFeeClauseType extends BaseType
{
    public function __construct(
        /**
         * @var ProductFeeTakeoverDataType A környezetvédelmi termékdíj kötelezettség átvállalásával kapcsolatos adatok.
         */
        public ProductFeeTakeoverDataType $productFeeTakeoverData,

        /**
         * @var CustomerDeclarationType Ha az eladó a vevő nyilatkozata alapján mentesül a termékdíj megfizetése alól,
         * akkor az érintett termékáram.
         */
        public CustomerDeclarationType $customerDeclaration,
    ) {
        parent::__construct();
    }
}
