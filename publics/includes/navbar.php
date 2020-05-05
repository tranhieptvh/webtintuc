<?php
require_once('./../helper.php');
?>

<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
                    <a href="about.php" class="left-topbar-item">
                        About
                    </a>

                    <?php
                    if (isset($_SESSION['user'])) {
                        echo '<a href="logout.php" class="left-topbar-item">
                        Log out
                    </a>';
                    } else {
                        echo '<a href="register.php" class="left-topbar-item">
                        Sign up
                    </a>

                    <a href="login.php" class="left-topbar-item">
                        Log in
                    </a>';
                    }
                    ?>



                </div>

                <div class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.php"><img src="assets/images/icons/logo.png" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li class="left-topbar">
                    <a href="about.php" class="left-topbar-item">
                        About
                    </a>

                    <a href="register.php" class="left-topbar-item">
                        Sing up
                    </a>

                    <a href="login.php" class="left-topbar-item">
                        Log in
                    </a>
                </li>

                <li class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="index.php">Home</a>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <?php
                //  in menu từ danh mục cha
                printCategory(0, 'client');
                ?>
            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="index.php"><img src="assets/images/icons/logo.png" alt="LOGO"></a>
            </div>

            <!-- Banner -->
            <div class="banner-header">
                <a href="#"><img src="assets/images/banner-01.jpg" alt="IMG"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="index.php">
                        <img src="assets/images/icons/logo-01.png" alt="LOGO">
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <?php
                        //  in menu từ danh mục cha
                        printCategory(0, 'client');
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>