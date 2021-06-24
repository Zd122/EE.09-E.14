<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rozgrywki futbolowe</title>

        <link rel="stylesheet" href="styl.css">
    </head>
    <body>

        <div id="banner">
            <h2>Światowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">
        </div>
        <div id="mecze">
        
            <?php
            
                $conn = mysqli_connect("localhost", "root", "", "egzamin");
                $sql = "SELECT `rozgrywka`.`zespol1`, `rozgrywka`.`zespol2`, `rozgrywka`.`wynik`, `rozgrywka`.`data_rozgrywki` FROM `rozgrywka` WHERE `rozgrywka`.`zespol1` = 'EVG'";

                $res = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($res)){
                    echo "<div class='info'>
                        <h3>$row[0] - $row[1]</h3>
                        <h4>$row[2]</h4>
                        <p>w dniu: $row[3]</p>
                    </div>";
                }
            
            ?>

        </div>
        <div id="main">
            <h2>Reprezentacja Polski</h2>
        </div>
        <div id="cont">
            <div class="left">
                <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
                <form action="#" method="POST">
                    <input type="number" name="pozycja">
                    <input type="submit" value="Sprawdź">
                </form>

                    <?php

                        if(isset($_POST["pozycja"])){
                            $pozycja = $_POST["pozycja"];

                            $sql2 = "SELECT `zawodnik`.`imie`, `zawodnik`.`nazwisko` FROM `zawodnik` WHERE `zawodnik`.`pozycja_id` = $pozycja";

                            $res2 = mysqli_query($conn, $sql2);
                            
                            echo "<ul>";
                            while($row2 = mysqli_fetch_row($res2)){
                                echo "<li><p>$row2[0] $row2[1]</p></li>";
                            }
                            echo "</ul>";
                        }

                        mysqli_close($conn);
                    
                    ?>

            </div>
            <div class="right">
                <img src="zad1.png" alt="piłkarz">
                <p>Autor: 01253******</p>
            </div>
        </div>
        
    </body>
</html>