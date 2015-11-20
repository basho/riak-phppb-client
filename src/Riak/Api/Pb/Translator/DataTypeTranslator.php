<?php

namespace Basho\Riak\Api\Pb\Translator;

use Basho\Riak\Api\Pb;
use Basho\Riak\Api\Pb\Message\MapField;
use Basho\Riak\Command;
use Basho\Riak\DataType;

class DataTypeTranslator
{
    /**
     * @param $increment
     * @param bool|false $returnAsDt
     * @return Pb\Message\CounterOp|Pb\Message\DtOp
     */
    public static function buildCounterOp($increment, $returnAsDt = false)
    {
        $cop = new Pb\Message\CounterOp();
        $cop->setIncrement($increment);

        if ($returnAsDt) {
            $op = new Pb\Message\DtOp();
            $op->setCounterOp($cop);

            return $op;
        }

        return $cop;
    }

    /**
     * @param array $adds
     * @param array $removes
     * @param bool|false $returnAsDt
     * @return Pb\Message\DtOp|Pb\Message\SetOp
     */
    public static function buildSetOp(array $adds = [], array $removes = [], $returnAsDt = false)
    {
        $sop = new Pb\Message\SetOp();

        foreach ($adds as $add) {
            $sop->appendAdds($add);
        }

        foreach ($removes as $remove) {
            $sop->appendRemoves($remove);
        }

        if ($returnAsDt) {
            $op = new Pb\Message\DtOp();
            $op->setSetOp($sop);

            return $op;
        }

        return $sop;
    }

    /**
     * @param array $updates
     * @param array $removes
     * @param bool|false $returnAsDt
     * @return Pb\Message\DtOp|Pb\Message\MapOp
     */
    public static function buildMapOp(array $updates = [], array $removes = [], $returnAsDt = false)
    {
        $mop = new Pb\Message\MapOp();

        foreach ($updates as $key => $update) {
            $mop->appendUpdates(static::commandToMapUpdate($key, $update));
        }

        foreach ($removes as $remove) {
            $mop->appendRemoves(static::compKeyToMapField($remove));
        }

        if ($returnAsDt) {
            $op = new Pb\Message\DtOp();
            $op->setMapOp($mop);

            return $op;
        }

        return $mop;
    }

    public static function entriesToObject(array $entries)
    {

    }

    public static function commandToMapUpdate($key, $update)
    {
        $mapUpdate = new Pb\Message\MapUpdate();

        $comp = static::compKeyToAssocArray($key);

        if ($comp['type'] == DataType\Counter::TYPE) {
            $mapUpdate->setCounterOp(static::buildCounterOp($update));
        } elseif ($comp['type'] == DataType\Set::TYPE) {
            $adds = !empty($update['add_all']) ? $update['add_all'] : [];
            $removes = !empty($update['remove_all']) ? $update['remove_all'] : [];
            $mapUpdate->setSetOp(static::buildSetOp($adds, $removes));
        } elseif ($comp['type'] == DataType\Map::TYPE) {
            $updates = !empty($update['update']) ? $update['update'] : [];
            $removes = !empty($update['remove']) ? $update['remove'] : [];
            $mapUpdate->setMapOp(static::buildMapOp($updates, $removes));
        } elseif ($comp['type'] == DataType\Map::REGISTER) {
            $mapUpdate->setRegisterOp($update);
        } elseif ($comp['type'] == DataType\Map::FLAG) {
            $mapUpdate->setFlagOp($update);
        } else {
            throw new \InvalidArgumentException('Unknown map field type: ' . $key);
        }

        return $mapUpdate;
    }

    public static function compKeyToMapField($key)
    {
        $mapField = new Pb\Message\MapField();

        $comp = static::compKeyToAssocArray($key);
        $mapField->setName($comp['key']);

        switch ($comp['type']) {
            case DataType\Counter::TYPE:
                $mapField->setType(MapField\MapFieldType::COUNTER);
                break;
            case DataType\Set::TYPE:
                $mapField->setType(MapField\MapFieldType::SET);
                break;
            case DataType\Map::TYPE:
                $mapField->setType(MapField\MapFieldType::MAP);
                break;
            case 'flag':
                $mapField->setType(MapField\MapFieldType::FLAG);
                break;
            case 'register':
                $mapField->setType(MapField\MapFieldType::REGISTER);
                break;
            default:
                throw new \InvalidArgumentException('Invalid map composite key.');
        }

        return $mapField;
    }

    public static function mapFieldToCompKey(MapField $mapField)
    {
        $key = $mapField->getName() . '_';
        switch ($mapField->getType()) {
            case MapField\MapFieldType::COUNTER:
                $key .= DataType\Counter::TYPE;
                break;
            case MapField\MapFieldType::SET:
                $key .= DataType\Set::TYPE;
                break;
            case MapField\MapFieldType::MAP:
                $key .= DataType\Map::TYPE;
                break;
            case MapField\MapFieldType::REGISTER:
                $key .= DataType\Map::REGISTER;
                break;
            case MapField\MapFieldType::FLAG:
                $key .= DataType\Map::FLAG;
                break;
            default:
                throw new \InvalidArgumentException('Unknown map field type: ' . $key . $mapField->getType());
        }

        return $key;
    }

    public static function compKeyToAssocArray($key)
    {
        $pos = strrpos($key, "_");
        return ["key" => substr($key, 0, $pos), "type" => substr($key, $pos + 1)];
    }
}
