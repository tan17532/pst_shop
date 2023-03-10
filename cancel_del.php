<?php 
    include ('server.php');

            $delorder = $_GET['orid'];
            $del = "DELETE from cart1 WHERE order_id = '$delorder'";
            $delsql = mysqli_query($conn, $del);

             $dorder = "DELETE from `order1` WHERE order_id = '$delorder'";
            $dsql = mysqli_query($conn, $dorder);
            header("Refresh: 0; url=index.php"); //ทำให้ไปหน้าที่ต้องการโดยหน่วงเวลาไว้ 1 วินาที
        
    
?>
