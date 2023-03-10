<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	 <?php 
		include('../server.php');
		if(isset($_POST['pressed'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
			$tel = $_POST['tel'];
            $errors = 0;

            if((empty($username)) OR (empty($password)) OR (empty($tel))){
                echo "<script>alert('กรอกข้อมูลไม่ครบถ้วน กรุณากรอกใหม่อีกครั้ง'); window.location = 'register.php'</script>";
                $errors = $errors+1;
            }

            $newpass = md5($password);

            $sql = "SELECT * FROM user1 WHERE username = '$username' ";
            $query = mysqli_query($conn, $sql);
            $rowss = mysqli_num_rows($query);
            if($rowss>0){
                echo"<script>alert('Username นี้ถูกใช้ไปแล้วกรุณาเปลี่ยนชื่อหรือใช้ชื่ออื่น'); window.location = 'register.php'</script>";
                $errors = $errors+1;
            }

            if($errors==0){
                $sql = "INSERT INTO user1 (username, password, tel) VALUES ('$username' , '$newpass','$tel')";
                $query = mysqli_query($conn, $sql);
                if(!$query){
                    echo"<script>alert('ไม่สามารถเพิ่มข้อมูลได้'); window.location = 'login.php'</script>";
                }else{
                    header('Refresh:0; ../from/login.php');
                }
            }else{
                header('Refresh:1; login.php');
            }
        }

		session_start();

        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $newpass = md5($password);
			$errors = 0;

            if((empty($username)) OR (empty($password))){
                echo "<script>alert('กรุณากรอกข้อมูลกรอกข้อมูลให้ครบถ้วน'); window.location = 'login.php'</script>";
                $errors = $errors+1;
            }

            $lo_sql = "SELECT * FROM user1 WHERE username = '$username' AND password = '$newpass'";
            $lo_query = mysqli_query($conn, $lo_sql);
            if($log = mysqli_fetch_array($lo_query)){
                $user = $log['user_id'];
                $_SESSION['user'] = $user;
                $access = $log['access'];
                if($access == "user"){
                    header('location: ../index.php');
                }else{
                    header('location: ../admin/all-user.php');
                }
            }else{
                echo"<script>alert('Username หรือ Password ไม่ถูกต้องกรุณาเช้าสู่ระบบอีกครั้ง'); window.location = '../from/login.php'</script>";
            }

        }
	?> 
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action = "login.php" method = "post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" >
					<input type="password" name="password" placeholder="Password">
					<input type="text" name="tel" placeholder="Tel">
					
					<button name = "pressed">Sign up</button>
				</form>
			</div>

			<div class="login" >
				<form action="login.php" method = "post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Username" >
					<input type="password" name="password" placeholder="Password">
					<button name = "login">Login</button>
				</form>
				<a href="../index.php"><button>Home</button></a>
			</div>
			
	</div>
</body>
</html>