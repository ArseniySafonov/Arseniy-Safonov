<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Использование include() и require()</title>
</head>
<body>
    <?php 
    include("9-1.php");
    echo "<h2>...Основная часть...</h2>";
    $rez = require("9-2.php");
    echo $rez;
    echo "$rez";
    ?>
</body>
</html>