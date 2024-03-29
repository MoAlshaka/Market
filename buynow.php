<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location:register.php');
}

require_once('classes/Product.php');

$id = $_GET['id'];
$prod = new Product;
$product = $prod->get_one($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اشترى الان</title>
</head>

<body>
    <!-- Start Header -->
    <header>
        <a href="index.php">
            <h1><i class="fa-solid fa-laptop-code"></i> لا<span>بك</span> </h1>
        </a>
        <nav>
            <i class="fa-solid fa-bars"></i>
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i> الصفحة الرئيسية</a></li>
                <li><a href="index.php#goods"><i class="fa-solid fa-laptop"></i> المنتجات المتاحة</a></li>
                <li><a href="index.php#contact"><i class="fa-solid fa-headset"></i> تواصل معنا</a></li>
            </ul>
        </nav>
    </header>
    <!-- End Header -->
    <div id="Submit-error">
        <?php
        if (isset($_SESSION["errors"])) {
            foreach ($_SESSION["errors"] as $error) {
        ?>
                <p><?php echo $error ?></p>
        <?php
            }
            unset($_SESSION["errors"]);
        } ?>
    </div>

    <form class="formBuy" action="handlers/handleOrder.php?id=<?php echo $product['id']; ?>" method="post">
        <div class="container">
            <h1>املأ جميع الحقول بمعلوماتك الصحيحه</h1>
            <input type="text" name="name" placeholder="اسمك رباعى" required>
            <input type="email" name="email" placeholder="البريد الالكترونى" required>
            <input type="text" name="phone" placeholder="رقم تلفونك" required>
            <input type="text" name="address1" placeholder="العنوان 1 " required>
            <input type="text" name="address2" placeholder="العنوان 2 " required>
            <div class="goodsc">
                <h2>بيانات المنتج</h2>
                <span></span>
            </div>
            <div class="prod">
                <div class="prodinfo">
                    <h3>
                        <?php echo $product['name']; ?>
                    </h3>
                    <p>
                        <i class="fa-solid fa-display"></i>
                        حجم الشاشة: <?php echo $product['monitor_size']; ?> بوصة
                    </p>
                    <p>
                        <i class="fa-solid fa-hard-drive"></i>
                        حجم القرص الصلب: <?php echo $product['hdd_size']; ?> غيغابايت
                    </p>
                    <p>
                        <i class="fa-solid fa-microchip"></i>
                        المعالج: <?php echo $product['processor']; ?>
                    </p>
                    <p>
                        <i class="fa-solid fa-memory"></i>
                        ذاكرة الوصول العشوائي: <?php echo $product['memory']; ?> GB
                    </p>
                    <p>
                        <i class="fa-solid fa-tachograph-digital"></i>
                        بطاقة رسومات: <?php echo $product['amd']; ?>
                    </p>
                    <p><i class="fa-solid fa-money-bills"></i>
                        السعر : <?php echo $product['price']; ?>$</p>
                    </p>
                    <p><i class="fa-solid fa-truck-moving"></i>
                        رسوم الشحن:10$
                    </p>
                    <p><i class="fa-solid fa-hand-holding-dollar"></i>
                        الاجمالى: <?php echo $product['price'] + 10; ?>$
                    </p>

                </div>
                <div class="lapImage">
                    <img src="imges/<?php echo $product['image']; ?>" alt="">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </div>
            </div>
            <input type="submit" value="اتمام الشراء" name="submit">
            <div class="messageDone">
                تم ارسال طلب الشراء
                <i class="fa-solid fa-check"></i>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="startingComments">
                <h3>تقييم بعض العملاء للمنتج</h3>
                <span></span>
            </div>
            <div class="comments">
                <div class="coment">
                    <div class="headComment">
                        <img src="imges/avatar-01.png">
                        <h4>ابراهيم صالح</h4>
                    </div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>
                        مش وحش وشغال تمام
                    </p>
                </div>
                <div class="coment">
                    <div class="headComment">
                        <img src="imges/avatar-02.png">
                        <h4>بلال رفعت</h4>
                    </div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>
                        لاب مقبول والتوصيل سريع
                    </p>
                </div>
                <div class="coment">
                    <div class="headComment">
                        <img src="imges/avatar-03.png">
                        <h4>عمر فوده</h4>
                    </div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>
                        الجهاز بطاريته متوسطة وبتطول فترة كويسة
                    </p>
                </div>
                <div class="coment">
                    <div class="headComment">
                        <img src="imges/avatar-05.png">
                        <h4>محمد صبرى</h4>
                    </div>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>
                        منتج على الله حكايته
                    </p>
                </div>
            </div>
        </div>



        <script src="main2.js"></script>
</body>

</html>