<?php
include './assets/db.php';
$genel_isim = $db->query("SELECT * FROM genel WHERE tur='isim'")->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $genel_isim['metin']; ?></title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

		<!-- CSS Libraries -->
		<link rel="stylesheet" href="./assets/css/style.css">
		<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
	</head>
	<body>
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg px-3 navbar-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="./assets/images/icon.png" class="img-fluid">
				</a>
				<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="nav-icon bi bi-list" id="nav-icon" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
				</svg>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<a class="navbar-brand" href="#">
						<img src="./assets/images/icon.png" class="img-fluid">
					</a>
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Ev</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#about">Hakkımızda</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Products
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#products">Meyveler</a></li>
								<li><a class="dropdown-item" href="#products">Sebzeler</a></li>
								<li><a class="dropdown-item" href="#products">Baklagiller</a></li>
								<li><a class="dropdown-item" href="#products">Baharatlar</a></li>
								<li><hr class="dropdown-divider bg-white"></li>
								<li><a class="dropdown-item text-info" href="#products">All</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#footer">İletişim</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>