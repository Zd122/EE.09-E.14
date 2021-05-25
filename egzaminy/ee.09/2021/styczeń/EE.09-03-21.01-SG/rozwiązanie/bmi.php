<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Twoje BMI</title>

        <link rel="stylesheet" href="styl3.css">
    </head>
    <body>

        <div id="header">
            <div class="logo">
                <img src="wzor.png" alt="wzór BMI">
            </div>
            <div class="banner">
                <h1>Oblicz swoje BMI</h1>
            </div>
        </div>

        <div id="cont">
            <table>
                <tr>
                    <th>Interpretacja BMI</th>
                    <th>Wartość minimalna</th>
                    <th>Wartość maksymalna</th>
                </tr>

                <?php
                
                    $conn = mysqli_connect("localhost", "root", "", "egzamin");
                    $sql = "SELECT `bmi`.`informacja`, `bmi`.`wart_min`, `bmi`.`wart_max` FROM `bmi`";

                    $res = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_row($res)){
                        echo "<tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                             </tr>";
                    }
                
                ?>
            </table>
        </div>

        <div id="main">
            <div class="left">
                <h2>Podaj Podaj wagę i wzrost</h2>
                <form action="#" method="POST">
                    <span>Waga: </span> <input name="weight" type="number" min="1"><br/>
                    <span>Wzrost w cm: </span> <input name="height" type="number" min="1"><br/>
                    <input type="submit" value="Oblicz i zapamiętaj wynik">

                    <?php

                        if(isset($_POST['weight']) || isset($_POST['height'])){
                            $weight = $_POST['weight'];
                            $height = $_POST['height'];
    
                            $bmi = $weight / ($height * $height) * 10000;

                            echo "<p>Twoja waga: $weight; Twój wzrost: $height<br/>BMI wynosi: $bmi</p>";

                            if($bmi >= 0 && $bmi <= 18){
                                $info = 1;
                            }else if($bmi >= 19 && $bmi <= 25){
                                $info = 2;
                            }else if($bmi >= 26 && $bmi <= 30){
                                $info = 3;
                            }else if($bmi >= 31 && $bmi <= 100){
                                $info = 4;
                            }

                            $date = date("Y-m-d");

                            $sql2 = "INSERT INTO `wynik` VALUES (NULL, '$info', '$date', '$bmi');";

                            $res2 = mysqli_query($conn, $sql2);

                            if($res2);

                        }
                    
                    ?>

                </form>
            </div>
            <div class="right">
                <img src="rys1.png" alt="ćwiczenia">
            </div>
        </div>

        <div id="footer">
            <p>Autor: 0125******* <a href="kwerendy.txt">Zobacz kwerendy</a></p>
        </div>
        
    </body>
</html>