<?php 
    include('../server.php');
    $name = $_POST['name'];
    $name_eng = $_POST['eng'];
    $price = $_POST['price'];
    $file = $_FILES['file'];

    

    
    if($file['error'] == 0){
        $rename = time();
        $typeitem = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $dirpicturePC = "../images/$rename.$typeitem"; 
        $dirpictodb = "$rename.$typeitem";
        move_uploaded_file($file['tmp_name'],$dirpicturePC);
        $sql = "INSERT INTO menu1(menu_name,menu_eng,menu_price,menu_picture) VALUES ('$name','$name_eng','$price','$dirpictodb') ";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('location: all-menu.php');
        }
    }

?>