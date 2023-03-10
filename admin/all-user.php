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
								<form action = "all-user.php" method = "post">
									<input type="text" class="form-control" placeholder="Search here" name="search">
									<button class="btn" type="submit" name = "keyword"><i class="fas fa-search"></i></button>
								</form>
							</div>
							<div class="mt-5">
								<h4 class="card-title float-left mt-2">User</h4>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>No.</th>
												<th>Username</th>
												<th>Tel.</th>
												<th>Access</th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											if(isset($_POST['keyword'])){
												$search = $_POST['search'];
												$sql = "SELECT * FROM user1 WHERE (username LIKE '%".$search."%')";
											}
											else{    
											$sql = "SELECT * FROM user1";
											
											}
											
											$query = mysqli_query($conn, $sql);
												while($user = mysqli_fetch_array($query)){
													$user_id = $user['user_id'];
													$user_name = $user['username'];
													$user_tel = $user['tel'];
													$user_access = $user['access'];
													$x++
											?>
											<tr>
												<td><?php echo $x;?></td>
												<td><?php echo $user_name;?></td>
												<td><?php echo $user_tel;?></td>
												
												<td>
													<div class="actions"> <a href="#" class="btn btn-sm bg-success-light mr-2"><?php echo $user_access;?></a> </div>
												</td>
												<td class="text-right">
													
														<div > <a class="dropdown-item" href="edit-user.php?userId=<?php echo $user_id;?>&num=<?php echo $x;?>"><i class="btn btn-primary fas fa-pencil-alt m-r-5">Edit</i> </a> <a  href="del-user.php?userid=<?php echo $user_id;?>"  onclick="return ConfirmDelete()"><i class="btn btn-primary fas fa-trash-alt m-r-5"> Delete</i></a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- <div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<?php 
					$userId = $_GET['userId'];
					$usersql = "SELECT * FROM user1 WHERE id = '$userId'";
					$userquery = mysqli_query($conn, $usersql);
					while($usern = mysqli_fetch_array($userquery)){
						$fullname = $usern['fullname'];
				?>
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> 
							<h3 class="delete_class">คุณต้องการลบคนนี้ใช่หรือไม่?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div> -->
		</div>
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