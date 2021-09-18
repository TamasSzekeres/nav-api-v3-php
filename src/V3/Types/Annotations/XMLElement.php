<?php

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

/**
 * Class XMLElement
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class XMLElement
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @var string
     */
    public $name;

    public static function parseFromDocComment(string $docComment): ?XMLElement
    {
        $regex = '/@XMLElement\(name="(?<name>(.*))"\)/';
        if (preg_match($regex, $docComment, $matches)) {
            $name = $matches['name'] ?? null;
            return empty($name) ? null : new static($name);
        }

        return null;
    }
}
