Установка:
php composer.phar install
php init

Нужно сделать 2 домена:
"ajax-calc.local" с корнем в папке "ajax-calc.local/frontend/web"
"api.ajax-calc.local" с корнем в папке "ajax-calc.local/backend/web"

Форма открывается по URL "ajax-calc.local"
Разметка формы находится в файле "frontend/views/site/index.php".
В форме можно выбрать вариант задачи "простой / усложненный". Для простого отправляется зарос на тот же домен, для усложненного на домен с API.
Контроллеры, производящие вычисления, находятся в классах "frontend/controllers/SiteController.php" и "backend/controllers/SiteController.php"

Вычисление выражения производится в классе Calculator::calculate()

Можно было вынести парсер выражения в отдельный класс, но мне показалось это лишним, так как здесь и одного класса многовато.
