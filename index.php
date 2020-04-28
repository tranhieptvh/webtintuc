<?php
require_once('includes/header.php');
require_once('includes/navbar.php');
?>

<!-- ##### Mag Posts Area Start ##### -->
<section class="mag-posts-area d-flex flex-wrap">

    <!-- >>>>>>>>>>>>>>>>>>>>
         Post Left Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <?php
    require_once('left-content.php');
    ?>

    <!-- >>>>>>>>>>>>>>>>>>>>
             Main Posts Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <?php
    require_once('main-content.php');
    ?>

    <!-- >>>>>>>>>>>>>>>>>>>>
         Post Right Sidebar Area
        <<<<<<<<<<<<<<<<<<<<< -->
    <?php
    require_once('right-content.php');
    ?>
</section>
<!-- ##### Mag Posts Area End ##### -->

<?php
require_once('includes/footer.php');
?>