<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Filmoteka</title>

        <link rel="stylesheet" href="styl3.css">
    </head>
    <body>

        <div id="header">
            <div class="header-1">
                <img src="klaps.png" alt="Nasze filmy">
            </div>
            <div class="header-2">
                <h1>BAZA FILMÓW</h1>
            </div>
            <div class="header-3">
                <form action="#" method="post">
                    <select name="gatunek">
                        <option value="1">Sci-Fi</option>
                        <option value="2">animacja</option>
                        <option value="3">dramat</option>
                        <option value="4">horror</option>
                        <option value="5">komedia</option>
                    </select>
                    <input type="submit" value="Filmy">
                </form>
            </div>
            <div class="header-4">
                <img src="gwiezdneWojny.jpg" alt="szturmowcy">
            </div>
        </div>

        <div id="cont">
            <div class="cont-left">
                <h2>Wybrano filmy:</h2>
                <?php
                
                    $conn = mysqli_connect("localhost", "root", "", "dane");

                    if(isset($_POST['gatunek'])){
                        $gat = $_POST['gatunek'];
                    }else{
                        $gat = 1;
                    }
                    
                    $sql1 = "SELECT `filmy`.`tytul`, `filmy`.`rok`, `filmy`.`ocena` FROM `filmy` WHERE `filmy`.`gatunki_id` = $gat";
                    $res1 = mysqli_query($conn, $sql1);

                    while($row1 = mysqli_fetch_row($res1)){
                        echo "<p>Tytuł: $row1[0], Rok produkcji: $row1[1], Ocena: $row1[2]</p>";
                    }

                ?>
            </div>
            <div class="cont-right">
                <h2>Wszystkie filmy</h2>
                <?php
                    
                    $sql2 = "SELECT `filmy`.`id`, `filmy`.`tytul`, `rezyserzy`.`imie`, `rezyserzy`.`nazwisko` FROM `filmy`, `rezyserzy` WHERE `filmy`.`rezyserzy_id` = `rezyserzy`.`id`;";
                    $res2 = mysqli_query($conn, $sql2);

                    while($row2 = mysqli_fetch_row($res2)){
                        echo "<p>$row2[0]. $row2[1], reżyseria: $row2[2] $row2[3]</p>";
                    }
                
                    mysqli_close($conn);

                ?>
            </div>
        </div>

        <div id="footer">
            <p>Autor: 0125******* (Kozicki Paweł)</p>
            <a href="kwerendy.txt" download>Zapytania do bazy</a>
            <a href="http://filmy.pl/" target="_blank">Przejdź do filmy.pl</a>
        </div>
        
    </body>
</html>