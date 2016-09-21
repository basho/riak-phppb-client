.PHONY: protogen

PROTOC = ./vendor/bin/protoc

protogen:
	mkdir -p src/Basho
	mv -f src/Riak src/Basho/Riak
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_dt.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_kv.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_search.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_ts.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_yokozuna.proto
	mv -f src/Basho/Riak src/Riak
	rm -rf src/Basho
	rm -f pb_proto_riak.php
