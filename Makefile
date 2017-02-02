.PHONY: all unit-test integration-test security-test
.PHONY: install-deps install-composer install-protobuf help
.PHONY: protogen release

export PB_INTERFACE = 1

PROTOC := ./vendor/bin/protoc-gen-php
PHP_VERSION := $(shell php -r 'echo "php-";echo phpversion();')

all: test

test: unit-test integration-test scenario-test

unit-test:
	./vendor/bin/phpunit --testsuite=unit-tests

integration-test:
	./vendor/bin/phpunit --testsuite=functional-tests

scenario-test:
	./vendor/bin/phpunit  --testsuite=scenario-tests

security-test:
	./vendor/bin/phpunit --testsuite=security-tests

install-deps: install-composer
	@./composer install

timeseries-test:
	./vendor/bin/phpunit vendor/basho/riak/tests/functional/TimeSeriesOperationsTest.php

install-composer: composer

install-protobuf: install-deps
	cd vendor/basho/protobuf && \
		phpize && \
		./configure && \
		$(MAKE) && \
		$(MAKE) install && \
		php -r "echo PHP_EOL;" && \
		php -r "echo 'IMPORTANT!';echo PHP_EOL;" && \
		php -r "echo 'Please enable protobuf.so in php.ini (location: \"' . php_ini_loaded_file() . '\")'; echo PHP_EOL;"

composer:
	@rm -f ./composer.phar ./composer
	@php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	@php ./composer-setup.php --filename=composer
	@rm -f ./composer-setup.php

protogen:
	mkdir -p src/Basho
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_dt.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_kv.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_search.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_ts.proto
	$(PROTOC) --package='Basho\Riak\Api\Pb\Message' --use-namespaces --psr --destination='src/' riak_pb/src/riak_yokozuna.proto
	cp -Rfv src/Basho/Riak/Api/Pb/Message/* src/Riak/Api/Pb/Message/
	rm -rf src/Basho
	rm -f pb_proto_riak.php

release:
ifeq ($(VERSION),)
	$(error VERSION must be set to deploy this code)
endif
ifeq ($(RELEASE_GPG_KEYNAME),)
	$(error RELEASE_GPG_KEYNAME must be set to deploy this code)
endif
	@./tools/build/publish $(VERSION) master validate
	@git tag --sign -a "$(VERSION)" -m "riak-phppb-client $(VERSION)" --local-user "$(RELEASE_GPG_KEYNAME)"
	@git push --tags
	@./tools/build/publish $(VERSION) master 'Riak PHP PB Client' 'riak-phppb-client'

help:
	@echo ''
	@echo ' Targets:'
	@echo '-----------------------------------------------------------------'
	@echo ' all                          - Run all tests                    '
	@echo ' install-deps                 - Install required dependencies    '
	@echo ' install-composer             - Installs composer                '
	@echo ' install-protobuf             - Installs protobuf dependency     '
	@echo ' test                         - Run unit & integration tests     '
	@echo ' unit-test                    - Run unit tests                   '
	@echo ' integration-test             - Run integration tests            '
	@echo ' security-test                - Run security tests               '
	@echo '-----------------------------------------------------------------'
	@echo ''
