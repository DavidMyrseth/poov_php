<?php
// Загрузка XML файла
$students = simplexml_load_file("students.xml");

// Функция для поиска студентов по цвету волос
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
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opilaste nimed ja kodulehed</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Обработчик клика по имени студента
            $(".student-name").on("click", function() {
                window.location.href = $(this).data("website");
            });
        });
    </script>
</head>
<body>

<h1>Opilaste nimed ja kodulehed</h1>

<!-- Форма поиска по цвету волос -->
<h2>Otsi õpilast juuste värvi järgi</h2>
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

</body>
</html>
