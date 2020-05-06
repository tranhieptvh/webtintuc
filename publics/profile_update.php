<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/users.php');
?>


<?php
if (isset($_POST['id'])) {
    $users = new Users();
    $id = $_POST['id'];
    $users->update($_POST);
    if (isset($_FILES['file']) && $_FILES['file']['name'] != '') {
        $filename = './../uploads/' . time() . $_FILES['file']['name'];

        //xoá file đi
        if (file_exists($_SESSION['user']['avatar'])) {
            try {
                unlink($_SESSION['user']['avatar']);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        move_uploaded_file($_FILES['file']['tmp_name'], $filename);
        $users->updateAvatar($filename, $id);
    }
    header('Location:profile.php?id=' . $id);
}
?>


<!-- Breadcrumb -->
<div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="index.php" class="breadcrumb-item f1-s-3 cl9">
                Home
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
                Profile
            </span>
        </div>
    </div>
</div>

<!-- Page heading -->
<div class="container p-t-4 p-b-35">
    <h2 class="f1-l-1 cl2">
        Profile
    </h2>
</div>

<!-- Content -->
<section class="bg0 p-b-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-8 p-b-30">
                <div class="p-r-10 p-r-0-sr991">

                    <form method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" readonly value="<?php echo $_SESSION['user']['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fullname</label>
                            <div class="col-sm-10">
                                <input type="text" name="fullname" value="<?php echo $_SESSION['user']['fullname'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date of birth</label>
                            <div class="col-sm-10">
                                <input type="date" name="dob" value="<?php echo $_SESSION['user']['dob'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <input type="radio" name="gender" value="1" <?php echo ($_SESSION['user']['gender'] == 1) ? 'checked' : '' ?>>Male <br>
                                <input type="radio" name="gender" value="2" <?php echo ($_SESSION['user']['gender'] == 2) ? 'checked' : '' ?>>Female
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" value="<?php echo $_SESSION['user']['phone'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" value="<?php echo $_SESSION['user']['address'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Avatar</label>
                            <img style="width:20%;height:20%;" src="<?php echo $_SESSION['user']['avatar']; ?>" />
                            <div class="col-sm-10">
                                <input type="file" name="file">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Update"></input>
                        <input type="reset" class="btn btn-primary" value=Reset>
                        <a href="index.php" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-5 col-lg-4 p-b-30">
                <div class="p-l-10 p-rl-0-sr991 p-t-5">

                </div>
            </div>
        </div>
</section>

<?php
require_once('includes/footer.php');
?>