<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест: 10 вопросов (PHP)</title>
</head>
<body>
    <h1>Тест: 10 разных вопросов (PHP версия)</h1>
    
    <?php
    // Инициализация переменных
    $totalScore = 0;
    $submitted = false;
    $userAnswers = [];

    // Проверяем, была ли отправлена форма
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $submitted = true;
        $userAnswers = $_POST;
        
        // Вопрос 1: радио (один вариант)
        if (isset($_POST['q1']) && $_POST['q1'] === 'Париж') {
            $totalScore += 1;
        }

        // Вопрос 2: чекбоксы (C++ и Java правильные)
        if (isset($_POST['q2']) && is_array($_POST['q2'])) {
            $q2Selected = $_POST['q2'];
            if (count($q2Selected) === 2 && 
                in_array('C++', $q2Selected) && 
                in_array('Java', $q2Selected)) {
                $totalScore += 2;
            }
        }

        // Вопрос 3: текстовый ввод
        if (isset($_POST['q3']) && strtolower(trim($_POST['q3'])) === 'кислород') {
            $totalScore += 1;
        }

        // Вопрос 4: соединение (три селекта)
        if (isset($_POST['q4_1']) && $_POST['q4_1'] === 'Париж') $totalScore++;
        if (isset($_POST['q4_2']) && $_POST['q4_2'] === 'Берлин') $totalScore++;
        if (isset($_POST['q4_3']) && $_POST['q4_3'] === 'Рим') $totalScore++;

        // Вопрос 5: drag&drop селекты
        if (isset($_POST['q5_1']) && $_POST['q5_1'] === 'разметка') $totalScore++;
        if (isset($_POST['q5_2']) && $_POST['q5_2'] === 'стили') $totalScore++;

        // Вопрос 6: порядок (ввод цифр)
        if (isset($_POST['q6'])) {
            $q6Answer = preg_replace('/\s+/', ' ', trim($_POST['q6']));
            if ($q6Answer === '2 1 4 3') {
                $totalScore += 2;
            }
        }

        // Вопрос 7: радио правда/ложь
        if (isset($_POST['q7']) && $_POST['q7'] === 'Правда') {
            $totalScore += 1;
        }

        // Вопрос 8: заполнить пропуск
        if (isset($_POST['q8']) && trim($_POST['q8']) === '100') {
            $totalScore += 1;
        }

        // Вопрос 9: соответствие дат
        if (isset($_POST['q9_1']) && $_POST['q9_1'] === '1961') $totalScore++;
        if (isset($_POST['q9_2']) && $_POST['q9_2'] === '1969') $totalScore++;

        // Вопрос 10: чекбоксы (млекопитающие: кит, дельфин, летучая мышь)
        if (isset($_POST['q10']) && is_array($_POST['q10'])) {
            $q10Selected = $_POST['q10'];
            $correctQ10 = ['Кит', 'Дельфин', 'Летучая мышь'];
            if (count($q10Selected) === 3 && 
                empty(array_diff($correctQ10, $q10Selected))) {
                $totalScore += 2;
            }
        }
    }
    ?>

    <!-- Форма теста -->
    <form method="post" action="">
        <!-- Вопрос 1: Выбор одного варианта -->
        <div class="question" id="q1">
            <p><strong>1. Столица Франции?</strong></p>
            <input type="radio" name="q1" value="Берлин" <?php if (isset($_POST['q1']) && $_POST['q1'] == 'Берлин') echo 'checked'; ?>> Берлин<br>
            <input type="radio" name="q1" value="Мадрид" <?php if (isset($_POST['q1']) && $_POST['q1'] == 'Мадрид') echo 'checked'; ?>> Мадрид<br>
            <input type="radio" name="q1" value="Париж" <?php if (isset($_POST['q1']) && $_POST['q1'] == 'Париж') echo 'checked'; ?>> Париж<br>
            <input type="radio" name="q1" value="Рим" <?php if (isset($_POST['q1']) && $_POST['q1'] == 'Рим') echo 'checked'; ?>> Рим<br>
        </div>

        <!-- Вопрос 2: Множественный выбор -->
        <div class="question" id="q2">
            <p><strong>2. Какие языки программирования являются компилируемыми? (выберите все подходящие)</strong></p>
            <input type="checkbox" name="q2[]" value="JavaScript" <?php if (isset($_POST['q2']) && in_array('JavaScript', $_POST['q2'])) echo 'checked'; ?>> JavaScript<br>
            <input type="checkbox" name="q2[]" value="C++" <?php if (isset($_POST['q2']) && in_array('C++', $_POST['q2'])) echo 'checked'; ?>> C++<br>
            <input type="checkbox" name="q2[]" value="Python" <?php if (isset($_POST['q2']) && in_array('Python', $_POST['q2'])) echo 'checked'; ?>> Python<br>
            <input type="checkbox" name="q2[]" value="Java" <?php if (isset($_POST['q2']) && in_array('Java', $_POST['q2'])) echo 'checked'; ?>> Java<br>
        </div>

        <!-- Вопрос 3: Ввод текста -->
        <div class="question" id="q3">
            <p><strong>3. Какой химический элемент обозначается как "O"? (напишите название по-русски)</strong></p>
            <input type="text" name="q3" id="q3_input" placeholder="Ваш ответ" value="<?php echo isset($_POST['q3']) ? htmlspecialchars($_POST['q3']) : ''; ?>">
        </div>

        <!-- Вопрос 4: Соединить (выпадающие списки) -->
        <div class="question" id="q4">
            <p><strong>4. Соедините страну и столицу:</strong></p>
            <p>Франция: 
                <select name="q4_1" id="q4_1">
                    <option value="">--выберите--</option>
                    <option value="Берлин" <?php if (isset($_POST['q4_1']) && $_POST['q4_1'] == 'Берлин') echo 'selected'; ?>>Берлин</option>
                    <option value="Париж" <?php if (isset($_POST['q4_1']) && $_POST['q4_1'] == 'Париж') echo 'selected'; ?>>Париж</option>
                    <option value="Лондон" <?php if (isset($_POST['q4_1']) && $_POST['q4_1'] == 'Лондон') echo 'selected'; ?>>Лондон</option>
                </select>
            </p>
            <p>Германия: 
                <select name="q4_2" id="q4_2">
                    <option value="">--выберите--</option>
                    <option value="Берлин" <?php if (isset($_POST['q4_2']) && $_POST['q4_2'] == 'Берлин') echo 'selected'; ?>>Берлин</option>
                    <option value="Вена" <?php if (isset($_POST['q4_2']) && $_POST['q4_2'] == 'Вена') echo 'selected'; ?>>Вена</option>
                    <option value="Берн" <?php if (isset($_POST['q4_2']) && $_POST['q4_2'] == 'Берн') echo 'selected'; ?>>Берн</option>
                </select>
            </p>
            <p>Италия: 
                <select name="q4_3" id="q4_3">
                    <option value="">--выберите--</option>
                    <option value="Рим" <?php if (isset($_POST['q4_3']) && $_POST['q4_3'] == 'Рим') echo 'selected'; ?>>Рим</option>
                    <option value="Мадрид" <?php if (isset($_POST['q4_3']) && $_POST['q4_3'] == 'Мадрид') echo 'selected'; ?>>Мадрид</option>
                    <option value="Афины" <?php if (isset($_POST['q4_3']) && $_POST['q4_3'] == 'Афины') echo 'selected'; ?>>Афины</option>
                </select>
            </p>
        </div>

        <!-- Вопрос 5: Соединение терминов (drag&drop упрощенно через select) -->
        <div class="question" id="q5">
            <p><strong>5. Выберите правильное описание для терминов:</strong></p>
            <p>HTML: 
                <select name="q5_1" id="q5_1">
                    <option value="">--выберите--</option>
                    <option value="стили" <?php if (isset($_POST['q5_1']) && $_POST['q5_1'] == 'стили') echo 'selected'; ?>>стили</option>
                    <option value="разметка" <?php if (isset($_POST['q5_1']) && $_POST['q5_1'] == 'разметка') echo 'selected'; ?>>разметка</option>
                    <option value="скриптинг" <?php if (isset($_POST['q5_1']) && $_POST['q5_1'] == 'скриптинг') echo 'selected'; ?>>скриптинг</option>
                </select>
            </p>
            <p>CSS: 
                <select name="q5_2" id="q5_2">
                    <option value="">--выберите--</option>
                    <option value="разметка" <?php if (isset($_POST['q5_2']) && $_POST['q5_2'] == 'разметка') echo 'selected'; ?>>разметка</option>
                    <option value="стили" <?php if (isset($_POST['q5_2']) && $_POST['q5_2'] == 'стили') echo 'selected'; ?>>стили</option>
                    <option value="база данных" <?php if (isset($_POST['q5_2']) && $_POST['q5_2'] == 'база данных') echo 'selected'; ?>>база данных</option>
                </select>
            </p>
        </div>

        <!-- Вопрос 6: Установка порядка (текстовый ввод) -->
        <div class="question" id="q6">
            <p><strong>6. Установите правильный порядок действий при варке яйца (введите цифры через пробел):</strong></p>
            <p>1. положить в воду  2. вскипятить  3. очистить  4. варить 7 минут</p>
            <input type="text" name="q6" id="q6_input" placeholder="Пример: 2 1 4 3" value="<?php echo isset($_POST['q6']) ? htmlspecialchars($_POST['q6']) : ''; ?>">
        </div>

        <!-- Вопрос 7: Правда/Ложь -->
        <div class="question" id="q7">
            <p><strong>7. Земля вращается вокруг Солнца.</strong></p>
            <input type="radio" name="q7" value="Правда" <?php if (isset($_POST['q7']) && $_POST['q7'] == 'Правда') echo 'checked'; ?>> Правда<br>
            <input type="radio" name="q7" value="Ложь" <?php if (isset($_POST['q7']) && $_POST['q7'] == 'Ложь') echo 'checked'; ?>> Ложь<br>
        </div>

        <!-- Вопрос 8: Заполнить пропуск -->
        <div class="question" id="q8">
            <p><strong>8. Вода кипит при ______ °C (нормальное давление, введите число)</strong></p>
            <input type="text" name="q8" id="q8_input" placeholder="100" value="<?php echo isset($_POST['q8']) ? htmlspecialchars($_POST['q8']) : ''; ?>">
        </div>

        <!-- Вопрос 9: Соответствие дат -->
        <div class="question" id="q9">
            <p><strong>9. Сопоставьте событие и год:</strong></p>
            <p>Первый полёт человека в космос: 
                <select name="q9_1" id="q9_1">
                    <option value="">--выберите--</option>
                    <option value="1961" <?php if (isset($_POST['q9_1']) && $_POST['q9_1'] == '1961') echo 'selected'; ?>>1961</option>
                    <option value="1957" <?php if (isset($_POST['q9_1']) && $_POST['q9_1'] == '1957') echo 'selected'; ?>>1957</option>
                    <option value="1969" <?php if (isset($_POST['q9_1']) && $_POST['q9_1'] == '1969') echo 'selected'; ?>>1969</option>
                </select>
            </p>
            <p>Высадка на Луну (Apollo 11): 
                <select name="q9_2" id="q9_2">
                    <option value="">--выберите--</option>
                    <option value="1965" <?php if (isset($_POST['q9_2']) && $_POST['q9_2'] == '1965') echo 'selected'; ?>>1965</option>
                    <option value="1969" <?php if (isset($_POST['q9_2']) && $_POST['q9_2'] == '1969') echo 'selected'; ?>>1969</option>
                    <option value="1972" <?php if (isset($_POST['q9_2']) && $_POST['q9_2'] == '1972') echo 'selected'; ?>>1972</option>
                </select>
            </p>
        </div>

        <!-- Вопрос 10: Множественный выбор (классификация) -->
        <div class="question" id="q10">
            <p><strong>10. Какие из перечисленных животных — млекопитающие? (выберите все)</strong></p>
            <input type="checkbox" name="q10[]" value="Кит" <?php if (isset($_POST['q10']) && in_array('Кит', $_POST['q10'])) echo 'checked'; ?>> Кит<br>
            <input type="checkbox" name="q10[]" value="Акула" <?php if (isset($_POST['q10']) && in_array('Акула', $_POST['q10'])) echo 'checked'; ?>> Акула<br>
            <input type="checkbox" name="q10[]" value="Дельфин" <?php if (isset($_POST['q10']) && in_array('Дельфин', $_POST['q10'])) echo 'checked'; ?>> Дельфин<br>
            <input type="checkbox" name="q10[]" value="Крокодил" <?php if (isset($_POST['q10']) && in_array('Крокодил', $_POST['q10'])) echo 'checked'; ?>> Крокодил<br>
            <input type="checkbox" name="q10[]" value="Летучая мышь" <?php if (isset($_POST['q10']) && in_array('Летучая мышь', $_POST['q10'])) echo 'checked'; ?>> Летучая мышь<br>
        </div>

        <br>
        <button type="submit">Сдать тест</button>
    </form>
    
    <?php if ($submitted): ?>
        <h2 id="result">Результат: <?php echo $totalScore; ?> баллов</h2>
    <?php else: ?>
        <h2 id="result">Результат: 0 баллов</h2>
    <?php endif; ?>
</body>
</html>
