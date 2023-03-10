<?php 
    include_once ('../server.php');
    $id = $_POST['orid'];
    $ordersql = "UPDATE `order1` SET `status`='0' WHERE `order_id`='$id'";
    $stml = mysqli_query($conn, $ordersql);
    header("Refresh: 0; url=order.php"); //ทำให้ไปหน้าที่ต้องการโดยหน่วงเวลาไว้ 1 วินาที";
?>