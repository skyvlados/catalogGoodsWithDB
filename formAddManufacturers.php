<?php
require_once 'vendor/autoload.php';
use Repositories\Countries;
use Repositories\Manufacturers;

if (isset($_POST['name'])) {
    $name = $_POST['name']??null;
    $country_id = $_POST['country_id']??null;
    $error=false;
    $manufacturers=new Manufacturers();
    if (!$name || !$country_id) {
        $error=true;
        $message='Заполните поля Имя производителя и Страну!';
    }
    elseif(($manufacturers->checkExist($name))) {
        $error=true;
        $message='Такое Имя производетеля уже существует!';
    }else{
        $manufacturers->create($name,$country_id);
        header('Location: /returnManufacturers.php');
        exit;
    }
}

?>
<html>
<head>
    <title>Добавление производителей</title>
</head>
<body>
<form action="/formAddManufacturers.php" method="post">
    <label for="name">Имя производителя: </label><input type="text" name="name" value="<?= $_POST['name']??''?>">
    <br>
    <label for="country">Страна: </label><select name="country_id"">
        <option></option>
        <?php
        $countries=new Countries();
        $countries=$countries->getAll();
        foreach ($countries as $country) {
            ?>
        <option value="<?= $country->getId()?>" <?=($country->getId()===
            (int)($_POST['country_id']??null)) ? 'selected' : ''?>><?=$country->getName()?></option><?php
        }
        ?>
    </select>
    <?php
    if (isset($error)) {
    ?>
    <br>
    <span style="color: red;">
        <?= $message?>
        <?php
        }?>
    <br>
    <input type="submit" value="Добавить">
    <br>
    <a href="/returnManufacturers.php">К списку товаров</a>
</form>
</body>
</html>
