<?php
require_once('./../models/tags.php');
require_once('./../models/posts.php');
$posts = new Posts();
$tags = new Tags();
?>

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
            <li class="flex-wr-sb-s p-b-22">
                <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                    *
                </div>

                <a href="posts-detail.php?id=<?php echo $r['id'] ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                    <?php echo $r['title'] ?>
                </a>
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
                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                    <?php echo $r['name'] ?>
                </a>
            <?php
            }
            ?>

        </div>
    </div>
</div>