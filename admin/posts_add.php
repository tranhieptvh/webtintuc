<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/posts.php');
require_once('./../models/users.php');
require_once('./../models/category.php');
require_once('./../models/tags.php');
require_once('./../helper.php');
?>


<?php
if (isset($_POST['title'])) {
    $posts = new Posts;

    if (isset($_POST['tag_id'])) {
        $tag_id = array();
        foreach ($_POST['tag_id'] as $r) {
            $tag_id[] = $r;
        }
        $str = implode(',', $tag_id);

        $payload['title'] = $_POST['title'];
        $payload['description'] = $_POST['description'];
        $payload['content'] = $_POST['content'];
        $payload['created_by_id'] = $_POST['created_by_id'];
        $payload['tag_id'] = $str;
        $payload['cate_id'] = $_POST['cate_id'];
        $payload['is_featured'] = $_POST['is_featured'];

        $insertId = $posts->insert($payload);
    }

    //upload avatar
    if (isset($_FILES['file']) && $_FILES['file']['name'] != '') {
        $filename = './../uploads/' . time() . $_FILES['file']['name'];
        // echo $filename;
        move_uploaded_file($_FILES['file']['tmp_name'], $filename);
        $posts->updateAvatar($filename, $insertId);
    }

    if ($insertId != 0) {
        $_SESSION['add_post_success'] = 'Thêm thành công';
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add posts</h1>
    </div>

    <div class="container">
        <?php
        if (isset($_SESSION['add_post_success'])) {
        ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['add_post_success'] ?>
            </div>
        <?php
        }
        ?>

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <textarea name="title" id="" cols="30" rows="5" required="true"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea name="content" class="ckeditor" required="true"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Created by</label>
                <div class="col-sm-10">
                    <select class="custom-select col-sm-2" name="created_by_id">
                        <?php
                        $users = new Users;
                        $listUsers = $users->getByRole(0);
                        foreach ($listUsers as $r) {
                        ?>
                            <option value="<?php echo $r['id'] ?>"><?php echo $r['username'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select class="custom-select col-sm-2" name="cate_id">
                        <?php
                        $cate = new Category();
                        $listCate = $cate->getAll();
                        foreach ($listCate as $r) {
                        ?>
                            <option value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tag</label>
                <div class="col-sm-10">
                    <?php
                    $tags = new Tags();
                    $listTags = $tags->getAll();
                    foreach ($listTags as $r) {
                    ?>
                        <input type="checkbox" name="tag_id[]" value="<?php echo $r['id'] ?>"> <?php echo $r['name'] ?><br>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Is Featured?</label>
                <div class="col-sm-10">
                    <input type="radio" required="true" name="is_featured" value="1"> Yes <br>
                    <input type="radio" required="true" name="is_featured" value="0"> No
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="file" />
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Add"></input>
            <input type="reset" class="btn btn-primary" value=Reset>
            <a href="posts.php" class="btn btn-secondary ">Back</a>
        </form>
    </div>



</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>