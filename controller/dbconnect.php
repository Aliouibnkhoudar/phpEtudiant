<?php
    $con = mysqli_connect("localhost","root","","etudiants");

    if (!$con) {
        die("Couldnt connect to".mysqli_connect_error());
    }
?>