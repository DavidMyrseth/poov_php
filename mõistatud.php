    <?php
    echo "Mõistaud. Euroopa riik";
    // 6 подсказок при помощи текстовых функций
    // выводить списком <ul> / <ol>
    $riik="";
    echo "<ol>";
    echo "<li>Esimene täht riigis on - ". substr($riik,0,1)."</li>";
    echo "<li>Teine täht on - ".$tekst[1]; "</li>";
    echo "<li>Tähed 3-5, substr($tekst, 2, 5) </li>";
    echo "<li>Teine sõna 2 täht lõpp.substr($tekst[2]) </li>" ;
    //str_replace()
    echo "</ol>";
