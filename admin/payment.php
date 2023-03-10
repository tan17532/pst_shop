<?php
    include_once ('../server.php');
    $oid = $_GET['orderid'];
    $updatesql = "UPDATE `order1` SET `status`='3' WHERE `order_id`='$oid'";
    $stml = mysqli_query($conn, $updatesql);
    header("Refresh: 0; url=order.php"); //ทำให้ไปหน้าที่ต้องการโดยหน่วงเวลาไว้ 1 วินาที
    
?>