<html>
    <head>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <center>
        <div class="glownylogin">
    <?php
        include "../includes/header.php";
        $con = new mysqli("127.0.0.1","root","","Projekt");
        echo '<form method="POST">';
        $res = $con->query("SELECT * FROM user");
        $cos = $res->fetch_all();

        echo '<h1>Logowanie:</h1>
        <div class="email"><section class="box"><br> Email: <input name="email"></section></div>
        <div class="password"><section class="box"><br> Haslo: <input name="password" type="password"><br></section></div>';
        if($_POST!=NULL)
        {
            for($i=0;$i<count($cos);$i++)
            {
                if($_POST['email']==$cos[$i][4] && $_POST['password']==$cos[$i][3] && $cos[$i][5]==0)
                {
                    $_SESSION["email"] = $_POST['email'];
                    $_SESSION["id"] = $i;
                    echo 'udalo sie zalogowac';
                    header("Location: ../index.php?page=1");
                }
            }
        }
        echo '<section class="box">
        <div class="zaloguj"><input type="submit" value="Zaloguj"></div></section>
        <div class="register"><a href="register.php">Rejestracja</a></div><br><br>
        <a href="../index.php?page=1">Strona Główna</a>';
        echo '</form>';
    ?>
        </div>
        </center>
    </body>
</html>