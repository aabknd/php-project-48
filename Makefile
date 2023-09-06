install:
	composer install

validate:
	composer validate

gendiff:
	./bin/gendiff

lint:
	composer exec --verbose phpcs -- --standard=PSR12 bin src files
	composer exec --verbose phpstan analyze bin src files

tests:
	composer --verbose exec phpunit tests
	
test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml