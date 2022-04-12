<?php
require_once 'vendor/autoload.php';

use Models\User;
use Repositories\Repository;
use Repositories\Users;
use Cookies\Cookie;

if ($_SERVER["REQUEST_METHOD"]!=="POST") {
    http_response_code(405);
    exit;
}
if (!empty($_POST)) {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    if (Repository::get(Users::class)->checkExist($login, $password)) {
        Cookie::set('login', $login);
        header('Location: /index.php');
        exit;
    } else {
        $message = 'Ошибка авторизации, нет такого юзера';
        header('Location: /login.php?message='.$message);
        exit;
    }
}
