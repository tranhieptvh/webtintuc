<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/tags.php');

$tags = new Tags();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $tags->getByid($id);
        // var_dump($obj);die();
    } else {
        header('Location:index.php');
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $tags->update($_POST);
    header('Location:tags_update.php?id=' . $id);
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update tags</h1>
    </div>

    <div class="container">

        <form method="POST">

            <input type="hidden" name="id" value="<?php echo $obj['id'] ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $obj['name'] ?>">
                </div>
            </div>

            <input type="submit" class="btn btn-success" value="Update"></input>
            <input type="reset" class="btn btn-primary" value=Reset>
            <a href="tags.php" class="btn btn-secondary">Back</a>
        </form>
    </div>



</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>