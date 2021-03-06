<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/category.php');
require_once('./../models/posts.php');
require_once('./../helper.php');

$cats = new Category();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $cate_id = $_GET['id'];
                $cate = $cats->getById($cate_id);
                $posts = new Posts();
                if ($cate['parent_id'] == 0) {
                    $listPosts = $posts->getPostsByParentCategory($cate_id);
                } else {
                    $listPosts = $posts->getPostsByCategory($cate_id);
                }

                if (count($listPosts) > 0) {
                    echo '<script>alert("Category có bài viết, không được xóa!")</script>';
                } else {
                    $cats->delete($cate_id);
                    header('Location:category.php');
                }
            }
            break;
        default:
            # code...
            break;
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý category</h1>
    </div>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Parent ID</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>

            <a class="btn btn-primary" href="cate_add.php">Thêm</a>
            <br>
            <br>

            <tbody>
                <?php
                $count = 5;
                if (isset($_GET['page'])) {
                    $offset = ($_GET['page'] - 1) * $count;
                } else {
                    $_GET['page'] = 1;
                    $offset = 0;
                }
                $list = $cats->getAllLimit($offset, $count);
                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['id'] ?></td>
                        <td><?php echo $r['name'] ?></td>
                        <td><?php echo $r['parent_id'] ?></td>
                        <td>
                            <a class="btn btn-warning" href="cate_update.php?id=<?php echo $r['id'] ?>">Sửa</a>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['id'] ?>" title="delete" class="delete" onclick="return confirm('Xóa à?')">Xóa</a>
                            <!-- <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Xoá</a> -->
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <nav aria-label="...">
            <ul class="pagination">
                <?php
                generatePage($cats->getCount(), $count, 'admin');
                ?>
            </ul>
        </nav>
    </div>

</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>