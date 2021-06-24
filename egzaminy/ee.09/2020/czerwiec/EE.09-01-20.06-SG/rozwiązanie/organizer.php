<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Organizer</title>

        <link rel="stylesheet" href="styl6.css">
    </head>
    <body>

        <div id="banner">
            <div class="banner-left">
                <h2>MÓJ ORGANIZER</h2>
            </div>
            <div class="banner-center">
                <form action="#" method="POST">
                    <span>Wpis wydarzenia: </span>
                    <input type="text" name="wpis">
                    <input type="submit" value="ZAPISZ">
                </form>
            </div>
            <div class="banner-right">
                <img src="logo2.png" alt="Mój organizer">
            </div>
        </div>

        <div id="main">

            <?php
            
                $conn = mysqli_connect("localhost", "root", "", "egzamin6");
                $sql = "SELECT `zadania`.`dataZadania`, `zadania`.`miesiac`, `zadania`.`wpis` FROM `zadania` WHERE `zadania`.`miesiac` = 'sierpien'";

                $res = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($res)){
                    echo "<div class='item'><h6>$row[0], $row[1]</h6><p>$row[2]</p></div>";
                }

                if(isset($_POST["wpis"])){
                    $wpis = $_POST["wpis"];
                    $sql3 = "UPDATE `zadania` SET `wpis` = '$wpis' WHERE `zadania`.`dataZadania` = '2020-08-27'";

                    $res3 = mysqli_query($conn, $sql3);
                    if($res3){}
                }
            
            ?>

        </div>

        <div id="footer">

            <?php
            
                $sql2 = "SELECT `zadania`.`miesiac`, `zadania`.`rok` FROM `zadania` WHERE `zadania`.`dataZadania` = '2020-08-01'";

                $res2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_row($res2)){
                    echo "<h1>miesiąc: $row2[0], rok: $row2[1]</h1>";
                }

                mysqli_close($conn);
            
            ?>
            

            <p>Stronę wykonał: 01253******</p>
        </div>
        
    </body>
</html>