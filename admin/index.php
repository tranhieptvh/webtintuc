<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
?>




<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>


    <h5>đây là trang admin</h5>
    <?php
        var_dump($_SESSION['user']);
    ?>


</div>
<!-- /.container-fluid -->




<?php
require_once('includes/footer.php');
?>