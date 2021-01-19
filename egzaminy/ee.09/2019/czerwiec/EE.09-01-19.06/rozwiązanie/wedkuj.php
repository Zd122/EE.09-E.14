<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wędkujemy</title>

        <link rel="stylesheet" href="styl_1.css">
    </head>
    <body>

        <div id="banner">
            <h1>Portal dla wędkarzy</h1>
        </div>
        <div id="center">
            <div class="left">
                <h2>Ryby drapieżne naszych wód</h2>

                <ul>
                    <?php
                    
                        $conn = mysqli_connect("localhost", "root", "", "wedkowanie");
                        $sql = "SELECT `ryby`.`nazwa`, `ryby`.`wystepowanie` FROM `ryby` WHERE `ryby`.`styl_zycia` = 1";

                        $res = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_row($res)){
                            echo "<li>$row[0], występowanie: $row[1]</li>";
                        }

                        mysqli_close($conn);
                    
                    ?>
                </ul>

            </div>
            <div class="right">
                <img src="ryba1.jpg" alt="Sum"><br/>
                <a href="kwerendy.txt" download>Pobierz kwerendy</a>
            </div>
        </div>
        <div id="footer">
            <p>Stronę wykonał: 0125******* (Kozicki Paweł)</p>
        </div>

    </body>
</html>