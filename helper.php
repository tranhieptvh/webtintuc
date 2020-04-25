<?php
function generatePage($pdo, $tableName, $count)
{
    $row = $pdo->query('select count(*) as count from ' . $tableName);
    foreach ($row as $r) {
        $allRows = $r['count'];
    }
    $page = ceil($allRows / $count); //11/5 = 2.2 xấp xỉ 3 -> 2 trang
    for ($i = 0; $i < $page; $i++) {
        $pageCount = $i + 1;
        if (isset($_GET['page']) && $_GET['page'] == $pageCount) {
            echo '<li class="page-item active"><a class="page-link" href="?page=' . $pageCount . '">' . $pageCount . '<span class="sr-only">(current)</span></a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="?page=' . $pageCount . '">' . $pageCount . '</a>';
        }
    }
}