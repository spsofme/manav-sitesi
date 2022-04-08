<?php
include './head.php';
$genel_slogan = $db->query("SELECT * FROM genel WHERE tur='slogan'")->fetch(PDO::FETCH_ASSOC);
$hakkimizda = $db->query("SELECT * FROM hakkimizda");
$urunler_meyve = $db->query("SELECT * FROM urunler WHERE tur='meyve'");
$urunler_sebze = $db->query("SELECT * FROM urunler WHERE tur='sebze'");
$urunler_baklagil = $db->query("SELECT * FROM urunler WHERE tur='baklagil'");
$urunler_baharat = $db->query("SELECT * FROM urunler WHERE tur='baharat'");
?>

<!-- MAIN -->
<main class="main">
	<div class="container-fluid p-0">
		<!-- HOME -->
		<div class="row m-0">
			<div class="col-12 p-0 home">
				<div class="home-text">
					<h1><?php echo $genel_isim['metin']; ?></h1>
					<h3><?php echo $genel_slogan['metin']; ?></h3>
				</div>
			</div>
		</div>
		<!-- ABOUT -->
		<div class="container mt-5 mb-0 about" id="about">
			<div class="mx-auto my-3">
				<?php if ($hakkimizda->rowCount()) { ?>
				<h1>Hakkımızda</h1>
				<div class="row d-flex justify-content-evenly">
					<?php foreach( $hakkimizda->fetchAll(PDO::FETCH_ASSOC) as $row ) { ?>
					<div class="col-sm-12 col-md-5 col-lg-12 card">
						<div class="row g-0">
							<div class="col-lg-4 p-3 my-card-img">
								<img src="./assets/images/about/<?php echo $row['resim_adi']; ?>" class="img-fluid rounded-start">
							</div>
							<div class="col-lg-8 d-flex align-items-center">
								<div class="card-body">
									<h5 class="card-title text-info"><?php echo $row['baslik']; ?></h5>
									<p class="card-text"><?php echo $row['aciklama']; ?></p>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<!-- PRODUCTS -->
		<div id="products">
			<h1>Ürünler</h1>
			<div class="container p-2 border my-4">
				<nav>
					<div class="nav nav-pills justify-content-evenly" id="nav-tab" role="tablist">
						<button class="nav-link active" id="product-fruits" data-bs-toggle="tab" data-bs-target="#fruits" type="button" role="tab" aria-controls="fruits">Meyveler</button>
						<button class="nav-link" id="product-vegetables" data-bs-toggle="tab" data-bs-target="#vegetables" type="button" role="tab" aria-controls="vegetables">Sebzeler</button>
						<button class="nav-link" id="product-legumes" data-bs-toggle="tab" data-bs-target="#legumes" type="button" role="tab" aria-controls="legumes">Baklagiller</button>
						<button class="nav-link" id="product-spices" data-bs-toggle="tab" data-bs-target="#spices" type="button" role="tab" aria-controls="spices">Baharatlar</button>
					</div>
				</nav>
				<hr class="mt-0 mb-3">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade active show" id="fruits" role="tabpanel" aria-labelledby="product-fruits">
						<div class="container-fluid">
							<div class="row">
								<?php foreach( $urunler_meyve->fetchAll(PDO::FETCH_ASSOC) as $row ) { ?>
									<div class="card col-lg-3 col-md-6 col-sm-12">
										<img src="./assets/images/products/<?php echo $row['resim_adi']; ?>" class="card-img-top img-fluid">
										<div class="card-body text-center">
											<h5 class="card-title"><?php echo $row['urun_adi']; ?></h5>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="vegetables" role="tabpanel" aria-labelledby="product-vegetables">
						<div class="container-fluid">
							<div class="row">
								<?php foreach( $urunler_sebze->fetchAll(PDO::FETCH_ASSOC) as $row ) { ?>
									<div class="card col-lg-3 col-md-6 col-sm-12">
										<img src="./assets/images/products/<?php echo $row['resim_adi']; ?>" class="card-img-top img-fluid">
										<div class="card-body text-center">
											<h5 class="card-title"><?php echo $row['urun_adi']; ?></h5>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="legumes" role="tabpanel" aria-labelledby="product-legumes">
						<div class="container-fluid">
							<div class="row">
								<?php foreach( $urunler_baklagil->fetchAll(PDO::FETCH_ASSOC) as $row ) { ?>
									<div class="card col-lg-3 col-md-6 col-sm-12">
										<img src="./assets/images/products/<?php echo $row['resim_adi']; ?>" class="card-img-top img-fluid">
										<div class="card-body text-center">
											<h5 class="card-title"><?php echo $row['urun_adi']; ?></h5>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="spices" role="tabpanel" aria-labelledby="product-spices">
						<div class="container-fluid">
							<div class="row">
								<?php foreach( $urunler_baharat->fetchAll(PDO::FETCH_ASSOC) as $row ) { ?>
									<div class="card col-lg-3 col-md-6 col-sm-12">
										<img src="./assets/images/products/<?php echo $row['resim_adi']; ?>" class="card-img-top img-fluid">
										<div class="card-body text-center">
											<h5 class="card-title"><?php echo $row['urun_adi']; ?></h5>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php include './footer.php'; ?>