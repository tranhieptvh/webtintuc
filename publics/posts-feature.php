<?php
require_once('./../models/posts.php');
$posts = new Posts();
?>

<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            <div class="col-md-6 p-rl-1 p-b-2">
                <?php
                $post1 = $posts->getPostsFeature(0, 1);
                foreach ($post1 as $r) {
                ?>
                    <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(<?php echo $r['avatar'] ?>);">
                        <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="dis-block how1-child1 trans-03"></a>
                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                            <h3 class="how1-child2 m-t-14 m-b-10">
                                <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                    <?php echo $r['title'] ?>
                                </a>
                            </h3>
                            <span class="how1-child2">
                                <span class="f1-s-3 cl11">
                                    <?php echo $r['date_created'] ?>
                                </span>
                            </span>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

            <div class="col-md-6 p-rl-1">
                <div class="row m-rl--1">
                    <div class="col-12 p-rl-1 p-b-2">
                        <?php
                        $post2 = $posts->getPostsFeature(1, 1);
                        foreach ($post2 as $r) {
                        ?>
                            <div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(<?php echo $r['avatar'] ?>);">
                                <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                    <h3 class="how1-child2 m-t-14">
                                        <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                            <?php echo $r['title'] ?>
                                        </a>
                                    </h3>
                                    <span class="how1-child2">
                                        <span class="f1-s-3 cl11">
                                            <?php echo $r['date_created'] ?>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>

                    <?php
                    $post3 = $posts->getPostsFeature(2, 3);
                    foreach ($post3 as $r) {
                    ?>
                        <div class="col-sm-6 p-rl-1 p-b-2">
                            <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(<?php echo $r['avatar'] ?>);">
                                <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="dis-block how1-child1 trans-03"></a>

                                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                    <h3 class="how1-child2 m-t-14">
                                        <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                            <?php echo $r['title'] ?>
                                        </a>
                                        <span class="how1-child2">
                                            <span class="f1-s-3 cl11">
                                                <?php echo $r['date_created'] ?>
                                            </span>
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>