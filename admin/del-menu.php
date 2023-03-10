<?php 
    include('../server.php');
    $event_id = $_GET['menuid'];
    $sql ="DELETE FROM menu1 WHERE menu_id = $event_id ";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('location: all-menu.php');
    }else{
        echo"ไม่สามารถเพิ่มฐานข้อมูลได้".myslqi_error($conn);
    }
    mysqli_connect($conn);
?>

