<?php

$to = 'arseny060906@mail.ru';
$subject = "Test";
$message = "Здравствуйте!\r\n Вы подписались на рассылку\r\n по ПССИП";

/* На случай, если какая-то из строк письма длиннее 70 символов, используем wordwrap() */
$message = wordwrap($message, 70, "\r\n");

$headers = 'From: PSSIP@tut.by' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Отправляем
if (mail($to, $subject, $message, $headers)) {
    echo "Письмо с темой " . $subject . " на адрес " . $to . " отправлено";
}

?>