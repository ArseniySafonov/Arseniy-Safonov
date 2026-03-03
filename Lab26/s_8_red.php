<?php
    //Изменённый код для обработки строк однобайтовой кодировки
    function singlebyte_str_replace($haystack, $search, $replace, &$count = null) {
        return str_replace($search, $replace, $haystack, $count);
    }

    $text = "Для замены фрагмента текста в юникоде встроенные функции замены str_replace, str_ireplace могут дать неверные результаты";
    echo singlebyte_str_replace($text, 'замены', '<b>замены</b>', $count);
    echo '<br>количество замен - ', $count;
?>