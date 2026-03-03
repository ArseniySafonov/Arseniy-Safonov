<?php
    $languages = array("Country" => "Language",
    "Spain" => "Spanish",
    "USA" => "English",
    "France" => "French",
    "Russia" => "Russian");
    print "<table border=1 width=200>";
    reset($languages);
    $hdl = key($languages);
    $hd2 = $languages[$hdl];
    print "<tr><th>". $hdl. "</th><th>". $hd2 ."</th></tr>"; 
    foreach($languages as $ctry => $lang) {
        if ($ctry !== "Country") {
            print "<tr><td>$ctry</td><td>$lang</td></tr>";
        }
    }
    print "</table>";
?>