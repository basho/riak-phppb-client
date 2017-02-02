<?php

namespace Basho\Tests\Riak\Api\Pb\Translator;

use Basho\Riak\Api\Pb\Message\CounterOp;
use Basho\Riak\Api\Pb\Message\MapOp;
use Basho\Riak\Api\Pb\Message\MapUpdate_FlagOp;
use Basho\Riak\Api\Pb\Message\SetOp;
use Basho\Riak\Api\Pb\Translator\DataType;
use Basho\Tests\TestCase;

class DataTypeTest extends TestCase
{
    const COUNTER_INCREMENT = 1;
    protected static $setAdds = ['Eichel', 'Ennis', 'Bogosian'];
    protected static $setRemoves = ['Meyers', 'Miller', 'Zadarov'];
    protected static $mapUpdates = [
        'roster_set' => ['add_all' => ['Eichel', 'Ennis', 'Bogosian'], 'remove_all' => ['Meyers', 'Miller', 'Zadarov']],
        'clinch_playoffs_flag' => false,
        'win_counter' => 1,
        'name_register' => 'Buffalo Sabres',
        'farm_team_map' => ['update' => ['name_register' => 'Rochester Americans', 'prospects_set' => ['add_all' => ['Rodrigues']]]],
    ];
    protected static $mapRemoves = ['tank_mode_flag'];

    public function testCompKeyToAssoc()
    {
        $comp = DataType::compKeyToAssocArray('roster_register');
        $this->assertEquals(['key' => 'roster', 'type' => 'register'], $comp);

        $comp = DataType::compKeyToAssocArray('roster_flag');
        $this->assertEquals(['key' => 'roster', 'type' => 'flag'], $comp);

        $comp = DataType::compKeyToAssocArray('roster_counter');
        $this->assertEquals(['key' => 'roster', 'type' => 'counter'], $comp);

        $comp = DataType::compKeyToAssocArray('roster_set');
        $this->assertEquals(['key' => 'roster', 'type' => 'set'], $comp);

        $comp = DataType::compKeyToAssocArray('roster_map');
        $this->assertEquals(['key' => 'roster', 'type' => 'map'], $comp);

        $comp = DataType::compKeyToAssocArray('multiple_underscores_map');
        $this->assertEquals(['key' => 'multiple_underscores', 'type' => 'map'], $comp);
    }

    public function testBuildCounterOp()
    {
        $op = DataType::buildCounterOp(static::COUNTER_INCREMENT, false);

        $this->counterOpAssertions($op);

        $op = DataType::buildCounterOp(static::COUNTER_INCREMENT, true);

        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\DtOp', $op);
        $this->counterOpAssertions($op->getCounterOp());
    }

    public function testBuildSetOp()
    {
        $op = DataType::buildSetOp(static::$setAdds, static::$setRemoves, false);

        $this->setOpAssertions($op);

        $op = DataType::buildSetOp(static::$setAdds, static::$setRemoves, true);

        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\DtOp', $op);
        $this->setOpAssertions($op->getSetOp());
    }

    public function testBuildHllOp()
    {
        $op = DataType::buildHllOp(static::$setAdds, false);

        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\HllOp', $op);
        $this->assertEquals(3, count($op->getAdds()));

        $op = DataType::buildHllOp(static::$setAdds, true);

        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\DtOp', $op);
        $this->assertEquals(3, count($op->getHllOp()->getAdds()));
    }

    public function testBuildMapOp()
    {
        $op = DataType::buildMapOp(static::$mapUpdates, static::$mapRemoves, false);

        $this->mapOpAssertions($op);

        $op = DataType::buildMapOp(static::$mapUpdates, static::$mapRemoves, true);

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
        $this->assertEquals(3, count($op->getAdds()));
        $this->assertEquals(3, count($op->getRemoves()));
        $this->assertEquals(static::$setAdds[0], $op->getAdds()[0]);
        $this->assertEquals(static::$setRemoves[0], $op->getRemoves()[0]);
    }

    public function mapOpAssertions(MapOp $op)
    {
        $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\MapOp', $op);
        $this->assertEquals(5, count($op->getUpdates()));
        $this->assertEquals(1, count($op->getRemoves()));

        foreach ($op->getUpdates() as $update) {
            switch (DataType::mapFieldToCompKey($update->getField())) {
                case 'roster_set':
                    $this->setOpAssertions($update->getSetOp());
                    break;
                case 'clinch_playoffs_flag':
                    $this->assertEquals(MapUpdate_FlagOp::DISABLE, $update->getFlagOp());
                    break;
                case 'win_counter':
                    $this->counterOpAssertions($update->getCounterOp());
                    break;
                case 'name_register':
                    $this->assertEquals('Buffalo Sabres', $update->getRegisterOp());
                    break;
                case 'farm_team_map':
                    $this->assertInstanceOf('Basho\Riak\Api\Pb\Message\MapOp', $update->getMapOp());
                    $this->assertEquals(2, count($update->getMapOp()->getUpdates()));
                    $this->assertEquals(0, count($update->getMapOp()->getRemoves()));
                    break;
                default:
                    $this->assertTrue(false);
            }
        }

        foreach ($op->getRemoves() as $remove) {
            $this->assertContains(DataType::mapFieldToCompKey($remove), static::$mapRemoves);
        }
    }
}
