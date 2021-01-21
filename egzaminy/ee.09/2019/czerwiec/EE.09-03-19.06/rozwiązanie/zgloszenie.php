<?php

    $lowisko = $_POST['lowisko'];
    $data = $_POST['data'];
    $sedzia = $_POST['sedzia'];

    $conn = mysqli_connect("localhost", "root", "", "wedkarstwo");
    $sql = "INSERT INTO `zawody_wedkarskie` VALUES ('', '0', '$lowisko', '$data', '$sedzia')";

    if(mysqli_query($conn, $sql)){}

?>