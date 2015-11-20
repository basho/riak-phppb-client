<?php

namespace Basho\Tests\Riak\Api\Pb\Translator;

use Basho\Riak\Api\Pb\Message\CounterOp;
use Basho\Riak\Api\Pb\Message\MapOp;
use Basho\Riak\Api\Pb\Message\SetOp;
use Basho\Riak\Api\Pb\Translator\DataTypeTranslator;
use Basho\Tests\TestCase;

class DataTypeTranslatorTest extends TestCase
{
    const COUNTER_INCREMENT = 1;
    const SET_ADDS = ['Eichel', 'Ennis', 'Bogosian'];
    const SET_REMOVES = ['Meyers', 'Miller', 'Zadarov'];
    const MAP_UPDATES = [
        'roster_set' => ['add_all' => self::SET_ADDS, 'remove_all' => self::SET_REMOVES],
        'clinch_playoffs_flag' => false,
        'win_counter' => 1,
        'name_register' => 'Buffalo Sabres',
        'farm_team_map' => ['update' => ['name_register' => 'Rochester Americans', 'prospects_set' => ['add_all' => ['Rodrigues']]]],
    ];
    const MAP_REMOVES = ['tank_mode_flag'];

    public function testCompKeyToAssoc()
    {
        $comp = DataTypeTranslator::compKeyToAssocArray('roster_register');
        $this->assertEquals(['key' => 'roster', 'type' => 'register'], $comp);

        $comp = DataTypeTranslator::compKeyToAssocArray('roster_flag');
        $this->assertEquals(['key' => 'roster', 'type' => 'flag'], $comp);

        $comp = DataTypeTranslator::compKeyToAssocArray('roster_counter');
        $this->assertEquals(['key' => 'roster', 'type' => 'counter'], $comp);

        $comp = DataTypeTranslator::compKeyToAssocArray('roster_set');
        $this->assertEquals(['key' => 'roster', 'type' => 'set'], $comp);

        $comp = DataTypeTranslator::compKeyToAssocArray('roster_map');
        $this->assertEquals(['key' => 'roster', 'type' => 'map'], $comp);

        $comp = DataTypeTranslator::compKeyToAssocArray('multiple_underscores_map');
        $this->assertEquals(['key' => 'multiple_underscores', 'type' => 'map'], $comp);
    }

    public function testBuildCounterOp()
    {
        $op = DataTypeTranslator::buildCounterOp(static::COUNTER_INCREMENT, false);

        $this->counterOpAssertions($op);

        $op = DataTypeTranslator::buildCounterOp(static::COUNTER_INCREMENT, true);

        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\DtOp', $op);
        $this->counterOpAssertions($op->getCounterOp());
    }

    public function testBuildSetOp()
    {
        $op = DataTypeTranslator::buildSetOp(static::SET_ADDS, static::SET_REMOVES, false);

        $this->setOpAssertions($op);

        $op = DataTypeTranslator::buildSetOp(static::SET_ADDS, static::SET_REMOVES, true);

        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\DtOp', $op);
        $this->setOpAssertions($op->getSetOp());
    }

    public function testBuildMapOp()
    {
        $op = DataTypeTranslator::buildMapOp(static::MAP_UPDATES, static::MAP_REMOVES, false);

        $this->mapOpAssertions($op);

        $op = DataTypeTranslator::buildMapOp(static::MAP_UPDATES, static::MAP_REMOVES, true);

        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\DtOp', $op);
        $this->mapOpAssertions($op->getMapOp());
    }

    public function counterOpAssertions(CounterOp $op)
    {
        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\CounterOp', $op);
        $this->assertEquals(static::COUNTER_INCREMENT, $op->getIncrement());
    }

    public function setOpAssertions(SetOp $op)
    {
        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\SetOp', $op);
        $this->assertEquals(3, $op->getAddsCount());
        $this->assertEquals(3, $op->getRemovesCount());
        $this->assertEquals(static::SET_ADDS, $op->getAdds());
        $this->assertEquals(static::SET_REMOVES, $op->getRemoves());
    }

    public function mapOpAssertions(MapOp $op)
    {
        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\MapOp', $op);
        $this->assertEquals(5, $op->getUpdatesCount());
        $this->assertEquals(1, $op->getRemovesCount());

        foreach ($op->getUpdates() as $update) {
            switch (DataTypeTranslator::mapFieldToCompKey($update->getField())) {
                case 'roster_set':
                    $this->setOpAssertions($update->getSetOp());
                    break;
                case 'clinch_playoffs_flag':
                    $this->assertEmpty($update->getFlagOp());
                    break;
                case 'win_counter':
                    $this->counterOpAssertions($update->getCounterOp());
                    break;
                case 'name_register':
                    $this->assertEquals('Buffalo Sabres', $update->getRegisterOp());
                    break;
                case 'farm_team_map':
                    $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\MapOp', $update->getMapOp());
                    $this->assertEquals(2, $update->getMapOp()->getUpdatesCount());
                    $this->assertEquals(0, $update->getMapOp()->getRemovesCount());
                    break;
                default:
                    $this->assertTrue(false);
            }
        }

        foreach ($op->getRemoves() as $remove) {
            $this->assertContains(DataTypeTranslator::mapFieldToCompKey($remove), static::MAP_REMOVES);
        }
    }
}
