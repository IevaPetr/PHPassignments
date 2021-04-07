<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .forma {
            border: solid 3px black;
            width: 300px;
            padding: 20px;
        }

        img {
            width: 70px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class = "forma">
        <form action="1ld2uzd.php" method="get">
            <label for="fname">Iveskite varda:</label><br>
            <input type="text" name="fname"><br><br>

            <!-- type=number svoriui ir vandens kiekiui is karto duoda 
            min ir max reiksmes bei leidzia ivesti tik skaitmenis-->
            <label for="weight">Iveskite svori kg:</label><br>
            <input type="number" name="weight" min="40" max="150"><br><br>

            <label for="water">Kiek stikliniu vandens isgeriate per diena?</label><br> 
            <input type="number" name="water" min="0" max="20"><br><br>

            <input type="submit" value="Ivesti">
        </form>
    </div>
    <br>

    <?php

        $conn = new mysqli('localhost','root','','1laboras');

        $vardas = $_GET['fname'];
        $svoris = $_GET['weight'];
        $vanduo = $_GET['water'];

        if(ctype_alpha($vardas)){ 
            echo "Vardas: ".$vardas;
            echo "<br>";
        }
        else echo "Ivestas netinkamas vardas (su skaitmenimis)<br>";

        //vandeni ir svori galima butu tikrinti ir taip:
        //su ctype_digit tikrintumem ar ivesti tik skaitmenys,
        //su if($svoris>=40 && $svoris<=150) ir
        //if($vanduo>=0 && $vanduo<=20)

        $normaml = $svoris * 0.03 * 1000; //mililitrais
        $normastikl =$normaml / 250; //stiklinemis

        echo "Svoris: ".$svoris;
        echo "<br>";

        echo "Isgeriamo vandens kiekis stiklinemis: ".$vanduo;
        echo "<br>";

        echo "Turetumet isgerti ml: ".$normaml;
        echo "<br>";

        echo "Turetumet isgerti stikliniu: ".$normastikl;
        echo "<br>";

        $truksta = $normastikl - $vanduo;

        $zalia = round($vanduo,0);
        $raudona = round($truksta,0);

        for($i = 0; $i < $zalia; $i++) {
            echo '<img src="zalia.jpg">';
        }

        for($i = 0; $i < $raudona; $i++) {
            echo '<img src="raudona.jpg">';
        }

        $sql = "INSER INTO vanduo (Zmogus, Vardas, Svoris, Stiklines)
        VALUES ('', '$vardas', '$svoris', '$vanduo')";

        mysqli_close($conn);

    ?>
</body>
</html>