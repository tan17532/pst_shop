<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>PST SHOP</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="assets/css/style.css"> 
</head>

<body>
	<?php include('../server.php');
	$x = 0; ?>

	<div class="main-wrapper">
		<div class="header">
			<?php include('nav.php');?>
		</div>
		<div class="sidebar" id="sidebar">
			<?php include('sidebar.php');?>
		</div>
			<div class="page-wrapper">
				<div class="content container-fluid">
					<div class="page-header">
					
						<div class="row align-items-center">
							<div class="col">
							<div class="top-nav-search" style = "margin-top : 35px;">
							
							</div>
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">ลำดับการสั่งซื้อ</h4>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class=" table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>เลขที่สั่งซื้อ</th>
												<th>ผู้สั่ง</th>
												<th>จำนวนชิ้น</th>
												<th>รับคำสั่งซื้อ</th>
											</tr>
										</thead>
										<tbody>
                                        <?php 
                 $order = "SELECT * FROM `order1` WHERE status = '2'  ";
                 $torder = mysqli_query($conn , $order);
                    while($q = mysqli_fetch_array($torder)){
                        $showq = $q['order_id'];
                        $showu = $q['username'];
                        $shows = $q['status'];
                        $showsql = "SELECT * FROM cart1 where order_id ='$showq'";
                        $show = mysqli_query($conn, $showsql);
                        $showrow = mysqli_num_rows($show);
                       
                ?>
                    <tr>
                        <td><?php echo $showq;?></td>
                        
                        <td><?php echo $showu;?></td>
                        <td><?php echo $showrow;?></td>
                        <!--<td><?php //echo $shows;?></td>-->
                        <td><a href="order.php?id=<?php echo $showq;?>"><i class="fas fa-shopping-cart fa-2x"></i></a></td>
                    </tr>
                    <?php
                    }
                ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            
		</div>


        <div class="page-wrapper" style = "margin-top: -25%;">
			<div class="content container-fluid">
				<div class="page-header">
					
					<div class="row align-items-center">
						<div class="col">
						<div class="top-nav-search" style = "margin-top : 35px;">
								
							</div>
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">รายละเอียดการสั่งซื้อ</h4>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				<div class="row" >
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
                                <?php 
                                    if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $cid=$id;
                                    $corder = "SELECT * FROM `order1` WHERE order_id='$cid'";
                                    $detailorder = mysqli_query($conn , $corder);
                                    $data=mysqli_fetch_array($detailorder);
                                    //echo $data['order_id']."/".$data['status'];
                                    $name = $data['username'];
                                    $O_id = $data['order_id'];
                                    $O_stt = $data['status'];
                                    $usersql = "SELECT tel FROM user1 WHERE username='$name'";
                                    $userstm = mysqli_query($conn, $usersql);
                                    $phon=mysqli_fetch_array($userstm);
                    ?>
									<table class="table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>รหัสสินค้า</th>
												<th>Name</th>
												<th>จำนวน</th>
												<th>ราคา</th>
												
											</tr>
										</thead>
										<tbody>
                                        <?php
                            $cartsql = "SELECT * FROM cart1 WHERE order_id='$O_id'";
                            $cartstm = mysqli_query($conn, $cartsql);
                            $sum = 0;
                            while($cart=mysqli_fetch_array($cartstm)){
                                
                                $proid = $cart['menu_id'];
                                $qty = $cart['quantity'];
                                $productsql = "SELECT * FROM menu1 WHERE menu_id='$proid'";
                                $productstm = mysqli_query($conn, $productsql);
                                while($product=mysqli_fetch_array($productstm)){
                                    $total = 0;
                                    $pname = $product['menu_name'];
                                    $pprice = $product['menu_price'];
                                    $total = $pprice*$qty;
                                    $sum = $sum+$total;
                                 ?>
                                 <tr>
                                     <td><?php echo $proid;?></td>
                                     <td><?php echo $pname;?></td>
                                     <td><?php echo $qty;?></td>
                                     <td><?php echo $total;?></td>
                               
                                 </tr>
                               
                                 <?php
                             }
                            
                            }
                            ?>
                            <tr>
                                <td colspan = '3' align = 'right'>รวมสุทธิ</td>
                                <td><?php echo $sum;?></td>
                            </tr> 
                            			</tbody>
									</table>
                                    <?php if($O_stt=='2'){?>
                                        <a href="payment.php?orderid=<?php echo $O_id;?>"><button class="btn btn-info float-center ">ชำระเงิน</button></a>
                                        <a href="cancel.php?orderid=<?php echo $O_id;?>?>" onclick="return ConfirmDelete()"><button class="btn btn-danger float-center " >ยกเลิก</button></a>
                       <?php } 
                            ?>

                                    
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php } ?>
                    
	</div>
	<script>
        function ConfirmDelete(){
            var con = confirm("คุณต้องการยกเลิกรายการนี้ใช่หรือไม่?");
            if (con == true){
                return true;
            }else{
                return false;
            }
        }

    </script>
	<script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/datatables.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/plugins/raphael/raphael.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>