<?php
    $properties = array("background", "border", "radius", "padding", "float");
    function compare_length($strl, $str2) {
    $length1 = strlen($str1);
    $length2 = strlen($str2);
    if ($length1 == $length2) return 0;
    elseif ($length1 > $length2) return -1;
    else return 1;
    }
    for($i=0; $i<sizeof($properties); $i++)
    echo "$properties[$i] <br>";
?>