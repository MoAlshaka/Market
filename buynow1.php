<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location:register.php');
}
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
    <form class="formBuy">
        <div class="container">
            <h1>املأ جميع الحقول بمعلوماتك الصحيحه</h1>
            <input type="text" placeholder="اسمك رباعى" required>
            <input type="email" placeholder="البريد الالكترونى" required>
            <input type="text" placeholder="رقم تلفونك" required>
            <input type="text" placeholder="العنوان 1 " required>
            <input type="text" placeholder="العنوان 2 " required>
            <div class="goodsc">
                <h2>بيانات المنتج</h2>
                <span></span>
            </div>
            <div class="prod">
                <div class="prodinfo">
                    <h3>
                        لاب توب العاب اتش بي بافيليون
                    </h3>
                    <p>
                        <i class="fa-solid fa-display"></i>
                        حجم الشاشة: 15,6 بوصة
                    </p>
                    <p>
                        <i class="fa-solid fa-hard-drive"></i>
                        حجم القرص الصلب: 1256 غيغابايت
                    </p>
                    <p>
                        <i class="fa-solid fa-microchip"></i>
                        المعالج: Intel Core i5-11300H
                    </p>
                    <p>
                        <i class="fa-solid fa-memory"></i>
                        ذاكرة الوصول العشوائي: 8 GB
                    </p>
                    <p>
                        <i class="fa-solid fa-tachograph-digital"></i>
                        بطاقة رسومات: NVIDIA GTX 1650
                    </p>
                    <p><i class="fa-solid fa-money-bills"></i>
                        سعر المنتج : 430$
                    </p>
                    <p><i class="fa-solid fa-truck-moving"></i>
                        رسوم الشحن:10$
                    </p>
                    <p><i class="fa-solid fa-hand-holding-dollar"></i>
                        الاجمالى:
                        440$
                    </p>

                </div>
                <div class="lapImage">
                    <img src="imges/lap3.png" alt="">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </div>
            </div>
            <input type="submit" id="BuyDone" value="اتمام الشراء">
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
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p>
                        منتج رائع وامكانياته قوية وممتاز يستاهل
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
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p>
                        لاب قوى والتوصيل سريع
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
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p>
                        الجهاز بطاريته قوية وبتطول فترة كويسة
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
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
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