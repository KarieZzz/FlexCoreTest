# FlexCoreTest
-Для начала нужно установить Docker, инструкция здесь https://www.digitalocean.com/community/tutorials/docker-ubuntu-16-04-ru

-Далее еще не все, нужно поставить Docker-Compose, здесь https://docs.docker.com/compose/install/

-После чего, в папке проекта(если открыли и стянули в PHPStorm) ввести команду sudo docker-compose up --build

-Далее во втором терминале необходимо ввести docker ps

-Найти необходимый контейнер по имени(у меня назывался flexcoretest_mysql_1), в терминале ввести команду открытия контейнера docker exec -ti flexcoretest_mysql_1 bash

-Внутри контейнера перейти в папку командой cd /var/lib/mysql

-Выполнить команду mysql -u app -p -D app

-Ввести команду source newsproduct.sql

-Зайти в браузер на адрес https://localhost:8080/
