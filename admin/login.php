<?php
include '../assets/db.php';

$hata = false;

if (isset($_POST['login'])) {
	$giris = false;
	$k_adi = $_POST['k_adi'];
	$sifre = md5($_POST['sifre']);
	$sorgu = $db->query("SELECT * FROM kullanicilar");
	$kullanicilar = $sorgu->fetchAll(PDO::FETCH_ASSOC);
	foreach($kullanicilar as $kullanici) {
		if ($kullanici['k_adi'] == $k_adi && $kullanici['sifre'] == $sifre) {
			global $giris;
			$giris = true;
		}
	}
	if ($giris) {
		$_SESSION['login'] = $k_adi;
		header('Location:index.php');
	} else {
		global $hata;
		$hata = true;
	}
}

?>

<!DOCTYPE html>
<html lang="tr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giriş yap - Admin panel</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">

	<link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
	<div id="auth">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-12 mx-auto">
					<div class="card pt-4">
						<div class="card-body">
							<div class="text-center mb-5">
								<h3>Giriş Yap</h3>
								<p>Site admin panel girişi.</p>
							</div>
							<div class='alert alert-light-danger color-danger <?php echo ($hata ? "" : "d-none") ?>' id="hata">Kullanıcı adı veya şifre hatalı!</div>
							<form action="" method="POST">
								<div class="form-group position-relative has-icon-left">
									<label for="username">Kullanıcı adı</label>
									<div class="position-relative">
										<input type="text" name="k_adi" class="form-control" id="username" maxlength="20" required>
										<div class="form-control-icon">
											<i data-feather="user"></i>
										</div>
									</div>
								</div>
								<div class="form-group position-relative has-icon-left">
									<div class="clearfix">
										<label for="password">Şifre</label>
									</div>
									<div class="position-relative">
										<input type="password" name="sifre" class="form-control" id="password" maxlength="50" required>
										<div class="form-control-icon">
											<i data-feather="lock"></i>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button type="submit" name="login" class="btn btn-primary">Giriş yap</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<script src="assets/js/feather-icons/feather.min.js"></script>
	<script src="assets/js/app.js"></script>

	<script src="assets/js/main.js"></script>
</body>

</html>