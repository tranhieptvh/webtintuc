<?php
session_start();
ob_start();

if (isset($_SESSION['add_user_success'])) {
    unset($_SESSION['add_user_success']);
}
if (isset($_SESSION['add_cate_success'])) {
    unset($_SESSION['add_cate_success']);
}
if (isset($_SESSION['add_tag_success'])) {
    unset($_SESSION['add_tag_success']);
}
if (isset($_SESSION['add_post_success'])) {
    unset($_SESSION['add_post_success']);
}
if (isset($_SESSION['username_exist'])) {
    unset($_SESSION['username_exist']);
}
if (isset($_SESSION['tag_exist'])) {
    unset($_SESSION['tag_exist']);
}
if (isset($_SESSION['cate_exist'])) {
    unset($_SESSION['cate_exist']);
}
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TVH Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">