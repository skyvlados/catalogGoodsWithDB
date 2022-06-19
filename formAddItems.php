<?php
require_once 'vendor/autoload.php';

use Repositories\Manufacturers;
use Repositories\Items;

if (isset($_POST['name'])) {
    $name = $_POST['name']??null;
    $price = $_POST['price']??null;
    $manufacturer_id = $_POST['manufacturer_id']??null;
    $data=$_POST['data']??null;
    $error=false;
    $items=new Items();
    if (!$name || !$price || !$manufacturer_id || !$data) {
        $error=true;
        $message = 'Поля Имя товара, Цена товара, Производитель и Дата производства должны быть заполнены!';
    } elseif ($items->checkExist($name)) {
        $error=true;
        $message = 'Такое имя товара уже существует!';
    }else{
        $items->create($name, $price, $manufacturer_id, $data);
        header('Location:/returnItems.php');
        exit;
    }

}
?>
<html>
<head>
    <title>Добавление товаров</title>
</head>
<body>
<form action="/formAddItems.php" method="post">
    <label for="name">Имя товара: </label><input type="text" name="name" value="<?=$_POST['name']??''?>">
    <br>
    <label for="price">Цена товара, руб: </label><input type="text" name="price" value="<?=$_POST['price']??''?>">
    <br>
    <label for="manufacturer">Производитель: </label><select name="manufacturer_id">
        <option></option>
        <?php
        $manufacturers=new Manufacturers();
        $manufacturers=$manufacturers->getAll();
        foreach ($manufacturers as $manufacturer) {
        ?>
        <option value="<?=$manufacturer->getId()?>" <?=($manufacturer->getId()===
            (int)($_POST['manufacturer_id']??null)) ? 'selected' : ''?>><?=$manufacturer->getName() ?></option><?php
        }?>
    </select>
    <br>
    <label for="data">Дата производства: </label><input type="date" name="data" value="<?=$_POST['data']??''?>">
    <?php
    if (isset($error)) {
    ?>
    <br>
    <span style="color: red;">
        <?php echo $message?>
        <?php
        }?>
    <br>
    <input type="submit" value="Добавить">
    <br>
    <a href="/returnItems.php">К списку товаров</a>
</form>
</body>
</html>
