<?php
echo "<h2>AjaFunktsioonid</h2>";
echo "<div id='kuupaev'>";
echo "Täna on ".date("d.m.Y")."<br>";
date_default_timezone_set("Europe/Tallinn");
echo "<strong>";
echo "Täname Tallinna kuupäev ja kellaeg on ".
    date("d.m.Y G:i"), time()."<br>";
echo "</strong>";
echo "date('d.m.Y G:i:s'), time())";
echo "<br>";
echo "d - kuupäev 1-31";
echo "<br>";
echo "m - kuu numbrina 1-12";
echo "<br>";
echo "Y - aasta neljakohane";
echo "<br>";
echo "G - tunniformaat 0-24";
echo "<br>";
echo "i - minutid 0-59";
echo "</div>";
?>
<div id="kuupaev">
    <?php
    $today = new DateTime();
    echo "Täna on ".$today->format("m-d-Y");
    //hooaeg
    $spring = new DateTime("March 20");
    $summer = new DateTime("June 21");
    $fall = new DateTime("September 22");
    $winter = new DateTime("December 21");

    switch (true){
        //kevad
        case ($today>=$spring && $today<$summer):
            echo " Kevad ";
            $pildi_aadress="image/Kevad.jpg";
            break;
        //suvi
        case ($today>=$summer && $today<$fall):
            echo " Suvi ";
            $pildi_aadress="image/Suvi.jpg";
            break;
        //sugis
        case ($today>=$fall && $today<$winter):
            echo " Sügis ";
            $pildi_aadress="image/Sugis.jpg";
            break;
        //Talv
        case ($today>=$winter && $today<$spring):
            echo " Talv ";
            $pildi_aadress="image/Talv.webp";
            break;
    }
    ?>
    <img src="<?=$pildi_aadress?>" alt="Hooajapilt " width="20%">
    </div>
    <div id="koolivaheag">
        <h2>Mitu päeva on koolivahejani 23.12.2024 </h2>
        <?php
        $kdate = date_create_from_format('d.m.Y', '23.12.2024');
        $date = date_create();
        $diff = date_diff($kdate, $date);
        //echo "jääb ". $diff->format("%a")."päeva";
        //echo "<br>";
        echo "Jääb ". $diff->days." päeva ";
        ?>
    </div>

<div id="MinuSünnipäevani">
    <h2>Mitu päeva on MinuSünnipäevani 20.11.2024</h2>
    <?php
    $kdate = date_create_from_format('d.m.Y', '20.11.2024');
    $date = date_create();
    $diff = date_diff($kdate, $date);
    //echo "jääb ". $diff->format("%a")."päeva";
    //echo "<br>";
    echo "Jääb ". $diff->days." päeva ";
    ?>
</div>

<div id="vanus">
    <h2>Kasutaja vanuse leidmine</h2>
    <form method="post" action="">
        Sisesta oma sünnikuupäev
        <input type="date" name="sind" placeholder="dd.mm.yyyy">
        <input type="submit" value="OK">
    </form>
    <?php
    if(isset($_POST["sind"])){
        if(empty($_POST["sind"])) {
            echo "sissesta oma Sünnipäeva kuupäev";
    }
    else {
        $sdate = date_create($_POST["sind"]);
        $date = date_create();
        $diff = date_diff($sdate, $date);
        echo "Sa oled ". $diff->format("%y")." aastat vana";
    }}
    ?>
</div>
<div id="gogo">
    <h2>Massivi abil näidata kuu nimega tänases kuupäevas.</h2>
    <?php

    $kuud = array(
        1 => 'jaanuar',
        2 => 'veebruar',
        3 => 'märts',
        4 => 'aprill',
        5 => 'mai',
        6 => 'juuni',
        7 => 'juuli',
        8 => 'august',
        9 => 'september',
        10 => 'oktoober',
        11 => 'november',
        12 => 'detsember'
    );
    // Проверка, если форма была отправлена
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Получаем выбранный месяц
        $valitud_kuu = $_POST['kuu'];
        echo "<p>Valitud kuu: " . $kuud[$valitud_kuu] . ".</p>";
    }
    ?>
    <!-- Форма для выбора месяца -->
    <form method="POST">
        <label for="kuu">Valige kuu:</label>
        <select name="kuu" id="kuu" required>
            <?php
            // Перебираем все месяцы и создаем выпадающий список
            foreach ($kuud as $number => $month) {
                echo "<option value='$number'>$month</option>";
            }
            ?>
        </select>
        <input type="submit" value="Kinnita">
    </form>
</div>

