<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText1024NotBlankTypeValidation;

/**
 * Feldolgozási kurzor adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class PointerType extends BaseType
{
    public function __construct(
        /**
         * @var ?string Tag hivatkozás.
         */
        #[SimpleText1024NotBlankTypeValidation]
        #[SkipWhenEmpty]
        public ?string $tag = null,
    ) {
        parent::__construct();
    }
}
