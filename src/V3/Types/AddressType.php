<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

/**
 * Cím típus, amely vagy egyszerű, vagy részletes címet tartalmaz.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
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
        $this->simpleAddress = ($address instanceof SimpleAddressType) ? $address : null;
        $this->detailedAddress = ($address instanceof DetailedAddressType) ? $address : null;

        parent::__construct();
    }
}
