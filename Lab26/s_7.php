<?php
    header('Content-Type: text/html; charset=utf-8');
    mb_internal_encoding("UTF-8");
    $name = $_POST['name'];
    $e_mail = $_POST['e_mail'];
    $message = $_POST['message'];
    function clean($value = " ")
    {
        $value = trim($value);
        $value = stripslashes($value); 
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }
    function check_length($value = " ", $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }
    $name = clean($name);
    $e_mail = clean($e_mail);
    $message = clean($message);
    if(!empty($name) && !empty($e_mail) && !empty($message)) {
        $e_mail_validate = filter_var($e_mail, FILTER_VALIDATE_EMAIL);
        if(check_length($name, 2, 25) && check_length($message,2, 1000) && $e_mail_validate)
        echo "Спасибо за сообщение";
        else echo "Введены некорректные данные"; 
    }
    else echo "Заполните пустые поля";
?>