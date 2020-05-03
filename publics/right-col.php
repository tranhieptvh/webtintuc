<?php
require_once('./../models/tags.php');
require_once('./../models/posts.php');
$posts = new Posts();
$tags = new Tags();
?>

<!-- Tìm kiếm -->
<div class="p-b-55">
    <div class="how2 how2-cl4 flex-s-c m-b-30">
        <h3 class="f1-m-2 cl3 tab01-title">
            Tìm kiếm
        </h3>
    </div>

    <form action="posts-search.php" method="GET">
        <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
            <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
                <!-- <input type="submit" value=""> -->
            </button>
        </div>
    </form>
</div>


<!-- TIN XEM NHIỀU -->
<div>
    <div class="how2 how2-cl4 flex-s-c">
        <h3 class="f1-m-2 cl3 tab01-title">
            Tin xem nhiều
        </h3>
    </div>

    <ul class="p-t-35">
        <?php
        $listPostsViews = $posts->getPostsViews();
        foreach ($listPostsViews as $r) {
        ?>
            <li class="flex-wr-sb-s p-b-30">
                <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="size-w-10 wrap-pic-w hov1 trans-03">
                    <img src="<?php echo $r['avatar'] ?>" alt=" IMG">
                </a>

                <div class="size-w-11">
                    <h6 class="p-b-4">
                        <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
                            <?php echo $r['title'] ?>
                        </a>
                    </h6>

                    <span class="cl8 txt-center p-b-24">
                        <a href="posts-list-category.php?id=<?php echo $r['cate_id'] ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
            </li>
        <?php
        }
        ?>

    </ul>
</div>

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
                <a href="posts-list-tag.php?id=<?php echo $r['id'] ?>" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                    <?php echo $r['name'] ?>
                </a>
            <?php
            }
            ?>

        </div>
    </div>
</div>