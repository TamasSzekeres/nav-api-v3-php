<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Cím típus, amely vagy egyszerű, vagy részletes címet tartalmaz.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class AddressType extends BaseType
{
    /**
     * @var ?SimpleAddressType Egyszerű cím.
     */
    #[SkipWhenEmpty]
    public ?SimpleAddressType $simpleAddress;

    /**
     * @var ?DetailedAddressType Részletes cím.
     */
    #[SkipWhenEmpty]
    public ?DetailedAddressType $detailedAddress;

    public function __construct(SimpleAddressType|DetailedAddressType $address)
    {
        if ($address instanceof SimpleAddressType) {
            $this->simpleAddress = $address;
            $this->detailedAddress = null;
        } else {
            $this->simpleAddress = null;
            $this->detailedAddress = $address;
        }

        parent::__construct();
    }
}
