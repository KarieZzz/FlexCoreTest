# FlexCoreTest
1-Для начала нужно установить Docker, инструкция здесь https://www.digitalocean.com/community/tutorials/docker-ubuntu-16-04-ru

2-Далее еще не все, нужно поставить Docker-Compose, здесь https://docs.docker.com/compose/install/

3-После чего, в папке проекта(если открыли и стянули в PHPStorm) ввести команду sudo docker-compose up --build

4-Зайти в браузер на адрес https://localhost:8080/

5-Если в БД нет данных(навигационные пункты при переходе пустые), выполните пункты 6-10

6-Во втором терминале необходимо ввести docker ps

7-Найти необходимый контейнер по имени(у меня назывался flexcoretest_mysql_1), в терминале ввести команду открытия контейнера 
docker exec -ti flexcoretest_mysql_1 bash

8-Внутри контейнера перейти в папку командой cd /var/lib/mysql

9-Выполнить команду mysql -u app -p -D app

10-Ввести команду source newsproduct.sql


