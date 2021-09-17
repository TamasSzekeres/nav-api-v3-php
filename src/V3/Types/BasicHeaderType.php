<?php

namespace LightSideSoftware\NavApi\V3\Types;

use DateTime;

/**
 * A kérés tranzakcionális adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class BasicHeaderType extends BaseType
{
    /**
     * @var string A kérés/válasz azonosítója, minden üzenetváltásnál - adószámonként - egyedi.
     * @StringValidation(minLength=1, maxLength=30, pattern="[+a-zA-Z0-9_]{1,30}")
     */
    public $requestId;

    /**
     * @var DateTime A kérés/válasz keletkezésének UTC ideje.
     * @XMLCodec(GenericTimestampCodec)
     */
    public $timestamp;

    /**
     * @var string A kérés/válasz verziószáma, hogy a hívó melyik interfész verzió szerint küld adatot és várja a választ.
     * @StringValidation(minLength=1, maxLength=15)
     */
    public $requestVersion;

    /**
     * @var string A header verziószáma.
     * @StringValidation(minLength=1, maxLength=15)
     * @XMLRequired(false)
     */
    public $headerVersion;
}
