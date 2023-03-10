<?php 
    include('../server.php');
    $user_id = $_GET['userid'];
    $sql ="DELETE FROM user1 WHERE user_id = $user_id ";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('location: all-user.php');
    }else{
        echo"ไม่สามารถเพิ่มฐานข้อมูลได้".myslqi_error($conn);
    }
    mysqli_connect($conn);
?>

