<?php 
    include_once ('server.php');
    session_start();
    $id = $_GET['idMenu'];
    //echo $_SESSION['user_name'];
    //echo $id;
    if(isset($_SESSION['user'])){
        $name = $_SESSION['user'];
        $orid =  "SELECT * FROM `order1` WHERE username = '$name' AND status = '1'";
        $orname =  mysqli_query($conn, $orid);
        while($idorder = mysqli_fetch_array($orname)){
            $orderid = $idorder['order_id'];
        }
        $row = mysqli_num_rows($orname);
    
        //echo $row;
        if($row > 0 ){
            $pro = "SELECT * FROM cart1 WHERE order_id ='$orderid' AND menu_id ='$id'";
            $promy = mysqli_query($conn, $pro);
            $product = mysqli_fetch_array($promy);
            $prow = mysqli_num_rows($promy);
            if($prow > 0){
                $newqty = $product['quantity']+1 ;
                $qtysql = "UPDATE cart1 SET quantity = '$newqty' WHERE order_id ='$orderid' AND menu_id ='$id'";
                $qty = mysqli_query($conn, $qtysql);
            }

            else{
            $addcart = "INSERT INTO cart1 VALUES ('$orderid', '$id', '1')";
            $oid = mysqli_query($conn, $addcart);
            }
        } 
        else{
            $sqlneworder = "INSERT INTO `order1` (`order_id`, `order_date`, `order_time`, `username`, `total`, `status`) VALUES (NULL, '', '', '$name', '', '1')";
            $neworder = mysqli_query($conn, $sqlneworder);
            $userordersql = "SELECT * FROM `order1` WHERE username = '$name' AND status = '1'";
            $oruser =  mysqli_query($conn, $userordersql);
            $username = mysqli_fetch_array($oruser);
            $newid = $username['order_id'];
            $addcart = "INSERT INTO cart1 VALUES ($newid, '$id', '1')";
            $oid = mysqli_query($conn, $addcart);
        }
        
            header("Refresh: 0; url=index.php"); //ทำให้ไปหน้าที่ต้องการโดยหน่วงเวลาไว้ 1 วินาที
        
    }
?>