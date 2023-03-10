<?php 
    include('../server.php');
    $user_id = $_POST['userid'];
    $user_name = $_POST['username'];
    $user_tel = $_POST['tel'];
    $user_access = $_POST['access'];

    $sql = "UPDATE user1 SET username ='$user_name',  tel = '$user_tel', access = '$user_access' WHERE user_id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        header('location: all-user.php');
    }else{
        echo "ไม่สามารถเปลี่ยนแปลงข้อมูลได้".mysqli_error($conn);
    }
?>