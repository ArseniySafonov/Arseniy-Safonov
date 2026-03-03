<html>
<head>
    <title>Логин</title>
</head>
<body>
<?php
// Проверить корректность username и password
if ($_POST["username"] == "php" && $_POST["password"] == "php") {
    // Если корректны, устанавливаем значение сессии в YES
    session_start();
    $_SESSION["Login"] = "YES";
    echo "<h1>Вы зашли корректно</h1>";
    echo "<p><a href='16-2.php'>Ссылка на защищенный файл</a></p>";
} else {
    // Если некорректны, устанавливаем сессию в NO
    session_start();
    $_SESSION["Login"] = "NO";
    echo "<h1>Вы зашли НЕкорректно</h1>";
    echo "<p><a href='16-2.php'>Ссылка на защищенный файл</a></p>";
}
?>
</body>
</html>