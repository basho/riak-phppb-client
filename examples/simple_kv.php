<?php

include 'vendor/autoload.php';

$node = (new \Basho\Riak\Node\Builder())
    ->atHost('riak-test')
    ->onPort(8087)
    ->build();

$riak = new \Basho\Riak([$node], [], new \Basho\Riak\Api\Pb());

$command = (new \Basho\Riak\Command\Builder\StoreObject($riak))
    ->buildJsonObject(['some_key' => 'some_data'])
    ->buildBucket('my_bucket')
    ->build();

$result = $command->execute();

var_dump($result);

$location = $result->getLocation();

$command = (new \Basho\Riak\Command\Builder\FetchObject($riak))
    ->atLocation($location)
    ->withDecodeAsAssociative()
    ->build();

$result = $command->execute();

var_dump($result, $result->getObject()->getData()['some_key']);
