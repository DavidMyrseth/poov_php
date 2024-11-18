<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>PHP tunnitööd</title>
    <!-- Подключаем CSS файл -->
    <link rel="stylesheet" href="WorkXML/StudentWeb.css"> <!-- Путь к CSS файлу -->
</head>
<body>

<?php
// Подключаем файл studentsInformation.php
include('studentsInformation.php');
?>

<?php
//päis
include("header.php");
?>

<?php
//navigeeterimismenüü
include("nav.php");
?>

<section>
    <?php
    if (isset($_GET["leht"])) {
        include("kontent/" . $_GET["leht"]);
    } else {
        include("kontent/kodu.php");
    }
    ?>
</section>

<?php
//jalus
include("footer.php");
?>

</body>
</html>
