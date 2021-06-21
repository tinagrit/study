<?php 

    $servername = "localhost";
    $username = "surang_tinagritstudy";
    $password = "root";
    $dbname = "surang_tinagritstudy";

    // Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 

?>