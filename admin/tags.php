<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/tags.php');
require_once('./../helper.php');

$tags = new Tags();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                // var_dump($_GET['id']);die();
                $tags->delete($_GET['id']);
                header('Location:tags.php');
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
        <h1 class="h3 mb-0 text-gray-800">Quản lý tags</h1>
    </div>

    <div class="container">
        <a class="btn btn-primary" href="tags_add.php">Thêm</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
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
                $list = $tags->getAllLimit($offset, $count);
                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['id'] ?></td>
                        <td><?php echo $r['name'] ?></td>
                        <td>
                            <a class="btn btn-warning" href="tags_update.php?id=<?php echo $r['id'] ?>">Sửa</a>
                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteModal">Xoá</a>
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
                generatePage($tags->getPDO(), 'tags', $count);
                ?>
            </ul>
        </nav>
    </div>
</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>