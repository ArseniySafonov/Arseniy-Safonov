<?php
    $n = 10;
    for ($i = 0; $i < $n; $i++) {
        $array[$i] = mt_rand(0, 100);
    }
    function printArray($array, $currentKey = -1)
    {
        echo '<tr>';
        foreach ($array as $key => $value) {
            $style = '';
            if ($key == $currentKey) $style = ' style="background-color:green"';
            echo "<td$style>$value</td>";
        }
        echo '</tr>';
    }
    echo 'Сортировка выборкой<table>';
    $sortingArray = $array;
    $count = count($sortingArray);
    printArray($sortingArray);
    $compare = 0;//Количество сравнений
    $change = 0;//Количество обменов
    for ($currentKey = 0; $currentKey < $count-1; $currentKey++) {
        $minKey = $currentKey;
        $minVal = $sortingArray[$currentKey];
        for ($nextKey = $minKey + 1; $nextKey < $count; $nextKey++){
            $compare++;
            if ($sortingArray[$nextKey] < $minVal) {
                $minKey = $nextKey;
                $minVal = $sortingArray[$nextKey];
            }
        }
        $compare++;
        if ($minVal < $sortingArray[$currentKey]) {
            $sortingArray[$minKey] = $sortingArray[$currentKey];
            $sortingArray[$currentKey] = $minVal;
            $change++;
        }
        printArray($sortingArray, $currentKey);
    }
    echo "</table>Количество сравнений $compare, обменов
    $change<br><br>";

    echo 'Пузырьковая сортировка<table>';
    $sortingArray = $array;
    $count = count($sortingArray);
    $compare = 0;//Количество сравнений
    $change = 0;//Количество обменов
    printArray($sortingArray);
    for ($currentKey = 0; $currentKey < $count-1; $currentKey++) {
        $flag = false;//Для проверки, были ли замены
        for ($nextKey = $count - 1; $nextKey > $currentKey;$nextKey--){
            $compare++;
            if ($sortingArray[$nextKey] < $sortingArray[$nextKey -1]) {
                $temp = $sortingArray[$nextKey];
                $sortingArray[$nextKey] = $sortingArray[$nextKey -1];
                $sortingArray[$nextKey - 1] = $temp;
                $flag = true;
                $change++;
            }
        }
        printArray($sortingArray, $currentKey);
        if (!$flag) break;
    }
    echo "</table>Количество сравнений $compare, обменов
    $change<br><br>";

    echo 'Сортировка вставками<table>';
    $sortingArray = $array;
    $count = count($sortingArray);
    printArray($sortingArray);
    $compare = 0;//Количество сравнений
    $change = 0;//Количество обменов
    for ($currentKey = 1; $currentKey < $count; $currentKey++) {
        $temp = $sortingArray[$currentKey];
        for ($nextKey = $currentKey; $nextKey > 0; $nextKey--){
            $compare++;
            if ($sortingArray[$nextKey - 1] > $temp) {
                $sortingArray[$nextKey] = $sortingArray[$nextKey -1];
                $change++;
            } else {
                break;
            }
        }
        $sortingArray[$nextKey] = $temp;
        printArray($sortingArray, $currentKey);
    }
    echo "</table>Количество сравнений $compare, обменов
    $change<br>";
?>