<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Responses;

use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;

/**
 * Az összes REST operációra vonatkozó kivétel válasz generikus elementje.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[XmlNamespace(uri: 'http://schemas.nav.gov.hu/NTCA/1.0/common')]
#[XmlRoot('GeneralExceptionResponse')]
final readonly class GeneralExceptionResponse extends BasicResultType
{
}
