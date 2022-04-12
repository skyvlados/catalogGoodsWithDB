<?php
require_once 'vendor/autoload.php';
use Cookies\Cookie;

if (!$login=Cookie::get('login')) {
    header("Location: /login.php");
    exit;
}
?>
<html>
<head>
    <title>Главная страница</title>
</head>
<body>
    Добро пожаловать, <?php echo $login ?>
    <br>
    <a href="/returnItems.php">Форма отображения товаров</a>
    <br>
    <a href="/returnManufacturers.php">Форма отображения производителей</a>
    <br>
    <a href="/returnCountries.php">Форма отображения стран</a>
    <br>
    <a href="/logout.php">Выйти</a>
</body>
</html>
