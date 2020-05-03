<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/category.php');

$cate = new Category();
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if ($cate->checkName($name)) {
        $count = $cate->insert($_POST);
        if ($count == 1) {
            $_SESSION['add_cate_success'] = 'Thêm thành công';
        }
    } else {
        $_SESSION['cate_exist'] = 'Category đã tồn tại';
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add category</h1>
    </div>

    <div class="container">
        <?php
        if (isset($_SESSION['add_cate_success'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['add_cate_success'] ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['cate_exist'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['cate_exist'] ?>
            </div>
        <?php
        }
        ?>

        <form method="POST">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" required="true">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Parent</label>
                <div class="col-sm-10">
                    <input type="radio" name="parent_id" value="0"> Parent<br>
                    <?php
                    $list = $cate->getByParentId(0);
                    // var_dump($list);die();
                    foreach ($list as $r) {
                    ?>
                        <input type="radio" name="parent_id" value="<?php echo $r['id'] ?>"> <?php echo $r['name'] ?><br>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <input type="submit" class="btn btn-success" value="Add"></input>
            <input type="reset" class="btn btn-primary" value=Reset>
            <a href="category.php" class="btn btn-secondary ">Back</a>
        </form>
    </div>

</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>