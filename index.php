<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>PHP  tuunitööd</title>
    <link rel="stylesheet" href="style/stylesheet.css"></link>
</head>
<body>
<header>
    <h1>PHP  tuunitööd</h1>
</header>
<?php
include("nav.php");
?>
<section>
    <?php
    if(isset($_GET["Lleht"])) {
        include('kontent/'.$_GET["Lleht"]);
    } else {
        echo "Tere tulemast!";
    }
    ?>
</section>
<?php
echo "David Myrseth &copy;";
echo date("Y");
?>
</body>
</html>
