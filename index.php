<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PST Shop.</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php 
    include('server.php');
    include('nav.php');
?>
<!-- header section starts  -->



<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>PST Advance Engineerng</h3>
        <span>Computer & Hardware</span>
        <p>ร้านจำหน่ายชิ้นส่วนอุปกรณ์คอมพิวเตอร์ประกอบ (PST Shop) ทั้ง Computer Hardware CPU Mainboard RAM SSD การ์ดจอ Case Monitor Harddisk สำหรับประกอบคอม จัดสเปคคอมให้ตรงตามการใช้งาน และอุปกรณ์คอมพิวเตอร์เสริมต่างๆ ในราคาสุดคุ้มหลากหลายประเภทจากแบรนด์ดัง เพื่อใช้งานในกลุ่ม คอมพิวเตอร์เล่นเกม คอมพิวเตอร์ทำงาน ออฟฟิศ คอมพิวเตอร์สำหรับตัดต่อวิดีโอ คอมพิวเตอร์สำหรับงานสตรีมมิ่ง ของแท้ มีบริการหลังการขายเพื่อให้คุณมั่นใจในการใช้งาน</p>
        <a href="#" class="btn">shop now</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->



<!-- about section ends -->

<!-- icons section starts  -->


<!-- icons section ends -->

<!-- prodcuts section starts  -->


<section class="products" id="products">

    <h1 class="heading"> สินค้า <span>(Menu)</span> </h1>

    <div class="box-container">
    <?php 
    $sql = "SELECT * FROM menu1";
    $query = mysqli_query($conn, $sql);
    while($menu = mysqli_fetch_array($query)){
        $menu_id = $menu['menu_id'];
        $name = $menu['menu_name'];
        $eng = $menu['menu_eng'];
        $price = $menu['menu_price'];
        $pic = $menu['menu_picture'];

    ?>
        <div class="box">
            <span class="discount">New</span>
            <div class="image">
                <img src="images/<?php echo $pic;?>" alt="">
                         <?php 
                        if(isset($_SESSION['user'])){ ?> 
                        <div class="icons">
                                <a href="insert_cart.php?idMenu=<?php echo $menu_id; ?>" class="cart-btn">add to cart</a>
                        </div>
                        <?php }else { ?> 
                        <div class="icons">
                            <a href="from/login.php" class="cart-btn">add to cart</a>
                        </div>
                        <?php } ?>

            </div>
            <div class="content">
                <h3><?php echo $name;?> (<?php echo $eng;?>)</h3>
                <div class="price"> <?php echo $price;?> บาท</div>
            </div>
        </div>

        <?php } ?>


    </div>

</section>


<!-- prodcuts section ends -->

<!-- review section starts  -->

<section class="review" id="review">

<h1 class="heading">  ผู้ดูแลระบบ <span>System Administrator</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="user">
            <img src="images/pic-1.png" alt="">
            <div class="user-info">
                <h3>Mr.Arnon Jamnong</h3>
                <span>นายอานนท์ จำนง</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>
    <div class="box">
        <div class="user">
            <img src="images/pic-1.png" alt="">
            <div class="user-info">
                <h3>Mr.Knathon Nuanong</h3>
                <span>นายคณาธณ นวลออง</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>
    <div class="box">
        <div class="user">
            <img src="images/pic-1.png" alt="">
            <div class="user-info">
                <h3>Mr.Anuchit Suksoem</h3>
                <span>นายอนุชิต สุขเสริม</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <!-- <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam nesciunt eaque nulla dignissimos.</p>
        <div class="user">
            <img src="images/pic-2.png" alt="">
            <div class="user-info">
                <h3>john deo</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div>

    <div class="box">
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti asperiores laboriosam praesentium enim maiores? Ad repellat voluptates alias facere repudiandae dolor accusamus enim ut odit, aliquam nesciunt eaque nulla dignissimos.</p>
        <div class="user">
            <img src="images/pic-3.png" alt="">
            <div class="user-info">
                <h3>john deo</h3>
                <span>happy customer</span>
            </div>
        </div>
        <span class="fas fa-quote-right"></span>
    </div> -->

</div>

</section>

<!-- review section ends -->

<!-- contact section starts  -->

<!-- <section class="contact" id="contact">

    <h1 class="heading"> <span> contact </span> us </h1>

    <div class="row">

        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

        <div class="image">
            <img src="images/contact-img.svg" alt="">
        </div>

    </div>

</section> -->

<!-- contact section ends -->

<!-- footer section starts  -->

<section class="footer">

    <!-- <div class="box-container"> -->

        <!-- <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">products</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="#">my favorite</a>
        </div>

        <div class="box">
            <h3>locations</h3>
            <a href="#">india</a>
            <a href="#">USA</a>
            <a href="#">japan</a>
            <a href="#">france</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">example@gmail.com</a>
            <a href="#">mumbai, india - 400104</a>
            <img src="images/payment.png" alt="">
        </div>

    </div> -->

    <div class="credit"> created by <span> mr. web designer </span> | Puvanun </div>

</section>

<!-- footer section ends -->


















    
</body>
</html>