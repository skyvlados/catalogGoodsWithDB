<html>
<head>
    <title>Добавление стран</title>
</head>
<body>
<form action="/addCountries.php" method="post">
    <label for="name">Страна: </label><input type="text" name="name">
    <?php
    if (isset($_GET["error"])) {
        ?>
        <br>
    <span style="color: red;">
        <?php echo $_GET["message"]?>
        <?php
    }?>
    <br>
    <input type="submit" value="Добавить">
    <br>
    <a href="/returnCountries.php">К списку стран</a>
</form>
</body>
</html>
