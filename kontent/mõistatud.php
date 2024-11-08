<?php
$riik = "Eesti";

// Проверка, если форма была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем ответ пользователя из формы
    $user_answer = trim($_POST['answer']);
    // Сравниваем введенный ответ с правильным
    if (strtolower($user_answer) == strtolower($riik)) {
        echo "<p>Tubli! Sa arvasid riigi ära.</p>";
    } else {
        echo "<p>Proovi uuesti!</p>";
    }
}
echo "Mõistaud. Euroopa riik.<br>";

// Выводим подсказки
echo "<ol>";
echo "<li>Esimene täht riigis on - ". substr($riik, 0, 1)."</li>";
echo "<li>Teine täht on - ". substr($riik, 1, 1)."</li>";
echo "<li>Tähed 3-5: ". substr($riik, 2, 3)."</li>";
echo "<li>Viimane täht on - ". substr($riik, -1)."</li>";
echo "<li>Riik sisaldab tähti 's'.</li>";
echo "<li>Riik on Euroopa osa.</li>";
echo "</ol>";

// Форма для ввода ответа
echo '<form method="POST">
        <label for="answer">Mis riik see on?</label>
        <input type="text" id="answer" name="answer" required>
        <input type="submit" value="Arvake!">
      </form>';
?>
