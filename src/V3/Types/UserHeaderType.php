<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * A kérés authentikációs adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class UserHeaderType extends BaseType
{
    /**
     * @var string A technikai felhasználó login neve.
     * @StringValidation(minLength=6, maxLength=15, pattern="[a-zA-Z0-9]{6,15}")
     * @XMLElement(name="common:login")
     */
    public $login;

    /**
     * @var string A kérés aláírásának hash értéke.
     * @StringValidation(minLength=1, maxLength=512, pattern=".*[^\s].*")
     * @XMLElement(name="common:passwordHash")
     * @XMLAttribute(name="cryptoType", value="SHA-512")
     */
    public $passwordHash;

    /**
     * @var string A rendszerben regisztrált adózó adószáma, aki nevében a technikai felhasználó tevékenykedik.
     * @StringValidation(minLength=8, maxLength=8, pattern="[0-9]{8}")
     * @XMLElement(name="common:taxNumber")
     */
    public $taxNumber;

    /**
     * @var string A kérés aláírásának hash értéke.
     * @StringValidation(minLength=1, maxLength=512, pattern=".*[^\s].*")
     * @XMLElement(name="common:requestSignature")
     * @XMLAttribute(name="cryptoType", value="SHA3-512")
     */
    public $requestSignature;
}
