<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>

    <!-- Custom Style -->
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <?php 
    include_once('nav.php');
    include_once ('server.php'); ?>
</head>
<body>
<section>
                <div class="small-contrainer">
                    <h2 class="title">Shopping Cart (ตะกร้าสินค้า)</h2>
                </div>
            </section>

 <?php 
    //session_start();
    if(empty($_SESSION['user'])){
        header("Refresh: 0; url= login/login.php"); 
    }
    else{
        $name = $_SESSION['user'];

        $orid =  "SELECT * FROM `order1` WHERE username = '$name' AND status = '1'";
        $orname =  mysqli_query($conn, $orid);
        $orderrow = mysqli_num_rows($orname);
        if($orderrow > 0){ ?>
                    <div class="header_fixed">
                        <table>
                            <thead>
                                <tr>
                                    <th>Remove</th>
                                    <th>รหัสสินค้า</th>
                                    <th>Image</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ราคาทั้งหมด</th>
                                </tr>
                            </thead>
                        <tbody>
        <?php
        
        while($idorder = mysqli_fetch_array($orname)){
            $orderid = $idorder['order_id'];
            $cart = "SELECT * FROM cart1 WHERE order_id = '$orderid'";
            $num = mysqli_query($conn, $cart);
            $sum = 0;
            while($cartid = mysqli_fetch_array($num)){ 
                $menu_id = $cartid['menu_id'];
                $qty = $cartid['quantity'];
                $sqlproduct = "SELECT * FROM menu1 WHERE menu_id = '$menu_id'";
                $spro = mysqli_query($conn, $sqlproduct);
                
                while($pro = mysqli_fetch_array($spro)){
                    ?>
                    

                    <div class="header_fixed">
                        <tr>
                            <td align="center"><a href="shopping_del.php?id_menu=<?php echo $pro['menu_id']; ?>&order_id=<?php echo $orderid; ?>" onclick="return ConfirmDelete()"><i class="fas fa-minus-square"></i></a></td>
                            <td align="center"><?php echo $menu_id; ?></td>
                            <td align="center"><img src="images/<?php echo $pro['menu_picture']; ?>" alt="" width= "60px" height="80px"></td>
                            <td align="center"><?php echo $pro['menu_name']; ?></td>
                            <td align="center"><?php echo $pro['menu_price']; ?></td>
                            <td align="center"><?php echo $qty; ?></td> 
                            <?php   $total = $pro['menu_price'] * $qty;
                                    $sum =$sum+$total;
                            ?>
                            <td align="center"><?php echo $total; ?></td>
                        </tr>
                    </div>              
                <?php
                
                }
            }
            ?>
            <div class="header_fixed">
                <tr>
                    <td align="center" colspan = "6">รวมเป็นเงิน</td>
                    <td align="center"><?php echo $sum;?></td>
                </tr>
            </div>
            <?php 
                date_default_timezone_set("Asia/Bangkok");
                $tdate = date("d");
                $tmonth = date("m");
                $tyear = date("Y")+543;
                $ttime = date("H:i a");
                //echo $tdate, $tmonth, $tyear, $ttime;
                $newdate = $tdate."/".$tmonth."/".$tyear;
            ?>
            <div class="font">
            <h3>วันที่&nbsp;<?php echo $newdate;?>&nbsp;&nbsp;&nbsp;เวลา&nbsp;<?php echo $ttime;?></h3>
            </div>
            
            <div class="header_fixed">
                <tr>
                    <td align="center" colspan = "7"><a href="updateorder.php?orid=<?php echo $orderid;?>&odate=<?php echo $newdate;?>&otime=<?php echo $ttime;?>&osum=<?php echo $sum;?>"><button>ส่งคำสั่งซื้อ</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="cancel_del.php?orid=<?php echo $orderid;?>" onclick="return ConfirmCan()"><button>ยกเลิก</button></a></td>
                </tr>
            </div>
            <?php
        }
        
        $row = mysqli_num_rows($orname);
    }else{
        echo '<center style = "font-size: 20px;"><h1>กรุณาสั่งสินค้า</h1></center>';
    }

    }
?>

                    </tbody>
                </table>
            </div>
    
    
            <script>
        function ConfirmDelete(){
            var con = confirm("คุณต้องการลบรายการนี้ใช่หรือไม่?");
            if (con == true){
                return true;
            }else{
                return false;
            }
        }
        function ConfirmCan(){
            var con = confirm("คุณต้องการยกเลิกรายการทั้งหมดใช่หรือไม่?");
            if (con == true){
                return true;
            }else{
                return false;
            }
        }

    </script>

</body>
</html>  