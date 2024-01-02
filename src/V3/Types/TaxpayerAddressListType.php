<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlList;
use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;

/**
 * Adózói cím lista típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class TaxpayerAddressListType extends BaseType
{
    public function __construct(
        /**
         * @var array<int, TaxpayerAddressItemType> Adózói címsor adat.
         */
        #[ArrayValidation(itemType: TaxpayerAddressItemType::class)]
        #[Type('array<LightSideSoftware\NavApi\V3\Types\TaxpayerAddressItemType>')]
        #[XmlList(entry: 'taxpayerAddressItem', inline: true, namespace: 'http://schemas.nav.gov.hu/OSA/3.0/api')]
        public array $taxpayerAddressItems = [],
    ) {
        parent::__construct();
    }
}
