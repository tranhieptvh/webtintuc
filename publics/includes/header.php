<?php
session_start();
ob_start();

if (isset($_SESSION['register_success'])) {
	unset($_SESSION['register_success']);
}
if (isset($_SESSION['username_exist'])) {
	unset($_SESSION['username_exist']);
}
if (isset($_SESSION['fail_cpwd'])) {
	unset($_SESSION['fail_cpwd']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Kênh tin tức</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!--===============================================================================================-->
	
</head>

<body class="animsition">