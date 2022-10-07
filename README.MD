# alpha 

------
Git project "Twitter"

##
1. Основная идея

распределить воркспейс на 3 корневых директории:
* Controller - для работы с логикой сайта
* Model - для работы с базой данных
* View - для представления/отображения данных на сайте
##

2. Создание сущностей:

* Customers - id PRIMARY KEY, username UNIQUE KEY
* Tweets - customer_id FOREIGN KEY
* hashtags - customer_id FOREIGN KEY, tag VARCHAR(64)
* passwords - id PRIMARY KEY, id_customer FOREIGN KEY, hashed_password VARCHAR(64)
##

3. Реализация
* главная страница (войти, зарегистрироваться)
* * страница с формой (вход/регистрация)
* * логирование и сохранения в БД (пароль передовать хешем)
* сделать *.htaccess* для грамотных редиректов и ответов
* настроить response HTTP codes
* * сделать View представление к пункту к HTTP CODES
* страница твитов
* * форма для нового твита
* * дотставать ниже все последние твиты
* * доставать твиты людей с одинаковыми тэгами
