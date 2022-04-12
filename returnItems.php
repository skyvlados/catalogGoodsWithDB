<html>
<head>
    <title>Товары</title>
</head>
<body>
Товары:
<br>
<a href="/formAddItems.php">Добавить товар</a>
<?php
require_once 'vendor/autoload.php';
use Repositories\Items;
use Repositories\Repository;

Repository::get(Items::class)->render();?>
<br>
    <a href="/index.php">Главная страница</a>
</body>
</html>
