<?php
include_once ('server.php');
    $oid = $_GET['orid'];
    $odate = $_GET['odate'];
    $otime = $_GET['otime'];
    $osum = $_GET['osum'];
    //echo $oid, $odate, $otime, $osum;
    $updatesql = "UPDATE `order1` SET `order_date`='$odate', `order_time`='$otime', `total`='$osum', `status`='2' WHERE `order_id`='$oid'";
    $stml = mysqli_query($conn, $updatesql);
    header("Refresh: 0; url=index.php"); //ทำให้ไปหน้าที่ต้องการโดยหน่วงเวลาไว้ 1 วินาที
    
?>