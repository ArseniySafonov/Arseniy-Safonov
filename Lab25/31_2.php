<?php
$str = "Здравствуйте,
" . $_POST["first_name"]."
" . $_POST["last_name"]."!<br>";
$str .= "Вы выбрали для изучения курс по
" . $_POST["kurs"];
echo $str;
?>