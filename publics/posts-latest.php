<?php
require_once('./../models/posts.php');
require_once('./../models/tags.php');
$posts = new Posts();
$tags = new Tags();
?>

<section class="bg0 p-t-60 p-b-35">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-20">
                <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Tin mới nhất
                    </h3>
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
                <div class="p-l-10 p-rl-0-sr991 p-b-20">

                    <!-- Tag -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-30">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Tags
                            </h3>
                        </div>

                        <div class="flex-wr-s-s m-rl--5">
                            <?php
                            $tags = new Tags();
                            $listTags = $tags->getAll();
                            foreach ($listTags as $r) {
                            ?>
                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    <?php echo $r['name'] ?>
                                </a>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>