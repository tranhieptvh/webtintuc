<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/posts.php');
require_once('./../models/users.php');
require_once('./../models/category.php');
require_once('./../models/tags.php');
require_once('./../helper.php');

$posts = new Posts;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $posts->getByid($id);
        // var_dump($obj);die();
    } else {
        header('Location:index.php');
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if (isset($_POST['tag_id'])) {
        $tag_id = array();
        foreach ($_POST['tag_id'] as $r) {
            $tag_id[] = $r;
        }
        $str = implode(',', $tag_id);

        $payload['id'] = $_POST['id'];
        $payload['title'] = $_POST['title'];
        $payload['description'] = $_POST['description'];
        $payload['content'] = $_POST['content'];
        $payload['created_by_id'] = $_POST['created_by_id'];
        $payload['tag_id'] = $str;
        $payload['cate_id'] = $_POST['cate_id'];
        $payload['is_featured'] = $_POST['is_featured'];

        // var_dump($payload);die();

        $posts->update($payload);
    }

    //update avatar
    if (isset($_FILES['file']) && $_FILES['file']['name'] != '') {
        $filename = './../uploads/' . time() . $_FILES['file']['name'];
        //xoá file đi
        if (file_exists($obj['img'])) {
            try {
                unlink($obj['img']);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        move_uploaded_file($_FILES['file']['tmp_name'], $filename);
        $posts->updateAvatar($filename, $id);
    }

    header('Location:posts_update.php?id=' . $id);
    // ob_end_flush();
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update posts</h1>
    </div>

    <div class="container">

        <form method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $obj['id'] ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <textarea name="title" id="" cols="30" rows="5"><?php echo $obj['title'] ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea name="description" id="" cols="30" rows="5"><?php echo $obj['description'] ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea name="content" class="ckeditor" required="true"><?php echo $obj['content'] ?></textarea>
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
                            if ($r['id'] == $obj['created_by_id']) {
                        ?>
                                <option selected value="<?php echo $r['id'] ?>"><?php echo $r['username'] ?></option>
                            <?php
                            }
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
                            if ($r['id'] == $obj['cate_id']) {
                        ?>
                                <option selected value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>
                            <?php
                            }
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
                    $str = $obj['tag_id'];
                    $tag_id = explode(',', $str);
                    // var_dump($tag_id);die();
                    $tags = new Tags();
                    $listTags = $tags->getAll();
                    foreach ($listTags as $r) {
                        if (findInArray($tag_id, $r['id'])) {
                    ?>
                            <input type="checkbox" checked name="tag_id[]" value="<?php echo $r['id'] ?>"> <?php echo $r['name'] ?> <br>
                        <?php
                        } else {
                        ?>
                            <input type="checkbox" name="tag_id[]" value="<?php echo $r['id'] ?>"> <?php echo $r['name'] ?> <br>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Is Featured?</label>
                <div class="col-sm-10">
                    <input type="radio" name="is_featured" value="1" <?php echo ($obj['is_featured'] == 1) ? 'checked' : '' ?>> Yes <br>
                    <input type="radio" name="is_featured" value="0" <?php echo ($obj['is_featured'] == 0) ? 'checked' : '' ?>> No
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Avatar</label>
                <img style="width:20%;height:20%;" src="<?php echo $obj['avatar']; ?>" />
                <div class="col-sm-10">
                    <input type="file" name="file" />
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Update"></input>
            <input type="reset" class="btn btn-primary" value=Reset>
            <a href="posts.php" class="btn btn-secondary ">Back</a>
        </form>
    </div>



</div>
<!-- /.container-fluid -->

<?php
require_once('includes/footer.php');
?>