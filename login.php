<?php
session_start();

if (isset($_SESSION['id'])) {
    header('location:index.php');
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
    <title>تسجيل حساب جديد</title>
</head>

<body>
    <header>
        <a href="index.php">
            <h1><i class="fa-solid fa-laptop-code"></i> لا<span>بك</span> </h1>
        </a>
        <nav>
            <i class="fa-solid fa-bars"></i>
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i> الصفحة الرئيسية</a></li>
                <li><a href="register.php"><i class="fa-solid fa-user"></i> انشاء حساب</a></li>
                <li><a href="login.php"><i class="fa-solid fa-right-to-bracket"></i> تسجيل دخول</a></li>
                <li><a href="index.php#goods"><i class="fa-solid fa-laptop"></i> المنتجات المتاحة</a></li>
                <li><a href="index.php#contact"><i class="fa-solid fa-headset"></i> تواصل معنا</a></li>
            </ul>
        </nav>
    </header>
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
    <form class="formLogin" action="handlers/loginHandle.php" method="post">
        <div class="container">
            <div class="inputs">
                <h1>تسجيل الدخول</h1>
                <input type="email" placeholder="بريدك الالكترونى" name="email">
                <input type="password" placeholder="كلمة المرور" name="password">
                <input type="submit" value="تسجيل الدخول" name="submit">
                <a href="register.php">
                    انشاء حساب
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
        </div>
    </form>
    <script src="main.js"></script>
</body>

</html>