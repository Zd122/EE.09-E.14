<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portal ogłoszeniowy</title>

        <link rel="stylesheet" href="styl1.css">
    </head>
    <body>

        <div id="banner">
            <h1>Portal Ogłoszeniowy</h1>
        </div>

        <div id="left">
            <h2>Kategorie ogłoszeń</h2>
            <ol>
                <li>Książki</li>
                <li>Muzyka</li>
                <li>Filmy</li>
            </ol>
            <img src="ksiazki.jpg" alt="Kupię / sprzedam książkę">
            <table>
                <tr>
                    <td>Liczba ogłoszeń</td>
                    <td>Cena ogłoszenia</td>
                    <td>Bonus</td>
                </tr>
                <tr>
                    <td>1 - 10</td>
                    <td>1 PLN</td>
                    <td rowspan="3">Sybskrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
                </tr>
                <tr>
                    <td>11 - 50</td>
                    <td>0,80 PLN</td>
                </tr>
                <tr>
                    <td>51 i więcej</td>
                    <td>0,60 PLN</td>
                </tr>
            </table>
        </div>

        <div id="right">
            <h2>Ogłoszenia kategorii książki</h2>
            <?php
            
                $conn = mysqli_connect("localhost", "root", "", "ogloszenia");
                $sql = "SELECT `ogloszenie`.`id`, `ogloszenie`.`tytul`, `ogloszenie`.`tresc` FROM `ogloszenie` WHERE `ogloszenie`.`kategoria` = 1";
            
                $res = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_row($res)){
                    echo "<h3>".$row[0]." ".$row[1]."</h3><p>$row[2]</p>";
                }

                mysqli_close($conn);
            ?>
        </div>

        <div id="footer">
            <p>Portal ogłoszeniowy opracował: 0125*******</p>
        </div>
        
    </body>
</html>