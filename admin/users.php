<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/users.php');
require_once('./../helper.php');

$users = new Users();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $obj = $users->getById($_GET['id']);
                if (file_exists($obj['avatar'])) {
                    unlink($obj['avatar']);
                }
                $users->delete($_GET['id']);
                header('Location:users.php');
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
        <h1 class="h3 mb-0 text-gray-800">Quản lý userrs</h1>
    </div>

    <div class="container">
        <a class="btn btn-primary" href="users_add.php">Thêm</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Avatar</th>
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
                $list = $users->getAllLimit($offset, $count);
                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['id'] ?></td>
                        <td><?php echo $r['username'] ?></td>
                        <td><?php echo $r['fullname'] ?></td>
                        <td><?php
                            if ($r['role'] == 0) {
                                echo 'Admin';
                            } else {
                                echo 'Normal user';
                            }
                            ?></td>
                        <td><?php echo $r['email'] ?></td>
                        <td><img style="width:50px;height:50px;" src="<?php echo $r['avatar']; ?>" /></td>
                        <td>
                            <a class="btn btn-warning" href="users_update.php?id=<?php echo $r['id'] ?>">Sửa</a>
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
                generatePage($users->getCount(), $count);
                ?>
            </ul>
        </nav>
    </div>

</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>