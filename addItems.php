<?php

use Repositories\Items;
use Repositories\Manufacturers;

require_once 'vendor/autoload.php';

$name = $_POST['name'];
$price = $_POST['price'];
$manufacturer = $_POST['manufacturer'];
$data=$_POST['data'];
$error=false;
$items=new Items();
$manufacturers=new Manufacturers();
$manufacturer_id=$manufacturers->getIdByName($manufacturer);

if (!$name || !$price || !$manufacturer || !$data) {
    $error=true;
    $message = 'Поля Имя товара, Цена товара, Производитель и Дата производства должны быть заполнены!';
    header('Location:/formAddItems.php?error='.$error.'&message='.$message);
    exit;
} elseif ($items->checkExist($name)) {
    $error=true;
    $message = 'Такое имя товара уже существует!';
    header('Location:/formAddItems.php?error='.$error.'&message='.$message);
    exit;
}else{
    $items->create($name, $price, $manufacturer_id,$data);
    header('Location:/returnItems.php');
    exit;
}
