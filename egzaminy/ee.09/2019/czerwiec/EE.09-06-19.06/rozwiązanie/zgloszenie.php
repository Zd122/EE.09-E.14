<?php

    $ratownicy = $_POST['ratownicy'];
    $dyspozytor = $_POST['dyspozytor'];
    $adres = $_POST['adres'];

    $conn = mysqli_connect("localhost", "root", "", "ratownictwo");
    $sql = "INSERT INTO `zgloszenia` VALUES ('', '$ratownicy', '$dyspozytor', '$adres', 0, NOW())";

    if($res = mysqli_query($conn, $sql));

    mysqli_close($conn);
?>