<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/users.php');


if (isset($_POST['npwd'])) {
    $users = new Users;
    $id = $_POST['id'];
    $npwd = $_POST['npwd'];
    $cpwd = $_POST['cpwd'];
    if (($npwd === $cpwd)) {
        $users->change_pwd($npwd, $id);
        // echo '<script>alert("Đổi mật khẩu thành công");</script>';
        if (isset($_SESSION['change_pwd_success'])) {
            unset($_SESSION['change_pwd_success']);
        }
        $_SESSION['change_pwd_success'] = 'Đổi thành công';
        header('Location:change_pwd.php');
    } else {
        // echo '<script>alert("Đổi mật khẩu thất bại");</script>';
        if (isset($_SESSION['change_pwd_fail'])) {
            unset($_SESSION['change_pwd_fail']);
        }
        $_SESSION['change_pwd_fail'] = 'Đổi không thành công';
        header('Location:change_pwd.php');
    }
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
                Đổi mật khẩu
            </span>
        </div>
    </div>
</div>

<!-- Page heading -->
<div class="container p-t-4 p-b-35">
    <h2 class="f1-l-1 cl2">
        Đổi mật khẩu
    </h2>
</div>

<!-- Content -->
<section class="bg0 p-b-110">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-8 p-b-30">
                <div class="p-r-10 p-r-0-sr991">

                    <form method="POST">

                        <?php
                        if (isset($_SESSION['change_pwd_success'])) {
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_SESSION['change_pwd_success'] ?>

                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['change_pwd_fail'])) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['change_pwd_fail'] ?>

                            </div>
                        <?php
                        }
                        ?>

                        <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="pwd" readonly value="<?php echo $_SESSION['user']['pwd'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="npwd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="cpwd">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Change password"></input>
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