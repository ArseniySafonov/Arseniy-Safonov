<?php
session_start();
if ($_SESSION["Login"] != "YES") {
    header("Location: 16-1.php");
    exit();
}
?>
<html>
<head>
    <title>Защищенная страница</title>
</head>
<body>
    <h1>Этот документ защищен</h1>
    <p>Вы получили доступ к файлу, так как вошли в систему.</p>
    <p><a href="logout.php">Выйти</a></p>
</body>
</html>