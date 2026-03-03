<?php
    // a) Произведение элементов массива между макс. и мин. элементами
    function productBetweenMinMax($arr) {
        $maxIndex = array_search(max($arr), $arr);
        $minIndex = array_search(min($arr), $arr);

        if ($maxIndex > $minIndex) {
            $start = $minIndex + 1;
            $end = $maxIndex - 1;
        } else {
            $start = $maxIndex + 1;
            $end = $minIndex - 1;
        }

        if ($start > $end) return 0;

        $product = 1;
        for ($i = $start; $i <= $end; $i++) {
            $product *= $arr[$i];
        }
        return $product;
    }

    // b) Перестановка массива: сначала нечетные позиции, потом четные
    function rearrangeArray($arr) {
        $oddPositions = [];
        $evenPositions = [];
        foreach ($arr as $index => $value) {
            if ($index % 2 == 1) {
                $oddPositions[] = $value;
            } else {
                $evenPositions[] = $value;
            }
        }
        return array_merge($oddPositions, $evenPositions);
    }

    function columnsWithoutZerosAndProduct($matrix) {
        $rows = count($matrix);
        $cols = count($matrix[0]);
        $result = [];

        // Вывод массива для наглядности
        echo "Двумерный массив:<br>";
        for ($r = 0; $r < $rows; $r++) {
            echo "[ " . implode(", ", $matrix[$r]) . " ]<br>";
        }
        echo "<br>";

        for ($col = 0; $col < $cols; $col++) {
            $hasZero = false;
            $product = 1;
            for ($row = 0; $row < $rows; $row++) {
                if ($matrix[$row][$col] == 0) {
                    $hasZero = true;
                    break;
                }
                $product *= $matrix[$row][$col];
            }
            if (!$hasZero) {
                $result[] = ['column' => $col, 'product' => $product];
            }
        }
        return $result;
    }

    // a)
    $arr = [3, 1, 2, 5, 9];
    echo "a) Произведение между мин и макс: " . productBetweenMinMax($arr) . "<br><br>";

    // b)
    $newArr = rearrangeArray($arr);
    echo "b) Новый массив: [" . implode(", ", $newArr) . "]<br><br><br><br>";

    // c)
    $matrix = [
        [1, 0, 2],
        [3, 4, 6],
        [6, 7, 3]
    ];
    $result = columnsWithoutZerosAndProduct($matrix);
    echo "c) Столбцы без нулей и произведения:<br><br>";
    foreach ($result as $col) {
        echo "Столбец " . $col['column'] . ": произведение " . $col['product'] . "<br><br>";
    }
?>