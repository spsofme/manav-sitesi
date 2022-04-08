<?php
include './head.php';


if (isset($_POST['isim']) || isset($_POST['slogan']) || isset($_POST['telefon']) || isset($_POST['email']) || isset($_POST['adres']) || isset($_POST['instagram']) || isset($_POST['haftaici-saatler']) || isset($_POST['haftasonu-saatler'])) {
	// isim
	$isim = $db->prepare("UPDATE genel SET metin = ? WHERE tur='isim'");
	$insert_isim = $isim->execute(array($_POST['isim']));

	// slogan
	$slogan = $db->prepare("UPDATE genel SET metin = ? WHERE tur='slogan'");
	$insert_slogan = $slogan->execute(array($_POST['slogan']));

	// iletişim
	$iletisim_arr = array('telefon', 'email', 'adres', 'instagram', 'haftaici-saatler', 'haftasonu-saatler');

	$hata = false;
	foreach ($iletisim_arr as $i) {
		$iletisim_query = $db->prepare("UPDATE iletisim SET deger = ? WHERE tur='$i'");
		$insert_iletisim = $iletisim_query->execute(array($_POST[$i]));
		if (! $insert_iletisim) {
			echo "<script>alert('Güncellemede de hata oluştu!');</script>";
			$hata = true;
			break;
		}
	}
}

$genel_isim = $db->query("SELECT * FROM genel WHERE tur='isim'")->fetch(PDO::FETCH_ASSOC);
$genel_slogan = $db->query("SELECT * FROM genel WHERE tur='slogan'")->fetch(PDO::FETCH_ASSOC);
$adres = $db->query("SELECT * FROM iletisim WHERE tur='adres'")->fetch(PDO::FETCH_ASSOC);
$telefon = $db->query("SELECT * FROM iletisim WHERE tur='telefon'")->fetch(PDO::FETCH_ASSOC);
$email = $db->query("SELECT * FROM iletisim WHERE tur='email'")->fetch(PDO::FETCH_ASSOC);
$instagram = $db->query("SELECT * FROM iletisim WHERE tur='instagram'")->fetch(PDO::FETCH_ASSOC);
$haftaici_saatler = $db->query("SELECT * FROM iletisim WHERE tur='haftaici-saatler'")->fetch(PDO::FETCH_ASSOC);
$haftasonu_saatler = $db->query("SELECT * FROM iletisim WHERE tur='haftasonu-saatler'")->fetch(PDO::FETCH_ASSOC);

?>

<div class="main-content container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title text-center">Genel</h4>
		</div>
		<div class="card-content">
			<div class="card-body">
				<form action="" method="POST" class="form form-vertical">
					<div class="form-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="first-name-vertical">Manav adı</label>
									<input type="text" id="first-name-vertical" class="form-control" name="isim" placeholder="Manav adı" maxlength="50" value="<?php echo $genel_isim['metin']; ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="email-id-vertical">Slogan</label>
									<input type="text" id="email-id-vertical" class="form-control" name="slogan" placeholder="Slogan" maxlength="200" value="<?php echo $genel_slogan['metin']; ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="contact-info-vertical">Telefon</label>
									<input type="text" id="contact-info-vertical" class="form-control" name="telefon" placeholder="Telefon" value="<?php echo $telefon['deger']; ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="password-vertical">Email</label>
									<input type="email" id="password-vertical" class="form-control" name="email" placeholder="Email" value="<?php echo $email['deger']; ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="password-vertical">İnstagram</label>
									<input type="text" id="password-vertical" class="form-control" name="instagram" placeholder="Kullanıcı adı" value="<?php echo $instagram['deger']; ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="password-vertical">Adres</label>
									<input type="text" id="password-vertical" class="form-control" name="adres" placeholder="Adres" value="<?php echo $adres['deger']; ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="password-vertical">Çalışma saatleri <span style="color:gray; font-size:small">(örn: 9:00 - 21:00)</span></label>
									<input type="text" id="password-vertical" class="form-control" name="haftaici-saatler" placeholder="Hatfa içi" value="<?php echo $haftaici_saatler['deger']; ?>">
									<br>
									<input type="text" id="password-vertical" class="form-control" name="haftasonu-saatler" placeholder="Hafta sonu" value="<?php echo $haftasonu_saatler['deger']; ?>">
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1">Onayla</button>
								<button type="reset" class="btn btn-light-secondary me-1 mb-1">İptal</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script> document.querySelector('div.sidebar-menu > ul.menu > li.sidebar-item:nth-child(2)').classList.add('active'); </script>

<?php include './footer.php'; ?>