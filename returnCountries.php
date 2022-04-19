<?php
require_once 'vendor/autoload.php';
use Repositories\Countries;
use Repositories\Repository;
$perPage=(int)($_GET['perPage']??10);
$page=(int)($_GET['page']??1);
$from=5;
$to=25;
$step=5;
$countries=new Countries();
?>
<html>
<head>
    <title>Страны</title>
</head>
<body>
Страны:
<br>
<a href="/formAddCountries.php">Добавить страну</a>
<form action="returnCountries.php?page="<?= $page?> method="get">
<label for="countElements">Количество элементов: </label>
    <select name="perPage">
    <?php for ($i = $from; $i <= $to; $i += $step) {
        ?>
    <option value="<?=$i?>" <?=($i===$perPage) ? 'selected' : ''?>><?=$i?></option>
    <?php }?>
    </select>
    <input type="submit" value="Показать список">
<?php
Repository::get(Countries::class)->render($perPage,$page);?>
<br>
<label for="pages">Страницы:</label>
<?php
for($page=1;$page<=ceil($countries->getCount()/$perPage); $page++){?>
<a href="/returnCountries.php?page=<?=$page ?>&perPage=<?=$perPage ?>"><?= $page?></a>
<?php }?>
<br>
<a href="/index.php">Главная страница</a>
</body>
</html>
