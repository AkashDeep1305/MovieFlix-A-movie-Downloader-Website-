<?php
    $servername = "localhost";
    $username = "root";
    $email = "root";
    $password = "";
    $dbname = "movieflix";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

?>
