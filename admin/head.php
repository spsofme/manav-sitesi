<?php
include '../assets/db.php';

if (! isset($_SESSION['login'])) {
	header('Location: login.php');
}

if(isset($_POST['cikis'])) {
	session_destroy();
	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin panel</title>

	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

	<link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">

	<style>
		.table > :not(caption) > * > * {
			padding: .5rem .75rem;
		}
		.table > :not(caption) > * > * > input {
			border: 1px solid gray;
			border-radius: 5px;
		}
		.table > :not(caption) > * > * > input:focus {
			border: 1px solid cyan;
			outline: none;
		}
	</style>
</head>

<body>
	<div id="app">
		<div id="sidebar" class='active'>
			<div class="sidebar-wrapper active">
				<div class="sidebar-header" style="text-align: center;">
					<!--<img src="assets/images/logo.svg" alt="" srcset="">-->
					<h3>Panel</h3>
				</div>
				<hr>
				<div class="sidebar-menu">
					<ul class="menu">
						<li class='sidebar-title'>Bölümler</li>
						<li class="sidebar-item">
							<a href="index.php" class='sidebar-link'>
								<i data-feather="home" width="20"></i>
								<span>Genel</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="hakkimizda.php" class='sidebar-link'>
								<i data-feather="award" width="20"></i>
								<span>Hakkımızda</span>
							</a>
						</li>
						<li class="sidebar-item">
							<a href="urunler.php" class='sidebar-link'>
								<i data-feather="shopping-cart" width="20"></i>
								<span>Ürünler</span>
							</a>
						</li>
						<li class='sidebar-title'>Ekler</li>
						<li class="sidebar-item">
							<a href="resimler.php" class='sidebar-link'>
								<i data-feather="image" width="20"></i>
								<span>Resimler</span>
							</a>
						</li>
					</ul>
				</div>
				<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
			</div>
		</div>
		<div id="main">
			<nav class="navbar navbar-header navbar-expand navbar-light">
				<a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
				<button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
						<li class="dropdown">
							<a href="#" data-bs-toggle="dropdown"
								class="nav-link dropdown-toggle nav-link-lg nav-link-user">
								<div class="avatar me-1">
									<img src="assets/images/avatar/admin.png" alt="" srcset="">
								</div>
								<div class="d-none d-md-block d-lg-inline-block" style="text-transform:capitalize;"><?php echo $_SESSION['login']; ?></div>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<form action="" method="POST">
									<button type="submit" name="cikis" class="dropdown-item" href="#"><i data-feather="log-out"></i> Çıkış</button>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
