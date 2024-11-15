<?php
// Загружаем данные из XML
$students = simplexml_load_file('students.xml');

// Получаем информацию о студенте по ID
$studentId = $_GET['id'] ?? null;
$student = null;

foreach ($students->student as $index => $s) {
    if ('student' . $index === $studentId) {
        $student = $s;
        break;
    }
}

if (!$student) {
    echo "Student not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            text-align: center;
        }
        .back-link {
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            color: #007bff;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1><?php echo $student->name; ?></h1>
    <p><strong>Website:</strong> <a href="<?php echo $student->website; ?>" target="_blank"><?php echo $student->website; ?></a></p>
    <p><strong>Gender:</strong> <?php echo $student->gender; ?></p>
    <p><strong>Age:</strong> <?php echo $student->age; ?></p>
    <p><strong>Group:</strong> <?php echo $student->group; ?></p>
    <p><strong>Hair Color:</strong> <?php echo $student->hairColor; ?></p>

    <div class="back-link">
        <a href="index.php">Back to student list</a>
    </div>
</div>
</body>
</html>