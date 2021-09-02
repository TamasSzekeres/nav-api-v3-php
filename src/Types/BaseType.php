<?php

namespace LightSideSoftware\NavApi\Types;

use LightSideSoftware\NavApi\Base\BaseObject;
use XMLWriter;

abstract class BaseType extends BaseObject
{
    abstract function xmlElementName(): string;

    public function writeXml(XMLWriter $writer): void
    {
        $asArray = $this->toArray();

        $writer->startElement($this->xmlElementName());

        foreach ($asArray as $proprerty => $value) {
            $writer->startElement($proprerty);
            $writer->text($value);
            $writer->endElement();
        }

        $writer->endElement();
    }
}
