    <?php
    echo "Tere hoomikust!";
    echo "<br>";
    $muutuja='PHP on skriptikeel';
    echo "<strong>";
    echo $muutuja;
    echo "<strong>";
    echo "<br>";
    // Tekstifunktsioonid
    echo "<h2>Tekstifunktsioonid</h2>";
    $tekst="Esmaspäev on 4.november";
    echo $tekst;
    echo "<br>";
    // kõik tähed on suured
    echo "<br>";
    echo mb_strtoupper($tekst);
    echo "<br>";
    echo strtoupper($tekst);
    // kõik tähed on väiksed
    echo "<br>";
    echo strtolower($tekst);
    echo "<br>";
    // liiga sõna algab suure tähega
    echo ucwords($tekst);
    echo "<br>";
    // teksti piikus
    echo "Teksti pikkus:".strlen($tekst);
    echo "<br>";
    // eraldame esimsed 5 tähte
    echo "Esimesed 5 tähte - ".substr($tekst,0,5);
    // leiame on positsiooni
    $otsin='on';
    echo "On asukoht lauses on ". strpos($tekst,$otsin);
    echo "<br>";
    // eralda esimine sõna kuni $otsin
    echo substr($tekst,0, strpos($tekst,$otsin));
    echo "<br>";

    // eralde peale esimest sõna, alates "on"
    echo substr($tekst,strpos($tekst,$otsin));
    echo "<br>";
    echo "<h2>Kastume veebis kesutavaid näidised</h2>";
    //https://www.metshein.com/unit/php-tekstifunktsioonid-ulesanne-9/
    // sõnade arv lauses
    echo "sõnade arv lauses - ".str_word_count($tekst);
    // teksti kärpimine
    echo "<br>";
    $tekst2 = 'Põhitoestus võetakse ära 11.11 kui võlgnevused ei ole parandatus';
    echo trim($tekst2, 'P, t..k');
