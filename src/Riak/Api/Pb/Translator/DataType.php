<?php

namespace Basho\Riak\Api\Pb\Translator;

use Basho\Riak;
use Basho\Riak\Api\Exception;
use Basho\Riak\Api\Pb;
use Basho\Riak\Api\Pb\Message\MapField;
use Basho\Riak\Api\Pb\Message\MapEntry;
use Basho\Riak\Api\Pb\Message\MapUpdate;
use Basho\Riak\Command;

class DataType
{
    /**
     * Builds the Protobuff proto Op object for Counters
     *
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
     * Builds the Protobuff proto Op object for Sets
     *
     * @param array $adds
     * @param array $removes
     * @param bool|false $returnAsDt
     * @return Pb\Message\DtOp|Pb\Message\SetOp
     */
    public static function buildSetOp(array $adds, array $removes, $returnAsDt = false)
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
     * Builds the Protobuff proto Op object for Maps
     *
     * @param array $updates
     * @param array $removes
     * @param bool|false $returnAsDt
     * @return Pb\Message\DtOp|Pb\Message\MapOp
     */
    public static function buildMapOp(array $updates, array $removes, $returnAsDt = false)
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

    /**
     * @param MapEntry[] $entries
     * @return array
     * @throws Exception
     */
    public static function mapEntriesToArray($entries)
    {
        $map = [];
        foreach ($entries as $entry) {
            $key = static::mapFieldToCompKey($entry->getField());
            switch ($entry->getField()->getType()) {
                case MapField\MapFieldType::REGISTER:
                    $map[$key] = $entry->getRegisterValue();
                    break;
                case MapField\MapFieldType::FLAG:
                    $map[$key] = $entry->getFlagValue();
                    break;
                case MapField\MapFieldType::COUNTER:
                    $map[$key] = $entry->getCounterValue();
                    break;
                case MapField\MapFieldType::SET:
                    $map[$key] = $entry->getSetValue();
                    break;
                case MapField\MapFieldType::MAP:
                    $map[$key] = static::mapEntriesToArray($entry->getMapValue());
                    break;
                default:
                    throw new Exception('Invalid MapFieldType');
            }
        }

        return $map;
    }

    /**
     * Convert command data to Protobuff proto MapUpdate object
     *
     * @param $key
     * @param $update
     * @return Pb\Message\MapUpdate
     */
    public static function commandToMapUpdate($key, $update)
    {
        $mapUpdate = new Pb\Message\MapUpdate();

        $field = static::compKeyToMapField($key);
        $mapUpdate->setField($field);

        switch ($field->getType()) {
            case MapField\MapFieldType::COUNTER:
                $mapUpdate->setCounterOp(static::buildCounterOp($update));
                break;
            case MapField\MapFieldType::SET:
                $adds = !empty($update['add_all']) ? $update['add_all'] : [];
                $removes = !empty($update['remove_all']) ? $update['remove_all'] : [];
                $mapUpdate->setSetOp(static::buildSetOp($adds, $removes));
                break;
            case MapField\MapFieldType::MAP:
                $updates = !empty($update['update']) ? $update['update'] : [];
                $removes = !empty($update['remove']) ? $update['remove'] : [];
                $mapUpdate->setMapOp(static::buildMapOp($updates, $removes));
                break;
            case MapField\MapFieldType::FLAG:
                $mapUpdate->setFlagOp($update == 'enable' ? MapUpdate\FlagOp::ENABLE : MapUpdate\FlagOp::DISABLE);
                break;
            case MapField\MapFieldType::REGISTER:
                $mapUpdate->setRegisterOp($update);
                break;
        }

        return $mapUpdate;
    }

    /**
     * Convert composite map field key to Protobuff proto MapField object
     *
     * @param $key
     * @return MapField
     */
    public static function compKeyToMapField($key)
    {
        $mapField = new Pb\Message\MapField();

        $comp = static::compKeyToAssocArray($key);
        $mapField->setName($comp['key']);

        switch ($comp['type']) {
            case Riak\DataType\Counter::TYPE:
                $mapField->setType(MapField\MapFieldType::COUNTER);
                break;
            case Riak\DataType\Set::TYPE:
                $mapField->setType(MapField\MapFieldType::SET);
                break;
            case Riak\DataType\Map::TYPE:
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

    /**
     * Convert Protobuff proto MapField object to composite key
     *
     * @param MapField $mapField
     * @return string
     */
    public static function mapFieldToCompKey(MapField $mapField)
    {
        $key = $mapField->getName() . '_';
        switch ($mapField->getType()) {
            case MapField\MapFieldType::COUNTER:
                $key .= Riak\DataType\Counter::TYPE;
                break;
            case MapField\MapFieldType::SET:
                $key .= Riak\DataType\Set::TYPE;
                break;
            case MapField\MapFieldType::MAP:
                $key .= Riak\DataType\Map::TYPE;
                break;
            case MapField\MapFieldType::REGISTER:
                $key .= Riak\DataType\Map::REGISTER;
                break;
            case MapField\MapFieldType::FLAG:
                $key .= Riak\DataType\Map::FLAG;
                break;
            default:
                throw new \InvalidArgumentException('Unknown map field type: ' . $key . $mapField->getType());
        }

        return $key;
    }

    /**
     * Convert composite key to an associative array ['key' => string, 'type' => string]
     *
     * @param $key
     * @return array
     */
    public static function compKeyToAssocArray($key)
    {
        $pos = strrpos($key, "_");
        return ["key" => substr($key, 0, $pos), "type" => substr($key, $pos + 1)];
    }
}
