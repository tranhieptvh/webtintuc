<?php
function generatePage($allRows, $count, $role)
{
    $page = ceil($allRows / $count); //11/5 = 2.2 xấp xỉ 3 -> 2 trang
    for ($i = 0; $i < $page; $i++) {
        $pageCount = $i + 1;
        //Phân trang admin
        if ($role == 'admin') {
            if (isset($_GET['page']) && $_GET['page'] == $pageCount) {
                echo '<li class="page-item active"><a class="page-link" href="?page=' . $pageCount . '">' . $pageCount . '<span class="sr-only">(current)</span></a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="?page=' . $pageCount . '">' . $pageCount . '</a>';
            }
        }

        //Phân trang client
        if ($role == 'client') {
            if (isset($_GET['page']) && $_GET['page'] == $pageCount) {
                echo '<a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 pagi-active" href="?page=' . $pageCount . '">' . $pageCount . '</a>';
            } else {
                echo '<a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7" href="?page=' . $pageCount . '">' . $pageCount . '</a>';
            }
        }
    }
}
