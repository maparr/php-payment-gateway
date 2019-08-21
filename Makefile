up :
	docker-compose up -d
down :
	docker-compose down
test :
	docker exec -it mp-challenge-php-fpm /bin/bash -c "composer run test"
composer-install :
	docker exec -it mp-challenge-php-fpm /bin/bash -c "composer install"
run : up composer-install test down
