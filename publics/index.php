<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
?>

<!-- Headline -->
<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
            <span class="text-uppercase cl2 p-r-8">
                Trending Now:
            </span>

            <span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    Interest rate angst trips up US equity bull market
                </span>

                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    Designer fashion show kicks off Variety Week
                </span>

                <span class="dis-inline-block slide100-txt-item animated visible-false">
                    Microsoft quisque at ipsum vel orci eleifend ultrices
                </span>
            </span>
        </div>

        <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
            <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
            </button>
        </div>
    </div>
</div>

<!-- Feature post -->
<?php
require_once('posts-feature.php');
?>

<!-- Latest -->
<?php
require_once('posts-latest.php');
?>

<!-- Banner -->
<div class="container">
    <div class="flex-c-c">
        <a href="#">
            <img class="max-w-full" src="assets/images/banner-01.jpg" alt="IMG">
        </a>
    </div>
</div>

<!-- Post -->
<?php
require_once('posts-category.php');
?>

<?php
require_once('includes/footer.php');
?>