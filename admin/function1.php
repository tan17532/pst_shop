<?php 
    function check(){
        if(!isset($_SESSION['user'])){
            echo"<script>alert('กรุณา Login ใหม่'); window.location = '../login.php'</script>";
            exit();
        }
    }
    
?>