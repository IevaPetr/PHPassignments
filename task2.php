<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .forma {
            border: solid 3px black;
            width: 180px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class = "forma">
        <form action="1ld1uzd.php" method="get">
            <label for="fname">Iveskite varda:</label><br>
            <input type="text" name="fname"><br><br>

            <label for="lname">Iveskite pavarde:</label><br>
            <input type="text" name="lname"><br><br>

            <!-- asmens kodui type=number leis ivesti tik skaicius, 
            min ir max apribojimai uzikrins kad bus ivesti 11 zenklu-->
            <label for="pcode">Iveskite asmens koda:</label><br> 
            <input type="number" name="pcode" min="10000000000" max="99999999999"><br><br>

            <input type="submit" value="Ivesti">
        </form>
    </div>
    <br>

    <?php

        $failas = fopen("failas.txt","a+") or die("Negalima atidaryti failo");
        $vardas = $_GET['fname'];
        $pavarde = $_GET['lname'];
        $kodas = $_GET['pcode'];

        if(ctype_alpha($vardas)){ 
            echo "Vardas: ".$vardas;
            echo "<br>";
            fwrite($failas,"Vardas: $vardas\n");
        }
        else echo "Ivestas netinkamas vardas (su skaitmenimis)<br>";

        if(ctype_alpha($pavarde)){ 
            echo "Pavarde: ".$pavarde;
            echo "<br>";
            fwrite($failas,"Pavarde: $pavarde\n");
        }
        else echo "Ivesta netinkama pavarde (su skaitmenimis)<br>";

        //asmens koda galima butu tikrinti ir taip:
        //su ctype_digit tikrintumem ar ivesti tik skaitmenys,
        //su if($kodas>=10000000000 && $kodas<=99999999999) tikrintumem
        //ar vienuolikos skaitmenu

        $lytis = substr($kodas, 0, 1); //pirmas asmens kodo numeris uzkoduoja lyti ir gimimo simtmeti

        if($lytis % 2 == 0){ //lyginis pirmas skaicius - vyras, nelyginis - moteris
            echo "Lytis: moteris<br>";
            fwrite($failas,"Lytis: moteris\n");
        }
        else{
            echo "Lytis: vyras<br>";
            fwrite($failas,"Lytis: vyras\n");
        }
        $metai = substr($kodas, 1, 2); //is asmens kodo paima gimimo data
        $menuo = substr($kodas, 3, 2);
        $diena = substr($kodas, 5, 2);

        //pirmas kodo skaitmuo nusako gimimo simtmeti
        if($lytis == 1 || $lytis == 2){ //1 ir 2 - XIXa.
            echo "Gimimo data: 18".$metai;
            fwrite($failas,"Gimimo data: 18$metai");
        }
        else if($lytis == 3 || $lytis == 4){ //3 ir 4 - XXa.
            echo "Gimimo data: 19".$metai;
            fwrite($failas,"Gimimo data: 19$metai");
        }
        else{
            echo "Gimimo data: 20".$metai; //5 ir 6 - XXIa.
            fwrite($failas,"Gimimo data: 20$metai");
        }

        echo "-".$menuo;
        echo "-".$diena;
        echo "<br>";
        fwrite($failas,"-$menuo-$diena\n");

        //visada false, nes ima gimimo metu du paskutinius skaicius,
        //nezinau kaip prijungti auksciau esanti if'a
        var_dump(checkdate($menuo, $diena, $metai)); 

        fclose($failas);

    ?>
</body>
</html>