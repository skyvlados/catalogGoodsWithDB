<html>
<head>
    <title>Производители</title>
</head>
<body>
Товары:
<br>
<a href="/formAddManufacturers.php">Добавить производителя</a>
<?php
require_once 'vendor/autoload.php';
use Repositories\Items;
use Repositories\Manufacturers;
use Repositories\Repository;

Repository::get(Manufacturers::class)->render();?>
<br>
<a href="/index.php">Главная страница</a>
</body>
</html>
