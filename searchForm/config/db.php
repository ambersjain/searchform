<?php
    $server = '127.0.0.1';
    $user = "root";
    $pass = "root";
    $dbname = "rejectioncode";
    $conn = mysqli_connect($server, $user, $pass, $dbname);
    if (!$conn) {
        die("Connection Failed.".mysqli_connect_error());
    }
    ?>

