<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/posts.php');
require_once('./../helper.php');
?>

<?php
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $posts = new Posts();
    $listPosts = $posts->searchPosts($keyword);
}
?>

<!-- Breadcrumb -->
<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="index.php" class="breadcrumb-item f1-s-3 cl9">
                Home
            </a>
            <span class="breadcrumb-item f1-s-3 cl9">
                Tìm kiếm
            </span>
        </div>
    </div>
</div>

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        Từ khóa: <?php echo $keyword ?>
    </h2>
    <p><strong>Số bài viết phù hợp: <?php echo count($listPosts) ?></strong></p>
</div>

<!-- Post -->
<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-80">
                <div class="row">

                    <?php
                    $count = 10;
                    if (isset($_GET['page'])) {
                        $offset = ($_GET['page'] - 1) * $count;
                    } else {
                        $_GET['page'] = 1;
                        $offset = 0;
                    }
                    foreach ($listPosts as $r) {
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
                                        <a href="posts-list-category.php?id=<?php echo $r['cate_id'] ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            <?php echo $r['cate_name'] ?>
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

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

                <!-- Pagination -->
                <div class="flex-wr-s-c m-rl--7 p-t-15">
                    <?php
                    generatePage(count($listPosts), $count, 'client');
                    ?>
                </div>
            </div>

            <!-- Right-column / TIN XEM NHIỀU + TAG -->
            <div class="col-md-10 col-lg-4 p-b-80">
                <div class="p-l-10 p-rl-0-sr991">
                    <?php
                    require_once('right-col.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once('includes/footer.php');
?>