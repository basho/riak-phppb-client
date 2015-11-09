<?php

namespace Basho\Riak\Api\Pb\Translator;

use Basho\Riak\Api\Pb\Message\MapField;
use Basho\Riak\Command;
use Basho\Riak\DataType\Counter;
use Basho\Riak\DataType\Map;
use Basho\Riak\DataType\Set;

class MapTranslator
{
    public static function entriesToObject(array $entries)
    {

    }

    public static function commandUpdateToOp($key, $update)
    {

    }

    public static function commandRemoveToOp($remove)
    {

    }

    public static function compKeyToMapField($key)
    {
        $mapField = new MapField();

        // [0] => key, [1] => type
        $parts = explode('_', $key);

        $mapField->setName($parts[0]);

        switch ($parts[1]) {
            case Counter::TYPE:
                $mapField->setType(MapField\MapFieldType::COUNTER);
                break;
            case Set::TYPE:
                $mapField->setType(MapField\MapFieldType::SET);
                break;
            case Map::TYPE:
                $mapField->setType(MapField\MapFieldType::MAP);
                break;
            case 'flag':
                $mapField->setType(MapField\MapFieldType::FLAG);
                break;
            case 'register':
                $mapField->setType(MapField\MapFieldType::REGISTER);
                break;
            default:
                throw new \InvalidArgumentException('Unknown map field type.');
        }

        return $mapField;
    }

    public static function mapFieldToCompKey(MapField $mapField)
    {
        $key = $mapField->getName() . '_';
        switch ($mapField->getType()) {
            case MapField\MapFieldType::COUNTER:
                $key .= Counter::TYPE;
                break;
            case MapField\MapFieldType::SET:
                $key .= Set::TYPE;
                break;
            case MapField\MapFieldType::MAP:
                $key .= Map::TYPE;
                break;
            case MapField\MapFieldType::REGISTER:
                $key .= 'register';
                break;
            case MapField\MapFieldType::FLAG:
                $key .= 'flag';
                break;
            default:
                throw new \InvalidArgumentException('Invalid map composite key.');
        }

        return $key;
    }
}
