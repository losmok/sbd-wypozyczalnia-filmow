<html>
    <head>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
        <div class="glowny">
    <?php
        include "../includes/header.php";
        $con = new mysqli("127.0.0.1","root","","projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        echo '<h1>Dodaj film:</h1>
        <div class="details">Nazwa: <input name="name" value=""><br>
        Opis: <input name="type" value=""><br>
        Typ: <input name="description" value=""><br>
        Zdjęcie </div>';
        echo '<input type="submit">';
        echo '<br><a href="../index.php?page=1">Strona Główna</a>';
        echo '</form>';

        if($_POST!=NULL)
        {
            print_r($_POST);
            if($_POST["name"]!="" && $_POST["type"]!="" && $_POST["description"]!="")
            {
                $sqlquery = "INSERT INTO `film`(name,type,description) VALUES ('".$_POST['name']."', '".$_POST['description']."','".$_POST['type']."');";
                $con->query($sqlquery);
                header('location: ../index.php?page=1');
            }
        }

    ?>
        </div>
        </center>
    </body>
</html>