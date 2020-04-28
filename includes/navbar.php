<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Function show menu đa cấp -->
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=webtintuc', 'root', '');
        $pdo->exec('set names utf8');
        function printMenu($pdo, $parent_id)
        {
            $cats = $pdo->query('SELECT * FROM category WHERE parent_id = ' . $parent_id);
            //nếu là danh mục cha
            if ($parent_id == 0) {
                foreach ($cats as $r) {
                    echo '<li><a href="#">' . $r['name'] . '</a>';
                    printMenu($pdo, $r['id']);
                    echo '</li>';
                }
            } else {
                //nếu là danh mục con
                echo '<ul class="dropdown">';
                foreach ($cats as $r) {
                    echo '<li><a href="#">' . $r['name'] . '</a></li>';
                }
                echo '</ul>';
            }
        }
        ?>
        <!-- End of function -->

        <!-- Navbar Area -->
        <div class="mag-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="magNav">

                    <!-- Nav brand -->
                    <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Nav Content -->
                    <div class="nav-content d-flex align-items-center">
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <?php //in menu từ danh mục cha
                                    printMenu($pdo, 0);
                                    ?>
                                    <li><a href="about.html">About</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <div class="top-meta-data d-flex align-items-center">
                            <!-- Top Search Area -->
                            <div class="top-search-area">
                                <form action="index.html" method="post">
                                    <input type="search" name="top-search" id="topSearch" placeholder="Search and hit enter...">
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                            <!-- Login -->
                            <a href="login.html" class="login-btn"><i class="fa fa-user" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->