<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use DateTimeImmutable;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * A kérés tranzakcionális adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class BasicHeaderType extends BaseType
{
    /**
     * @var string A kérés/válasz azonosítója, minden üzenetváltásnál - adószámonként - egyedi.
     */
    #[StringValidation(minLength: 1, maxLength: 30, pattern: "[+a-zA-Z0-9_]{1,30}")]
    #[XmlElement(cdata: false, namespace: "http://schemas.nav.gov.hu/NTCA/1.0/common")]
    public string $requestId;

    /**
     * @var DateTimeImmutable A kérés/válasz keletkezésének UTC ideje.
     */
    #[Type("DateTimeImmutable<'Y-m-d\TH:i:s.v\Z'>")]
    #[XmlElement(cdata: false, namespace: "http://schemas.nav.gov.hu/NTCA/1.0/common")]
    public DateTimeImmutable $timestamp;

    /**
     * @var string A kérés/válasz verziószáma, hogy a hívó melyik interfész verzió szerint küld adatot és várja a választ.
     */
    #[StringValidation(minLength: 1, maxLength: 15)]
    #[XmlElement(cdata: false, namespace: "http://schemas.nav.gov.hu/NTCA/1.0/common")]
    public string $requestVersion;

    /**
     * @var string|null A header verziószáma.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 0, maxLength: 15)]
    #[XmlElement(cdata: false, namespace: "http://schemas.nav.gov.hu/NTCA/1.0/common")]
    public ?string $headerVersion;
}
