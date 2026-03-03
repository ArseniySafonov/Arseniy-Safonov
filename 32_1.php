<?php
$times = array(
    PHP => "14.30",
    Flash => "12.00",
    Oracle => "15.00",
    HTML => "14.00");
$lectors = array(
    PHP => "Василий Васильевич",
    Flash => "Иван Иванович",
    Oracle => "Петр Петрович",
    HTML => "Семен Семенович");
define("SIGN", "С уважением, администрация");
define("MEETING_TIME", "18.00");
$date = "12 мая"; 
$str = "Здравствуйте,уважаемый" . $_POST["first_name"] . "
" . $_POST["last_name"] .
    "!<br>";
$str .= "<br>Сообщаем Вам, что";
$kurses = $_POST["kurs"];//сохраняем в этой переменной
//список выбранных курсов
$lect = "";
if (!isset($kurses)) {
    $event = "следующее собрание";
    $str .= "$event сосотоится $date" . MEETING_TIME . "<br>";
} else {
    $event = "выбранные Вами лекции состоятся $date <ul>";
    for ($i = 0; $i < count($kurses); $i++) {
        $k = $kurses[$i];
        $lect = $lect . "<li> лекция по $k в $times[$k]";
        $lect .= "(Ваш лектор, $lectors[$k])";
    }
    $event = $event . $lect . "</ul>";
    $str .= "$event";
}
$str .= "<br>". SIGN;
echo $str;
?>