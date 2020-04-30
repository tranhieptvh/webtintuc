<?php
require_once('./../models/posts.php');
require_once('./../models/category.php');
$posts = new Posts();
$cats = new Category();
?>

<section class="bg0 p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="p-b-20">
                    <!-- Tin theo category -->
                    <?php
                    $listCats = $cats->getByParentId(0);
                    foreach ($listCats as $r) {
                    ?>
                        <div class="tab01 p-b-20">
                            <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                                <!-- Brand tab -->
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    <?php echo $r['name'] ?>
                                </h3>

                                <!-- View all -->
                                <a href="posts-list-category.php?id=<?php echo $r['id'] ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    View all
                                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                                </a>
                            </div>


                            <!-- Tab panes -->
                            <div class="tab-content p-t-35">
                                <!-- - -->
                                <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->
                                            <div class="m-b-30">
                                                <?php
                                                $post = $posts->getPostsByCategory($r['id'], 0, 1);
                                                foreach ($post as $item) {
                                                ?>
                                                    <a href="posts-detail.php?id=<?php echo $item['id'] ?>" class="wrap-pic-w hov1 trans-03">
                                                        <img src="<?php echo $item['avatar'] ?>" alt="IMG">
                                                    </a>

                                                    <div class="p-t-20">
                                                        <h5 class="p-b-5">
                                                            <a href="posts-detail.php?id=<?php echo $item['id'] ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                                <?php echo $item['title'] ?>
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="posts-category.php?id=<?php echo $item['cate_id'] ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
                                                                <?php echo $item['cate_name'] ?>
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                <?php echo $item['date_created'] ?>
                                                            </span>
                                                        </span>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                            <!-- Item post -->
                                            <?php
                                            $post = $posts->getPostsByCategory($r['id'], 2, 4);
                                            foreach ($post as $item) {
                                            ?>
                                                <div class="flex-wr-sb-s m-b-30">
                                                    <a href="posts-detail.php?id=<?php echo $item['id'] ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                        <img src="<?php echo $item['avatar'] ?>" alt="IMG">
                                                    </a>

                                                    <div class="size-w-2">
                                                        <h5 class="p-b-5">
                                                            <a href="posts-detail.php?id=<?php echo $item['id'] ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                <?php echo $item['title'] ?>
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
                                                            <a href="posts-category.php?id=<?php echo $item['cate_id'] ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                <?php echo $item['cate_name'] ?>
                                                            </a>

                                                            <span class="f1-s-3 m-rl-3">
                                                                -
                                                            </span>

                                                            <span class="f1-s-3">
                                                                <?php echo $item['date_created'] ?>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    

                    <!-- QUẢNG CÁO -->
                    <div class="flex-c-s p-t-8">
                        <a href="#">
                            <img class="max-w-full" src="assets/images/banner-02.jpg" alt="IMG">
                        </a>
                    </div>

                    <!-- Connected -->
                    <div class="p-t-50">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Stay Connected
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                    <span class="fab fa-facebook-f"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
                                    <span class="f1-s-8 cl3 p-r-20">
                                        6879 Fans
                                    </span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Like
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                    <span class="fab fa-twitter"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
                                    <span class="f1-s-8 cl3 p-r-20">
                                        568 Followers
                                    </span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Follow
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                    <span class="fab fa-youtube"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
                                    <span class="f1-s-8 cl3 p-r-20">
                                        5039 Subscribers
                                    </span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Subscribe
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>