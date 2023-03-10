<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "pst_shop";

    $conn = mysqli_connect($host,$user,$pass,$dbname);

    if(!$conn){
        echo"not connecting".mysqli_connect_error();
    }

?>