<?php
require_once 'vendor/autoload.php';

use Repositories\Manufacturers;
use Repositories\Repository;
$page=(int)($_GET['page']??1);
$perPage=(int)($_GET['perPage']??10);
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
    <input type="submit" value="Показать список">
<?php Repository::get(Manufacturers::class)->render($perPage,$page);?>
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