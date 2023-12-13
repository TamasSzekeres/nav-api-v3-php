<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * A környezetvédelmi termékdíjról szóló 2011. évi LXXXV. tv. szerinti, tételre vonatkozó záradékok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class ProductFeeClauseType extends BaseType
{
    public function __construct(
        /**
         * @var ?ProductFeeTakeoverDataType A környezetvédelmi termékdíj kötelezettség átvállalásával kapcsolatos adatok.
         */
        #[SkipWhenEmpty]
        public ?ProductFeeTakeoverDataType $productFeeTakeoverData = null,

        /**
         * @var ?CustomerDeclarationType Ha az eladó a vevő nyilatkozata alapján mentesül a termékdíj megfizetése alól,
         * akkor az érintett termékáram.
         */
        #[SkipWhenEmpty]
        public ?CustomerDeclarationType $customerDeclaration = null,
    ) {
        if (
            (
                is_null($this->productFeeTakeoverData)
                && is_null($this->customerDeclaration)
            ) || (
                ($this->productFeeTakeoverData instanceof ProductFeeTakeoverDataType)
                && ($this->customerDeclaration instanceof CustomerDeclarationType)
            )
        ) {
            throw new InvalidArgumentException('A "productFeeTakeoverData" és "customerDeclaration" paraméterek közül pontosan egyet kell megadni.');
        }

        parent::__construct();
    }
}
