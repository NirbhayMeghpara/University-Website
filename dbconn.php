<?php
    $conn = mysqli_connect("localhost", "root", "", "university");
    if(!$conn){
        die("Database Connection Failed!".mysqli_connect_error());
    }
?>