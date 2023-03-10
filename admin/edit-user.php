<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>PST SHOP</title>



<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

<link rel="stylesheet" href="assets/css/feathericon.min.css">
<link rel="stylesheet" href="assets/plugins/morris/morris.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<?php 
	include('../server.php');
	$userId = $_GET['userId'];
	$x = $_GET['num'];
	$usql = "SELECT * FROM user1 WHERE user_id = $userId";
        $uquery = mysqli_query($conn, $usql);
        while($user = mysqli_fetch_array($uquery)){
            $user_id = $user['user_id'];
            $user_name = $user['username'];
            $user_tel = $user['tel'];
            $user_access = $user['access'];
?>
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
<h3 class="page-title mt-5">Edit User</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<form action = "edit-usersave.php" method = "post">
<div class="row formtype">
<div class="col-md-4">
<div class="form-group">
<label>No.</label><br>
<label><?php echo $x;?></label>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Username</label>
<input type="text" class="form-control" name="username" value="<?php echo $user_name;?>">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label>Phone Number</label>
<input type="text" class="form-control" name="tel" value="<?php echo $user_tel;?>">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Access</label>
<select class="form-control" name="access">
<?php if($user_access == "admin"){?>
	<option value="<?php echo $user_access;?>"><?php echo $user_access;?></option>
    <option value="user">user</option>
    <?php } else{ ?>
    <option value="<?php echo $user_access;?>"><?php echo $user_access;?></option>
    <option value="admin">admin</option>
    <?php } ?>
</select>
</div>
</div>
<button class="btn btn-primary buttonedit">Save</button>
<input type="hidden" name="userid" value="<?php echo $user_id;?>">
</form>
</div>
</div>

</div>
</div>

</div>
<?php } ?>

<script src="assets/js/jquery-3.5.1.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/select2.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>

<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>