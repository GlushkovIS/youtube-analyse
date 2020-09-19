<?php include_once 'src/Controllers/MainViewController.php'?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Youtube-Analyse</title>
</head>
<body>
<h3>Введите наименование канала для добавления в статистику:</h3>
<form action="/" method="post">
    <input type="text" name="nameChannel" placeholder="наименование канала">
    <input type="submit" name="submit" placeholder="отправить">
</form>
</body>
</html>