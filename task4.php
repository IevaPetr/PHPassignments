<!DOCTYPE HTML>
<HTML>
<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<TITLE>LD2 2 uzd ivedimas</TITLE>
</HEAD>
<BODY>

    <p>Iveskite knygos duomenis: </p>

    <form action="" method="post">
    <pre>
        Autoriaus ID
        <input type="number" name="id" id="">
        Autoriaus vardas
        <input type="text" name="fname" id="">
        Autoriaus pavardė
        <input type="text" name="lname" id="">
        Knygos pavadinimas
        <input type="text" name="title" id="">
        Leidimo metai
        <input type="number" name="published" id="">
        Leidykla
        <input type="text" name="publisher" id="">
        Isbn
        <input type="number" name="isbn" id="">
        Puslapių skaičius
        <input type="number" name="pages" id="">

        <input type="submit" value="OK">
    </pre>
    </form>

    <?php
        $id = $_POST['id'];
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $pav = $_POST['title'];
        $year = $_POST['published'];
        $leid = $_POST['publisher'];
        $isbn = $_POST['isbn'];
        $psl = $_POST['pages'];

        $connect = mysqli_connect('localhost','root','','library');
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo 'Sekmingai prisijungta prie duomenu bazes <br><br>';

        $sql1 = "INSERT INTO author (id, fname, lname) VALUES ('$id', '$fn', '$ln');";
        if (mysqli_query($connect, $sql1)) {
            echo 'Sekmingai pridetas autorius <br>';
        }
        else {
            echo 'Error: ' . $sql1 . '<br>' . mysqli_error($connect);
        }

        $sql2 = "INSERT INTO books (title, published, publisher, isbn, pages, aid) VALUES ('$pav', '$year', '$leid', '$isbn', '$psl', '$id');";
        if (mysqli_query($connect, $sql2)) {
            echo 'Sekmingai prideta knyga';
        }
        else {
            echo 'Error: ' . $sql2 . '<br>' . mysqli_error($connect);
        }
        
        mysqli_close($connect);
    ?>		
</body>
</HTML>