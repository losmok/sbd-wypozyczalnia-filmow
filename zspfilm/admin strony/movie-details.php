<html>
    <head>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
        <div class="blokGlowny">
    <?php
        include "../includes/header.php";
        $con = new mysqli("127.0.0.1","root","","Projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM film");
        $cos = $res->fetch_all();

        $res5 = $con->query("SELECT * FROM film WHERE film.id=".$_GET["id"]."");
        $cos5 = $res5->fetch_all();

        echo '<h1>Zaawansowane Szczegóły:</h1>
        <div class="details">Nazwa: '.$cos5[0][1].'<br>
        Typ: '.$cos5[0][3].'<br>
        Opis: '.$cos5[0][2].'<br>
        foto </div>';
        echo '<br><a href="../index.php?page=1">Strona Główna</a>';
        echo '<br><br><input name="1" type="submit" value="usun"></a>';
        echo '<br><br><input name="1" type="submit" value="ukryj"></a>';
        
        if($_POST!=null)
            {
            if($_POST["1"]=="usun")
            {
                $sqlquery2 = "DELETE FROM `user_has_film` WHERE `user_has_film`.`film_id` = ".$cos5[0][0]."";
                $con->query($sqlquery2);

                $sqlquery = "DELETE FROM `film` WHERE `film`.`id` = ".$cos5[0][0]."";
                $con->query($sqlquery);
                header('location: ../index.php?page=1');
            }
            if($_POST["1"]=="ukryj")
            {
                $sqlquery3 = "UPDATE `film` SET `widocznosc` = 0 WHERE `film`.`id` = ".$cos5[0][0].";";
                $con->query($sqlquery3);
                header('location: ../index.php?page=1');
            }
        }
        echo '</form>';
    ?>
        </div>
        </center>
    </body>
</html>
