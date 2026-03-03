<?php
$name = "test";
$work = "куки установлены";
setcookie("name", $name);
setcookie("work", $work, time() + 3600);
?>