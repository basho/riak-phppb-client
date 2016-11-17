.PHONY: all unit-test integration-test security-test
.PHONY: install-deps install-composer install-protobuf help
.PHONY: protogen

export PB_INTERFACE = 1

PROTOC := ./vendor/bin/protoc
PHP_VERSION := $(shell php -r 'echo "php-";echo phpversion();')

all: test

test: unit-test integration-test

unit-test:
	@php ./vendor/bin/phpunit --testsuite=unit-tests

integration-test:
	@php ./vendor/bin/phpunit --testsuite=functional-tests

security-test:
	@php ./vendor/bin/phpunit --testsuite=security-tests

install-deps: install-composer
	@./composer install

install-composer: composer

install-protobuf: install-deps
	cd vendor/allegro/protobuf && \
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
ifeq (,$(findstring php-5.6.,$(PHP_VERSION)))
	$(error protogen target should be run with PHP version 5.6.X instead of $(PHP_VERSION))
endif
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
