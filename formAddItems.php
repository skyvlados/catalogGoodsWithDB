<html>
<head>
    <title>Добавление товаров</title>
</head>
<body>
<form action="/addItems.php" method="post">
    <label for="name">Имя товара: </label><input type="text" name="name">
    <br>
    <label for="price">Цена товара, руб: </label><input type="text" name="price">
    <br>
    <label for="manufacturer">Производитель: </label><select name="manufacturer">
        <?php

        use Repositories\Manufacturers;

        require_once 'vendor/autoload.php';

        $manufacturers=new Manufacturers();
        $manufacturers=$manufacturers->getAll();
        foreach ($manufacturers as $manufacturer) {
        ?>
        <option><?=$manufacturer->getName() ?></option><?php
        }?>
    </select>
    <br>
    <label for="data">Дата производства: </label><input type="date" name="data">
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
    <a href="/returnItems.php">К списку товаров</a>
</form>
</body>
</html>
