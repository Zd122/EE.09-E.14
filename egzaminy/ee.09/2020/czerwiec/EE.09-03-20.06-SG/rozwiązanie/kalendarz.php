<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mój kalendarz</title>

        <link rel="stylesheet" href="styl5.css">
    </head>
    <body>

        <div id="banner">
            <div class="banner-left">
                <img src="logo1.png" alt="Mój kalendarz">
            </div>
            <div class="banner-right">
                <h1>KALENDARZ</h1>
                <?php
                
                    $conn = mysqli_connect("localhost", "root", "", "egzamin5");
                    $sql1 = "SELECT `zadania`.`miesiac`, `zadania`.`rok` FROM `zadania` WHERE `zadania`.`dataZadania` = '2020-07-01'";
                    $res1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_row($res1);

                    echo "miesiąc: $row1[0], rok: $row1[1]";
                
                ?>
            </div>
        </div>

        <div id="cont">
            <?php

                if(isset($_POST['wpis'])){
                    $wpis = $_POST['wpis'];
                    $sql3 = "UPDATE `zadania` SET `wpis` = '$wpis' WHERE `zadania`.`dataZadania` = '2020-07-13'";
                    if(mysqli_query($conn, $sql3));
                }
            
                $sql2 = "SELECT `zadania`.`dataZadania`, `zadania`.`wpis` FROM `zadania` WHERE `zadania`.`miesiac` = 'lipiec'";
                $res2 = mysqli_query($conn, $sql2);

                while($row2 = mysqli_fetch_row($res2)){
                    echo "<div class='cont-item'>
                        <h5>$row2[0]</h5>
                        <p>$row2[1]</p>
                    </div>";
                }

                mysqli_close($conn);
            
            ?>
        </div>

        <div id="footer">
            <form action="#" method="POST">
                <span>dodaj wpis: </span>
                <input type="text" name="wpis">
                <input type="submit" value="DODAJ">
            </form>
            <p>Stronę wykonał: 0125******* (Kozicki Paweł)</p>
        </div>
        
    </body>
</html>