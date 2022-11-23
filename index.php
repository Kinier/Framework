<?php


require_once "./Fw/init.php";

defined('CORE_SET') ?? exit();

use Fw\Core\Application;
use Fw\Core\Multiton;

$app = Multiton::getInstance(Application::class);
$app->header();
Application::includeComponent(
    'fw:element.list',
    'default',
    [
        "sort" => "id",
        "limit" => 10,
        "show_title" => "N"
    ]
);

?>
    <pre>
        -------- 23.11.2022 --------
1) Созданы классы для работы с данными запросов
2) Application добавлено подключение компонента
3) Создана структура компонентов и их шаблонов
-------- 09.11.2022 --------
1) создан класс Page для работы с содержимым html страницы
2) итд
-------- 04.11.2022 --------
1) создан конфиг и класс для работы с ними
2) создана функции авто регистрации классов
</pre>
<?php
$app->footer(); ?>