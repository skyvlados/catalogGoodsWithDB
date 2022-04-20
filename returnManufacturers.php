<?php
require_once 'vendor/autoload.php';

use Repositories\Manufacturers;
use Repositories\Repository;
$page=(int)($_GET['page']??1);
$perPage=(int)($_GET['perPage']??10);
$name = $_GET['name'] ?? '';
$country=$_GET['country']??'';
$from=5;
$to=25;
$step=5;
$manufacturers=new Manufacturers();
?>
<html>
<head>
    <title>Производители</title>
</head>
<body>
Производители:
<br>
<a href="/formAddManufacturers.php">Добавить производителя</a>
<form action="/returnManufacturers.php?page=<?=$page?>" method="get">
    <label for="countElements">Количество элементов: </label>
    <select name="perPage">
        <?php for($i=$from;$i<=$to;$i+=5){?>
        <option value="<?=$i?>" <?= ($i===$perPage) ? "selected" : ''?>><?= $i?></option>
        <?php }?>
    </select>
    <br>
    <label for="filters">Фильтры: </label>
    <br>
    <label for="filters">Название производителя: </label>
    <input type="text" name="name" value="<?= $_GET['name']??''?>">
    <label for="filters">Страна производителя: </label>
    <input type="text" name="country" value="<?= $_GET['country']??''?>">
    <input type="submit" value="Показать список">
<?php Repository::get(Manufacturers::class)->render($perPage,$page,$name,$country);?>
    <br>
    <label for="pages">Страницы: </label>
    <?php for ($page = 1; $page <= ceil($manufacturers->getCount()/$perPage); $page++) {
    ?>
    <a href="/returnManufacturers.php?page=<?= $page?>&perPage=<?= $perPage ?>"><?= $page?></a>
    <?php }?>
<br>
<a href="/index.php">Главная страница</a>
</body>
</html>