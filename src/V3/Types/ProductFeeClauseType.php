<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * A környezetvédelmi termékdíjról szóló 2011. évi LXXXV. tv. szerinti, tételre vonatkozó záradékok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class ProductFeeClauseType extends BaseType
{
    /**
     * @var ?ProductFeeTakeoverDataType A környezetvédelmi termékdíj kötelezettség átvállalásával kapcsolatos adatok.
     */
    #[SkipWhenEmpty]
    public ?ProductFeeTakeoverDataType $productFeeTakeoverData;

    /**
     * @var ?CustomerDeclarationType Ha az eladó a vevő nyilatkozata alapján mentesül a termékdíj megfizetése alól,
     * akkor az érintett termékáram.
     */
    #[SkipWhenEmpty]
    public ?CustomerDeclarationType $customerDeclaration;

    public function __construct(
        ProductFeeTakeoverDataType|CustomerDeclarationType $productFee,
    ) {
        $this->productFeeTakeoverData = ($productFee instanceof ProductFeeTakeoverDataType) ? $productFee : null;
        $this->customerDeclaration = ($productFee instanceof CustomerDeclarationType) ? $productFee : null;

        parent::__construct();
    }
}
