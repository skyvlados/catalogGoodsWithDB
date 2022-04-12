<?php
require_once 'vendor/autoload.php';
use Repositories\Countries;
$error=false;
$name = $_POST['name'];
$country=new Countries();
if (!$name) {
    $error=true;
    $message='Заполните поле Страна!';
    header('Location: /formAddCountries.php?error='.$error.'&message='.$message);
    exit;
}
elseif ($country->checkExist($_POST['name'])) {
    $error=true;
    $message='Такая страна уже существует!';
    header('Location: /formAddCountries.php?error='.$error.'&message='.$message);
    exit;
}
else{
    $error=false;
}

$country->create($name);
header('Location: /returnCountries.php?error='.$error);
exit;
