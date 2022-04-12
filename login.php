<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
<?php if (isset($_GET["message"])): ?>
    <span style="color: red;">
    <?php echo $_GET["message"]?>
</span>
<?php endif; ?>
<form action="/loginUser.php" method="post">
    <label for="login">Имя пользователя: </label><input type="text" name="login" id="login">
    <br>
    <label for="password">Пароль: </label><input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Отправить">
    <a href="/registration.php">Зарегистрироваться</a>
</form>
</body>
</html>
