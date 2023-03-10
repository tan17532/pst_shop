
<header>
   
    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    
    <a href="index.php" class="logo">PST Shop<span>.</span></a>
    <?php  
    session_start();
    include('server.php');

    if(isset($_SESSION['user'])){
        $user_id = $_SESSION['user'];

        $sql = "SELECT username FROM user1 WHERE user_id = '$user_id'";
        $query = mysqli_query($conn, $sql);
        while($user = mysqli_fetch_array($query)){
            $username = $user['username'];
        ?>
    
    <h1 >ยินดีต้อนรับคุณ : <?php echo $username;?></h1>
    <?php } ?>
    <div class="icons">
    <a href="shop.php" class="fas fa-shopping-cart"></a>
        <a href="logout.php" class="fas fa-sign-out-alt"></a>
       
    </div>
    <?php }else{ ?>
        <div class="icons">
            <a href="from/login.php">Sing in</a>
        </div>
        <?php } ?>

</header>

