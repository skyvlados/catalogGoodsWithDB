<?php
require_once 'vendor/autoload.php';
use Repositories\Users;
//require __DIR__ . "/file.txt";
if ($_SERVER["REQUEST_METHOD"]!=="POST") {
    http_response_code(405);
    exit;
}
$user=new Users();
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login && $password) {
        $user->create($login,$password);
        $message = 'Поздравляем, Вы успешно зарегистировались. Введите свое имя и пароль.';
        header('Location: /login.php?message='.$message);
        exit;
    } else {
        $message = 'Заполните поля';
        header('Location: /registration.php?message='.$message);
        exit;
    }
}



