<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wycieczki i urlopy</title>

        <link rel="stylesheet" href="styl3.css">
    </head>
    <body>

        <div id="banner">
            <h1>BIURO PODRÓŻY</h1>
        </div>
        <div id="cont">
            <div class="left">
                <h2>KONTAKT</h2>
                <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
                <p>telefon: 555666777</p>
            </div>
            <div class="center">
                <h2>GALERIA</h2>
                <?php

                    $conn = mysqli_connect("localhost", "root", "", "egzamin3");
                    $sql = "SELECT `zdjecia`.`nazwaPliku`, `zdjecia`.`podpis` FROM `zdjecia` ORDER BY `zdjecia`.`podpis` ASC;";

                    $res = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_row($res)){
                        echo "<img src='$row[0]' alt='$row[1]'>";
                    }

                ?>
            </div>
            <div class="right">
                <h2>PROMOCJE</h2>
                <table>
                    <tr>
                        <td>Jesień</td>
                        <td>Grupa 4+</td>
                        <td>Grupa 10+</td>
                    </tr>
                    <tr>
                        <td>5%</td>
                        <td>10%</td>
                        <td>15%</td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="data">
            <h2>LISTA WYCIECZEK</h2>
            <?php
            
                $sql1 = "SELECT `wycieczki`.`id`, `wycieczki`.`dataWyjazdu`, `wycieczki`.`cel`, `wycieczki`.`cena` FROM `wycieczki` WHERE `wycieczki`.`dostepna` = TRUE;";
                $res1 = mysqli_query($conn, $sql1);
                
                while($row = mysqli_fetch_row($res1)){
                    echo "$row[0]. $row[1], $row[2], cena: $row[3] <br/>";
                }

                mysqli_close($conn);

            ?>
        </div>
        <div id="footer">
            <p>Stronę wykonał: 0125******* (Kozicki Paweł)</p>
        </div>
        
    </body>
</html>