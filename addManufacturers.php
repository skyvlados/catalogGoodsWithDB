<?php

require_once 'vendor/autoload.php';
use Repositories\Countries;
use Repositories\Manufacturers;

$name = $_POST['name'];
$country = $_POST['country'];

$countries=new Countries();
$country_id=$countries->getOneByName($country);

$error=false;
$manufacturers=new Manufacturers();

if (!$name || !$country) {
    $error=true;
    $message='Заполните поля Имя производителя и Страну!';
    header('Location: /formAddManufacturers.php?error='.$error."&message=".$message);
    exit;
}
elseif(($manufacturers->checkExist($name))) {
    $error=true;
    $message='Такое Имя производетеля уже существует!';
    header('Location: /formAddManufacturers.php?error='.$error."&message=".$message);
    exit;
}else{
    $manufacturers->create($name,$country_id);
    header('Location: /returnManufacturers.php');
    exit;

}
