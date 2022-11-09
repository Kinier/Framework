<?php


require_once "./Fw/init.php";

defined('CORE_SET') ?? exit();

use Fw\Core\Application;
use Fw\Core\Multiton;

$app = Multiton::getInstance(Application::class);
$app->header();
?>
    <pre>
-------- 09.11.2022 --------
1) создан класс Page для работы с содержимым html страницы
2) итд
-------- 04.11.2022 --------
1) создан конфиг и класс для работы с ними
2) создана функции авто регистрации классов
</pre>
<?php $app->footer(); ?>