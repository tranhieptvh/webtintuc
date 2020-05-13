<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
require_once('./../models/users.php');
?>

<?php
if (isset($_GET['id'])) {
    $users = new Users();
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $users->getById($id);
        $_SESSION['user'] = $obj;
    } else {
        header('Location:index.php');
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
                    <form method="POST">

                        <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ?>" />
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" readonly value="<?php echo $_SESSION['user']['username'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fullname</label>
                            <div class="col-sm-10">
                                <input type="text" name="fullname" readonly value="<?php echo $_SESSION['user']['fullname'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date of birth</label>
                            <div class="col-sm-10">
                                <input type="date" name="dob" readonly value="<?php echo $_SESSION['user']['dob'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <?php
                            if ($_SESSION['user']['gender'] == 1) {
                            ?>
                                <div class="col-sm-10">
                                    <input type="radio" name="gender" value="1" checked>Male <br>
                                    <input type="radio" name="gender" value="2" disabled>Female
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if ($_SESSION['user']['gender'] == 2) {
                            ?>
                                <div class="col-sm-10">
                                    <input type="radio" name="gender" value="1" disabled>Male <br>
                                    <input type="radio" name="gender" value="2" checked>Female
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" readonly value="<?php echo $_SESSION['user']['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" readonly value="<?php echo $_SESSION['user']['phone'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" readonly value="<?php echo $_SESSION['user']['address'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Avatar</label>
                            <img style="width:20%;height:20%;" src="<?php echo $_SESSION['user']['avatar'] ?>" />
                        </div>
                    </form>
                    <a href="profile_update.php?id=<?php echo $_SESSION['user']['id'] ?>" class="btn btn-success">Change Info</a>
                    <a href="change_pwd.php?id=<?php echo $_SESSION['user']['id'] ?>" class="btn btn-success">Change Password</a>
                    <a href="index.php" class="btn btn-secondary">Back</a>
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