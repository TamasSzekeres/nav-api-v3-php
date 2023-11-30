<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\Type;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class ContextType extends BaseType
{
    public function __construct(
        /**
         * @var string A kérés egyedi azonosítója.
         */
        public string $requestId,

        /**
         * @var DateTimeImmutable A kérés kliensoldali időpontja UTC-ben.
         */
        #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.vP'>")]
        public DateTimeImmutable $timestamp,
    ) {
        parent::__construct();
    }
}
