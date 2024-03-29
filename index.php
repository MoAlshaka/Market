<?php
session_start();

require_once("classes/Product.php");

$prod = new Product;

$products = $prod->get_all();


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
    <title>Market</title>
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
                <?php if (!isset($_SESSION['id'])) { ?>
                    <li><a href="register.php"><i class="fa-solid fa-user"></i> انشاء حساب</a></li>
                    <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> تسجيل دخول</a></li>
                <?php } ?>
                <?php if (isset($_SESSION['id'])) { ?>
                    <li><a href="handlers/logout.php"><i class="fa-solid fa-right-to-bracket"></i> تسجيل الخروج</a></li>
                <?php } ?>
                <li><a href="index.php#goods"><i class="fa-solid fa-laptop"></i> المنتجات المتاحة</a></li>
                <li><a href="index.php#contact"><i class="fa-solid fa-headset"></i> تواصل معنا</a></li>
            </ul>
        </nav>
    </header>
    <!-- End Header -->
    <!-- Start Landing -->
    <div class="landing">
        <div class="container">
            <div class="image">
                <img src="imges/support-team.png">
            </div>
            <div class="text">
                <p>
                    هتلاقى <span>لابك</span> عندنا
                    <i class="fa-solid fa-laptop"></i>
                </p>
                <span class="textUnder">
                    اشترى اى لاب من عندنا بافضل الاسعار
                    &#128076;
                </span>
            </div>
        </div>
        <div class="startBuy">
            <h2>
                ابدا التسوق الان
                <i class="fa-solid fa-cart-shopping"></i>
            </h2>
            <a href="#goods"><i class="fa-solid fa-angles-down"></i>
            </a>
        </div>
    </div>
    <!-- End Landing -->
    <!-- Start Goods -->
    <div class="goods" id="goods">
        <div class="container">
            <div class="mainHeading">
                المنتجات المتاحة
            </div>
            <div class="boxes">
                <?php foreach ($products as $product) { ?>
                    <div class="box">
                        <div class="image">
                            <img src="imges/<?php echo $product['image']; ?>" alt="">
                        </div>
                        <hr>
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <div class="text">
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
                            <a href="buynow.php?id=<?php echo $product['id']; ?>">اشترى الان
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Goods -->
    <!-- Start Contact Us -->
    <div class="contact" id="contact">
        <div class="container">
            <div class="icon">
                <i class="fa-solid fa-paper-plane"></i>
                <span>تواصل معنا</span>
            </div>
            <div class="text">
                <h1>Our Contacts <i class="fa-solid fa-headset"></i></h1>
                <div class="icons">
                    <a href="#"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
                    <a href="#"><i class="fa-brands fa-facebook"></i> FaceBook</a>
                    <a href="#"><i class="fa-brands fa-telegram"></i> Telegram</a>
                </div>
            </div>
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
            <form class="inputs" action="handlers/handleContact.php" method="post">
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" onkeyup="UserNameChecker()">
                    <span id="name-error"></span>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email" onkeyup="EmailChecker()">
                    <span id="email-error"></span>
                </div>
                <div class="input-group ">
                    <label for="Subject">Subject</label>
                    <textarea name="subject" id="Subject" placeholder="Subject" onkeyup="textareaChecker()""></textarea>
                    <span id=" subject-error"></span>
                </div>
                    <button class="Submit" onclick="return ValidForm()" name="submit">Submit</button>
                    <span id="Submit-error"></span>
                </form>
        </div>
    </div>
    <!-- End Contact Us -->
    <script src="main.js"></script>
</body>
</html>