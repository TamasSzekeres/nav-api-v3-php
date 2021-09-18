<?php

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Base\BaseObject;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\Types\Annotations\XMLElement;
use ReflectionClass;
use XMLReader;
use XMLWriter;

abstract class BaseType extends BaseObject
{
    public static function fromXML(XMLReader $reader): self
    {
        $object = new static();
        return $object->readXML($reader);
    }

    public function readXML(XMLReader $reader): self
    {
        /*$attributes = $this->attributes();
        $xmlElementName = static::xmlElementName();

        if (! ($reader->read() && $reader->name == $xmlElementName)) {
            throw new XMLReadingException("Root xml-element not found!");
        }

        while ($reader->read()) {
            if ($reader->name == $xmlElementName) {
                break;
            }

            if (static::hasElement($reader->name)) {

            }
        }*/

        return $this;
    }

    public function writeXML(XMLWriter $writer, ?string $elementName = null): self
    {
        if (empty($elementName)) {
            $elementName = static::xmlElementName();
        }

        $writer->startElement(static::xmlElementName());
        $this->writeXMLAttributes($writer);
        $writer->endElement();

        return $this;
    }

    protected function writeXMLAttributes(XMLWriter $writer): void
    {
        $attributes = $this->attributes();

        foreach ($attributes as $attribute) {
            $this->writeXmlAttribute($writer, $attribute, $this->$attribute);
        }
    }

    protected function writeXmlAttribute(XMLWriter $writer, string $name, $value): void
    {
        $xmlElement = $this->getXMLAnnotation($name);
        if ($xmlElement) {
            $name = $xmlElement->name;
        }

        if ($value instanceof BaseType) {
            $writer->startElement($name);
            $value->writeXMLAttributes($writer);
            $writer->endElement();
        } elseif (is_array($value)) {
            $writer->startElement($name);
            foreach ($value as $item) {
                $item->writeXML($writer);
            }
            $writer->endElement();
        } else {
            $writer->startElement($name);
            $writer->text($value);
            $writer->endElement();
        }
    }

    public function toXMLString(bool $ident = false): string
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->setIndent($ident);
        $this->writeXml($writer);
        return $writer->flush();
    }

    public static function xmlElementName(): string
    {
        $reflection = new ReflectionClass(static::class);
        return $reflection->getShortName();
    }

    protected function getXMLAnnotation(string $name): ?XMLElement
    {
        $reflection = new ReflectionClass($this);
        $property = $reflection->getProperty($name);
        $docComment = $property->getDocComment();
        return XMLElement::parseFromDocComment($docComment);
    }
}
