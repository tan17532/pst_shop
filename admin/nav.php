	 <?php 
        session_start();
        include('../server.php');
        include('function1.php');
        check();
        $id = $_SESSION['user'];
        $sql = "SELECT username FROM user1 WHERE user_id = '$id'";
        $query = mysqli_query($conn, $sql);
    ?>
    
    
		
			<div class="header-left">
				<a href="all-user.php" class="logo"> <img src="assets/img/admin.png" width="50" height="70" alt="logo"> <span class="logoclass">PST SHOP</span> </a>
				<a href="all-user.php" class="logo logo-small"> <img src="assets/img/admin.png" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			<ul class="nav user-menu">
			<?php 
            	while($result = mysqli_fetch_array($query)){
                	$fullname  = $result['username'];
                ?>
                
            
				<li>
					<div>
						<div class="user-header">
						</div> <a class ="btn btn-primary"  href="../logout.php">Logout</a> </div>
				</li>
			<?php } ?>
			</ul>
			
		
		
		


	
