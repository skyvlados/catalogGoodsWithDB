<html>
<head>
    <title>Добавление производителей</title>
</head>
<body>
<form action="/addManufacturers.php" method="post">
    <label for="name">Имя производителя: </label><input type="text" name="name">
    <br>
    <label for="country">Страна: </label><select name="country">
        <?php
        require_once 'vendor/autoload.php';
        use Repositories\Countries;

        $countries=new Countries();
        $countries=$countries->getAll();
        foreach ($countries as $country) {
            ?>
        <option><?=$country->getName()?></option><?php
        }
        ?></select>
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
    <a href="/returnManufacturers.php">К списку товаров</a>
</form>
</body>
</html>
