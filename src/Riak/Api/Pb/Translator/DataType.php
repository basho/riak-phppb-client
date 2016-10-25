<?php

namespace Basho\Riak\Api\Pb\Translator;

use Basho\Riak;
use Basho\Riak\Api\Exception;
use Basho\Riak\Api\Pb;
use Basho\Riak\Api\Pb\Message\MapField;
use Basho\Riak\Api\Pb\Message\MapEntry;
use Basho\Riak\Api\Pb\Message\MapUpdate;
use Basho\Riak\Api\Pb\Message\MapField_MapFieldType;
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
        $sop->setAdds($adds);
        $sop->setRemoves($removes);

        if ($returnAsDt) {
            $op = new Pb\Message\DtOp();
            $op->setSetOp($sop);

            return $op;
        }

        return $sop;
    }

    /**
     * Builds the Protobuff proto Op object for Hlls
     *
     * @param array $adds
     * @param bool|false $returnAsDt
     * @return Pb\Message\DtOp|Pb\Message\HllOp
     */
    public static function buildHllOp(array $adds, $returnAsDt = false)
    {
        $sop = new Pb\Message\HllOp();

        foreach ($adds as $add) {
            $sop->appendAdds($add);
        }

        if ($returnAsDt) {
            $op = new Pb\Message\DtOp();
            $op->setHllOp($sop);

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

        $map_updates = [];
        foreach ($updates as $key => $update) {
            $map_updates[] = static::commandToMapUpdate($key, $update);
        }
        $mop->setUpdates($map_updates);

        $map_removes = [];
        foreach ($removes as $remove) {
            $map_removes[] = static::compKeyToMapField($remove);
        }
        $mop->setRemoves($map_removes);

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
                case MapField_MapFieldType::REGISTER:
                    $map[$key] = $entry->getRegisterValue();
                    break;
                case MapField_MapFieldType::FLAG:
                    $map[$key] = $entry->getFlagValue();
                    break;
                case MapField_MapFieldType::COUNTER:
                    $map[$key] = $entry->getCounterValue();
                    break;
                case MapField_MapFieldType::SET:
                    $map[$key] = $entry->getSetValue();
                    break;
                case MapField_MapFieldType::MAP:
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
            case MapField_MapFieldType::COUNTER:
                $mapUpdate->setCounterOp(static::buildCounterOp($update));
                break;
            case MapField_MapFieldType::SET:
                $adds = !empty($update['add_all']) ? $update['add_all'] : [];
                $removes = !empty($update['remove_all']) ? $update['remove_all'] : [];
                $mapUpdate->setSetOp(static::buildSetOp($adds, $removes));
                break;
            case MapField_MapFieldType::MAP:
                $updates = !empty($update['update']) ? $update['update'] : [];
                $removes = !empty($update['remove']) ? $update['remove'] : [];
                $mapUpdate->setMapOp(static::buildMapOp($updates, $removes));
                break;
            case MapField_MapFieldType::FLAG:
                $mapUpdate->setFlagOp($update == 'enable' ? MapUpdate\FlagOp::ENABLE : MapUpdate\FlagOp::DISABLE);
                break;
            case MapField_MapFieldType::REGISTER:
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
                $mapField->setType(MapField_MapFieldType::COUNTER);
                break;
            case Riak\DataType\Set::TYPE:
                $mapField->setType(MapField_MapFieldType::SET);
                break;
            case Riak\DataType\Map::TYPE:
                $mapField->setType(MapField_MapFieldType::MAP);
                break;
            case 'flag':
                $mapField->setType(MapField_MapFieldType::FLAG);
                break;
            case 'register':
                $mapField->setType(MapField_MapFieldType::REGISTER);
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
            case MapField_MapFieldType::COUNTER:
                $key .= Riak\DataType\Counter::TYPE;
                break;
            case MapField_MapFieldType::SET:
                $key .= Riak\DataType\Set::TYPE;
                break;
            case MapField_MapFieldType::MAP:
                $key .= Riak\DataType\Map::TYPE;
                break;
            case MapField_MapFieldType::REGISTER:
                $key .= Riak\DataType\Map::REGISTER;
                break;
            case MapField_MapFieldType::FLAG:
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
