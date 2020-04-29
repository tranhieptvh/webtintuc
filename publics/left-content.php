<?php
require_once('./../models/posts.php');

$posts = new Posts();
?>

<div class="post-sidebar-area left-sidebar mt-30 mb-30 bg-white box-shadow">
    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title / TIN MỚI  NHẤT (5 tin) -->
        <div class="section-heading">
            <h5>Tin mới nhất</h5>
        </div>

        <?php
        $listLatestPosts = $posts->getLatestPosts();
        foreach ($listLatestPosts as $r) {
        ?>
            <!-- Single Blog Post -->
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?php echo $r['avatar'] ?>" alt="">
                </div>
                <div class="post-content">
                    <a href="single-post.html" class="post-title"><?php echo $r['title'] ?></a>
                    <div class="post-meta d-flex justify-content-between">
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $r['views'] ?></a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $r['likes'] ?></a>
                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget">
        <a href="#" class="add-img"><img src="assets/img/bg-img/add.png" alt=""></a>
    </div>

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Tin xem nhiều</h5>
        </div>

        <?php
        $listViews = $posts->getPostsViews();
        foreach ($listViews as $r) {
        ?>
            <!-- Single Blog Post -->
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?php echo $r['avatar'] ?>" alt="">
                </div>
                <div class="post-content">
                    <a href="single-post.html" class="post-title"><?php echo $r['title'] ?></a>
                    <div class="post-meta d-flex justify-content-between">
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $r['views'] ?></a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $r['likes'] ?></a>
                        <!-- <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a> -->
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>