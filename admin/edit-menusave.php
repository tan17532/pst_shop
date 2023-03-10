<?php 
    include('../server.php');
    $menuId = $_POST['menuId'];
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
        $sql = "UPDATE menu1 SET menu_name ='$name', menu_eng = '$name_eng', menu_price = '$price' , menu_picture = '$dirpictodb'  WHERE menu_id = '$menuId'";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('location: all-menu.php');
        }
    }else{
        $sql = "UPDATE menu1 SET menu_name ='$name', menu_eng = '$name_eng', menu_price = '$price' WHERE menu_id = '$menuId'";
        $query = mysqli_query($conn, $sql);
        if($query){
            header('location: all-menu.php');
        }
    }

?>