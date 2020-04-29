<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/users.php');
require_once('./../models/posts.php');
require_once('./../models/category.php');
require_once('./../models/tags.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <h4>Xin chào <strong> <?php echo $_SESSION['user']['fullname']; ?> </strong> đến với trang Quản trị</h4>
    <div class="dropdown-divider"></div>

    <!-- Table info -->
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Users</th>
                <th scope="col">Posts</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Số lượng</th>
                <td>
                    <?php
                    $users = new Users();
                    $countUsers = $users->getCount();
                    echo $countUsers;
                    ?>
                </td>
                <td>
                    <?php
                    $posts = new Posts();
                    $countPosts = $posts->getCount();
                    echo $countPosts;
                    ?>
                </td>
                <td>
                    <?php
                    $cate = new Category();
                    $countCate = $cate->getCount();
                    echo $countCate;
                    ?>
                </td>
                <td>
                    <?php
                    $tags = new tags();
                    $countTags = $tags->getCount();
                    echo $countTags;
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- End of table info -->

    <?php
        $list = $posts->getPostsFeature(0,1);
        var_dump($list);die();
    ?>

</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>