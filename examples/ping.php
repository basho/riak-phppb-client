<?php

include 'vendor/autoload.php';


$node = (new \Basho\Riak\Node\Builder())
    ->atHost('riak-test')
    ->onPort(8087)
    ->build();

$riak = new \Basho\Riak([$node], [], new \Basho\Riak\Api\Pb());

$command = (new \Basho\Riak\Command\Builder\Ping($riak))
    ->build();

$result = $command->execute();
var_dump($result);
