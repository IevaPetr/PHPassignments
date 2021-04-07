<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
            $pirmas = rand (10, 99);
            $antras = rand (10, 99);
            $trecias = rand (10, 99);
            $failas = fopen("failas.txt","a+") or die("Negalima atidaryti failo");
            $pirm10 = $pirmas * 10;
            $antr10 = $antras * 10;
            $trec10 = $trecias * 10;

            echo "Pirmas skaicius: ".$pirmas;
            echo "<br>";
            echo "Antras skaicius: ".$antras;
            echo "<br>";
            echo "Trecias skaicius: ".$trecias;
            echo "<br><br>";

            fwrite($failas,"Pirmas skaicius: $pirmas\n");
            fwrite($failas,"Antras skaicius: $antras\n");
            fwrite($failas,"Trecias skaicius: $trecias\n");

            $vidurkis = round((($pirmas + $antras + $trecias) / 3),2);

            echo "Skaiciu vidurkis: ".$vidurkis;
            echo "<br><br>";

            fwrite($failas,"Skaiciu vidurkis: $vidurkis\n");

            if($pirmas > $antras && $pirmas > $trecias){
                echo "Didziausias skaicius: ".$pirmas;
                echo "<br>";
                fwrite($failas,"Didziausias skaicius: $pirmas\n");
            }
            else if($antras > $pirmas && $antras > $trecias){
                echo "Didziausias skaicius: ".$antras;
                echo "<br>";
                fwrite($failas,"Didziausias skaicius: $antras\n");
            }
            else{
                echo "Didziausias skaicius: ".$trecias;
                echo "<br>";
                fwrite($failas,"Didziausias skaicius: $trecias\n");
            }

            echo "<br>";

            if($pirmas < $antras && $pirmas < $trecias){
                echo "Maziausias skaicius padidintas 10 kartu: ".$pirm10;
                echo "<br>";
                fwrite($failas,"Maziausias skaicius padidintas 10 kartu: $pirm10\n");
            }
            else if($antras < $pirmas && $antras < $trecias){
                echo "Maziausias skaicius padidintas 10 kartu: ".$antr10;
                echo "<br>";
                fwrite($failas,"Maziausias skaicius padidintas 10 kartu: $antr10\n");
            }
            else{
                echo "Maziausias skaicius padidintas 10 kartu: ".$trec10;
                echo "<br>";
                fwrite($failas,"Maziausias skaicius padidintas 10 kartu: $trec10\n");
            }
            
            echo "<br>";

        ?>
    </body>
</html>