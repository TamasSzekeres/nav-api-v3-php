<?php

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Base\BaseObject;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
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

    public function writeXML(XMLWriter $writer): self
    {
        /*$attributes = $this->attributes();

        $writer->startElement(static::xmlElementName());

        foreach ($attributes as $attribute) {
            if ($this->$attribute instanceof BaseType) {
                $this->$attribute->writeXML($writer);
            } else {
                $writer->startElement($attribute);
                $writer->text($this->$attribute);
                $writer->endElement();
            }
        }

        $writer->endElement();*/

        return $this;
    }

    public function toXMLString(bool $ident = false): string
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->setIndent($ident);
        $this->writeXml($writer);
        return $writer->flush();
    }
}
