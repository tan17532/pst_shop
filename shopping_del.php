<?php
    include_once('server.php');
    
    $id = $_GET['id_menu'];  
    $orid = $_GET['order_id'];
       
    //echo $id;
        
    $sql = "DELETE  from cart1 WHERE order_id = '$orid' AND menu_id ='$id'";
    $query = mysqli_query($conn, $sql);
    if($query){
        header("Refresh: 0; url=shop.php"); //ทำให้ไปหน้าที่ต้องการโดยหน่วงเวลาไว้ 1 วินาที
    }else{
        echo "ไม่สามารถลบข้อมูลในฐานข้อมูลได้".mysqli_error($conn);
    }
    mysqli_close($conn);
    


?>
