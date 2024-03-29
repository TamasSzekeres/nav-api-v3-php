<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;
use InvalidArgumentException;
use JMS\Serializer\Annotation\AnnotationUtilsTrait;
use LightSideSoftware\NavApi\V3\Types\Validation\ErrorBag;
use LightSideSoftware\NavApi\V3\Types\Validation\PropertyValidatorInterface;

use function get_defined_vars;
use function gettype;
use function is_integer;
use function is_null;

/**
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class IntegerValidation implements PropertyValidatorInterface
{
    use AnnotationUtilsTrait;

    public function __construct(
        public ?int $minExclusive = null,
        public ?int $maxExclusive = null,
        public ?int $minInclusive = null,
        public ?int $maxInclusive = null,
    ) {
        $this->loadAnnotationParameters(get_defined_vars());

        if (
            $this->minExclusive
            && $this->maxExclusive
            && ($this->minExclusive > $this->maxExclusive)
        ) {
            throw new InvalidArgumentException('"minExclusive" paraméter nem lehet nagyobb mint "maxExclusive" paraméter');
        }

        if (
            $this->minInclusive
            && $this->maxInclusive
            && ($this->minInclusive > $this->maxInclusive)
        ) {
            throw new InvalidArgumentException('"minInclusive" paraméter nem lehet nagyobb mint "maxInclusive" paraméter');
        }
    }

    public function validateProperty(string $name, mixed $value): ErrorBag
    {
        $errors = new ErrorBag();

        if (is_null($value)) {
            return $errors;
        }

        if (gettype($value) !== 'integer') {
            $errors->addError($name, "{$name} tulajdonságnak integer típusúnak kell lennie.");
            return $errors;
        }

        if (is_integer($this->minExclusive) && ($value <= $this->minExclusive)) {
            $errors->addError($name, "{$name} tulajdonságnak nagyobbnak kell lennie mint {$this->minExclusive}.");
        }

        if (is_integer($this->maxExclusive) && ($value >= $this->maxExclusive)) {
            $errors->addError($name, "{$name} tulajdonságnak kisebbnek kell lennie mint {$this->maxExclusive}.");
        }

        if (is_integer($this->minInclusive) && ($value < $this->minInclusive)) {
            $errors->addError($name, "{$name} tulajdonságnak nagyobbnak vagy egyenlőnek kell lennie mint {$this->minInclusive}.");
        }

        if (is_integer($this->maxInclusive) && ($value > $this->maxInclusive)) {
            $errors->addError($name, "{$name} tulajdonságnak kisebbnek vagy egyenlőnek kell lennie mint {$this->maxInclusive}.");
        }

        return $errors;
    }
}
