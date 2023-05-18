<?php
    $servername = "localhost";
    $username = "test";
    $password = "test";
    $dbname = "mydb";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }
?>