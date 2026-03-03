<?php

$to = 'arseny060906@mail.ru';
$subject = "Test HTML";

$message = '<html>
<head>
<title>Тест рассылка</title>
</head>
<body>
<p>Проверка работы функции mail()</p>
</body>
</html>';

/* Для отправки HTML-письма следует установить заголовок Content-type */

$headers = 'From: PSSIP@tut.by' . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8';

if (mail($to, $subject, $message, $headers)) {
    echo "HTML-письмо отправлено";
}

?>