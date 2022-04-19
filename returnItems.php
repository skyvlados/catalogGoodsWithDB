<?php
require_once 'vendor/autoload.php';
use Repositories\Items;
use Repositories\Repository;
$perPage=(int)($_GET['perPage']??10);
$page=(int)($_GET['page']??1);
$name=$_GET['name']??'';
$country=$_GET['country']??'';
$priceFrom=(int)($_GET['priceFrom']??0);
$priceTo=(int)($_GET['priceTo']??1000000000);
$from=5;
$to=25;
$step=5;
$item=new Items();
?>
<html>
<head>
    <title>Товары</title>
</head>
<body>
Товары:
<br>
<a href="/formAddItems.php">Добавить товар</a>
<form action="/returnItems.php?page=<?=$page?>&name=<?=$name?>&priceFrom=<?=$priceFrom?>&priceTo=<?=$priceTo?>" method="get">
<label for="countElements">Количество элементов: </label>
    <select name="perPage">
        <?php for ($i=$from;$i<$to;$i+=$step):?>
        <option value=<?=$i?> <?=($i===$perPage) ? 'selected' : ''?>><?=$i?></option>
        <?php endfor;?>
    </select>
    <br>
    <label for="filters">Фильтры: </label>
        <br>
        <label for="name">Название товара: </label>
    <input type="text" name="name" value="<?=$_GET['name']??''?>">
    <label for="name">Страна: </label>
    <input type="text" name="country" value="<?=$_GET['country']??''?>">
        <label for="name">Цена от: </label>
        <input type="text" name="priceFrom" value="<?=$_GET['priceFrom']??''?>">
        <label for="name">Цена до: </label>
        <input type="text" name="priceTo" value="<?=$_GET['priceTo']??''?>">
        <input type="submit" value="Показать список">
<?php
Repository::get(Items::class)->render($perPage, $page, $name, $priceFrom, $priceTo,$country);?>
    <br>
    <label for="pages">Страницы:</label>
    <?php
    for($page=1; $page<=ceil($item->getCount()/$perPage); $page++){?>
    <a href="/returnItems.php?page=<?=$page?>&perPage=<?=$perPage?>"><?=$page?></a>
    <?php }?>
<br>
    <a href="/index.php">Главная страница</a>
</body>
</html>
