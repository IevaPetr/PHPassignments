<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <div class="forma">
            <form action="1uzd.php" method="get">
                <label for="ilgis">Iveskite virves ilgi:</label><br>
                <input type="number" name="ilgis"><br><br>

                <input type="submit" value="Ivesti"><br><br>
            </form>
        </div>

        <?php
            $virve = $_GET['ilgis'];
            echo "Ivestas virves ilgis: ".$virve."m.";
            echo "<br>";

            $krastine = (int)($virve / 4);
            $plotas = $krastine * $krastine;

            echo "Ploto krastine: ".$krastine."m.";
            echo "<br>";
            echo "Galimas didziausias plotas: ".$plotas."m2.";
            echo "<br>";

            $liekana = $virve - ($krastine * 4);

            echo "Virves likutis: ".$liekana."m.";
            echo "<br>";
        ?>
    </body>
</html>