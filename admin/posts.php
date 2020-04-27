<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/posts.php');
require_once('./../helper.php');

$posts = new Posts();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $obj = $posts->getById($_GET['id']);
                if (file_exists($obj['img'])) {
                    unlink($obj['img']);
                }
                $posts->delete($_GET['id']);
                // header('Location:posts.php');
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
        <h1 class="h3 mb-0 text-gray-800">Quản lý posts</h1>
    </div>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Created by</th>
                    <th scope="col">Category</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>

            <a class="btn btn-primary" href="posts_add.php">Thêm</a>
            <br>
            <br>

            <tbody>
                <?php
                if (isset($_GET['page'])) {
                    $offset = ($_GET['page'] - 1) * 5;
                } else {
                    $offset = 0;
                }
                $list = $posts->getAll($offset, 5);
                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['id'] ?></td>
                        <td style="width:500px;"><?php echo $r['title'] ?></td>
                        <td><img style="width:50px;height:50px;" src="<?php echo $r['img']; ?>" /></td>
                        <td><?php echo $r['created_by_id'] ?></td>
                        <td><?php echo $r['cate_id'] ?></td>
                        <td>
                            <a class="btn btn-warning" href="posts_update.php?id=<?php echo $r['id'] ?>">Sửa</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Xoá</a>
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
                generatePage($posts->getPDO(), 'posts', 5);
                ?>
            </ul>
        </nav>
    </div>

</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>