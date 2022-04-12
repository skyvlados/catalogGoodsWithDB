<html>
<head>
    <title>Страны</title>
</head>
<body>
Товары:
<br>
<a href="/formAddCountries.php">Добавить страну</a>
<?php
require_once 'vendor/autoload.php';
use Repositories\Countries;
use Repositories\Repository;

Repository::get(Countries::class)->render();?>
<br>
<a href="/index.php">Главная страница</a>
</body>
</html>
