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
    <h1>PHP  tuunitööd</h1>
    <?php
    if(isset($_GET["leht"])) {
        include('kontent/'.$_GET["leht"]);
    } else {
        include('kontent/kodu.php');
    }
    ?>
</section>
    <?php
    include("footer.php");
    ?>
</body>
</html>
