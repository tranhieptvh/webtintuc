<?php
require_once('./../models/posts.php');
$posts = new Posts();
?>

<section class="bg0 p-t-60 p-b-35">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-20">
                <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Tin mới nhất
                    </h3>

                    <!-- View all -->
                    <a href="posts-list.php" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                        View all
                        <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                    </a>
                </div>

                <div class="row p-t-35">

                    <?php
                    $latestPosts = $posts->getLatestPosts();
                    foreach ($latestPosts as $r) {
                    ?>
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="wrap-pic-w hov1 trans-03">
                                    <img src="<?php echo $r['avatar'] ?>" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            <?php echo $r['title'] ?>
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <span class="f1-s-3">
                                            <?php echo $r['date_created'] ?>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>

            <div class="col-md-10 col-lg-4">

                <?php
                require_once('right-col.php');
                ?>

            </div>
        </div>
    </div>
</section>