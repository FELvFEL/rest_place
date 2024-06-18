# API
#### Список функций доступных неавторизованному пользователю: 
* Просмотр мест для отдыха,
* Регистрация,
* Авторизация.
#### Список функций доступных авторизованному пользователю 
* Добавить место в желаемое,
* Получить свой список желаемого,
* Получить информацию о себе.
#### Список функций доступных авторизованному пользователю с ролью Admin:
* Добавить новое место,
* Получить список желаемого всех пользователей.

## Для запуска:
```
cd docker
```
```
docker compose up
```
## Добавить админа:
```
docker-compose exec ms_rest php artisan db:seed --class=AdminUserSeeder
```
## Добавить случайные места:
```
docker-compose exec ms_rest php artisan db:seed --class=PlaceSeeder
```
## Запросы в postman(во всех запросах реализован скрипт для авто авторизации в роли admin ):
<https://www.postman.com/king-and-jester/workspace/rest-service/collection/27480926-d7547654-3832-4411-a5ec-18b65cd3354c?action=share&creator=27480926>