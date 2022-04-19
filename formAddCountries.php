<?php
require_once 'vendor/autoload.php';
use Repositories\Countries;

if (isset($_POST['name'])) {
    $error = false;
    $name = $_POST['name']??null;
    $country = new Countries();
    if (!$name) {
        $error = true;
        $message = 'Заполните поле Страна!';
    } elseif ($country->checkExist($_POST['name'])) {
        $error = true;
        $message = 'Такая страна уже существует!';
    } else {
        $country->create($name);
        header('Location:/returnCountries.php');
        exit;
    }
}
?>
<html>
<head>
    <title>Добавление стран</title>
</head>
<body>
<form action="/formAddCountries.php" method="post">
    <label for="name">Страна: </label><input type="text" name="name" value="<?=$_POST['name']??''?>">
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
    <a href="/returnCountries.php">К списку стран</a>
</form>
</body>
</html>
