<?php
// Загрузка XML файла
$students = simplexml_load_file("students.xml");

// Функция для добавления нового студента в XML
function addStudentToXml($name, $website, $hairColor) {
    global $students;
    $newStudent = $students->addChild('student');
    $newStudent->addChild('name', $name);
    $newStudent->addChild('website', $website);
    $newStudent->addChild('hairColor', $hairColor);
    $students->asXML('students.xml');  // Сохранение изменений в XML
}

// Обработка формы для добавления нового студента
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nimi'], $_POST['koduleht'], $_POST['hairColor'])) {
    addStudentToXml($_POST['nimi'], $_POST['koduleht'], $_POST['hairColor']);
}

// Функция поиска студентов по цвету волос
function otsingJuusteVarviJargi($paring) {
    global $students;
    $paringVastus = array();
    foreach ($students->student as $student) {
        if (isset($student->hairColor) && strtolower($student->hairColor) === strtolower($paring)) {
            array_push($paringVastus, $student);
        }
    }
    return $paringVastus;
}

// Проверка, была ли отправлена форма поиска
$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['hairColor'])) {
    $searchQuery = $_GET['hairColor'];
    $searchResults = otsingJuusteVarviJargi($searchQuery);
}

// Проверка, была ли нажата кнопка для отображения исходного кода
$showCode = isset($_POST['Click']);
?>

<!-- Форма поиска по цвету волос -->
<h2>Otsi õpilast juuste värvi järgi (Blonde, Brown, Black, Red, Green)</h2>
<form method="get" action="">
    <label for="hairColor">Juuste värv:</label>
    <input type="text" id="hairColor" name="hairColor" placeholder="Näiteks: Blonde" required>
    <input type="submit" value="Otsi">
</form>

<?php if (!empty($searchResults)): ?>
    <h3>Otsingu tulemused:</h3>
    <div class="students-list">
        <table>
            <thead>
            <tr>
                <th>Õpilase nimi</th>
                <th>Juuste värv</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($searchResults as $student): ?>
                <tr>
                    <td>
                        <span class="student-name" data-website="<?= htmlspecialchars($student->website) ?>">
                            <?= htmlspecialchars($student->name) ?>
                        </span>
                    </td>
                    <td><?= htmlspecialchars($student->hairColor) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['hairColor'])): ?>
    <p>Õpilasi valitud juuste värviga ei leitud.</p>
<?php endif; ?>

<!-- Таблица со всеми студентами -->
<div class="students-list">
    <h2>Kõik õpilased</h2>
    <table>
        <thead>
        <tr>
            <th>Õpilase nimi</th>
            <th>Juuste värv</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students->student as $student): ?>
            <tr>
                <td>
                    <span class="student-name" data-website="<?= htmlspecialchars($student->website) ?>">
                        <?= htmlspecialchars($student->name) ?>
                    </span>
                </td>
                <td><?= htmlspecialchars($student->hairColor) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Форма для добавления нового студента -->
<h2>Lisa uus õpilane</h2>
<form method="post" action="">
    <label for="nimi">Nimi: </label>
    <input type="text" name="nimi" id="nimi" required><br><br>
    <label for="koduleht">Koduleht: </label>
    <input type="text" name="koduleht" id="koduleht" required><br><br>
    <label for="hairColor">Juuste värv: </label>
    <input type="text" name="hairColor" id="hairColor" required><br><br>
    <input type="submit" value="Lisa">
</form>

<!-- Форма для отображения исходного кода страницы -->
<form action="" method="post">
    <input type="submit" name="Click" value="Vaadata lehe koodi">
</form>

<?php
// Если была нажата кнопка "Vaadata lehe koodi", показываем исходный код
if ($showCode) {
    echo '<h3>Lehe kood:</h3>';
    echo '<pre>' . htmlspecialchars(file_get_contents(__FILE__)) . '</pre>';
}
?>
