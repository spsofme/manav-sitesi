<?php
include './head.php';

// resim silme
if ($_POST['hakkimizda_sil']) {
	// veritabanından silme
	$ID = intval($_POST['hakkimizda_sil']);
	$query = $db->prepare("DELETE FROM resim_hakkimizda WHERE ID = ?");
	$insert = $query->execute(array($ID));
	if (! $insert)
		echo "<script>alert('Silme işleminde hata oluştu!');</script>";

	// dosyayı silme
	$dosya = $db->query("SELECT * FROM resim_hakkimizda WHERE ID = ?")->fetch(PDO::FETCH_ASSOC);
	$dosya_yolu = ".."."/assets/images/about/".$dosya;
	if(file_exists($dosya_yolu)){
		unlink($dosya_yolu);
	} else
		echo "<script>alert('Dosya bulunamadı!');</script>";
} else if ($_POST['urunler_sil']) {
	// veritabanından silme
	$ID = intval($_POST['urunler_sil']);
	$query = $db->prepare("DELETE FROM resim_urunler WHERE ID = ?");
	$insert = $query->execute(array($ID));
	if (! $insert)
		echo "<script>alert('Silme işleminde hata oluştu!');</script>";
		
	// dosyayı silme
	$dosya = $db->query("SELECT * FROM resim_urunler WHERE ID = ?")->fetch(PDO::FETCH_ASSOC);
	$dosya_yolu = ".."."/assets/images/products/".$dosya;
	if(file_exists($dosya_yolu)){
		unlink($dosya_yolu);
	} else
		echo "<script>alert('Dosya bulunamadı!');</script>";
}

// resim yükleme
if($_POST['tablo']) {
	if ($_POST['tablo'] == 'resim_hakkimizda')
		$konum = '/assets/images/about';
	else if ($_POST['tablo'] == 'resim_urunler')
		$konum = '/assets/images/products';
	else {
		echo "<script>alert('Resim konumunda hata oluştu');</script>";
		exit;
	}
    if ($_FILES["resim"]["size"]<5120*5120) { //Dosya boyutunu aldık ve 5Mb'tan az olmasını söyledik.
		if (strlen($_FILES["resim"]["name"]) > 25) {
			echo "<script>alert('Resim adı en fazla 25 karakter olabilir');</script>";
			exit;
		}

        if ($_FILES["resim"]["type"]=="image/jpeg" || $_FILES["resim"]["type"]=="image/jpg" || $_FILES["resim"]["type"]=="image/png"){  //Dosya tipi aldık ve jpeg, jpg, png olmasını söyledik.
            $dosya_adi = $_FILES["resim"]["name"];  //Dosya adını aldık.
 
            //Resimi kayıt ederken yeni bir isim oluşturalım
            $uret=array("cv","fg","th","lu","er");
            $uzanti=explode('.',$dosya_adi)[1];
			$ad=explode('.',$dosya_adi)[0];
            $sayi_tut1=rand(1000,9999);
            $sayi_tut2=rand(1000,9999);
            $sayi_tut3=rand(1000,9999);
            $sayi_tut4=rand(1000,9999);
 
            $yeni_ad = $ad.$uret[rand(0,4)].$sayi_tut1.$sayi_tut2.$sayi_tut3.$sayi_tut4.".".$uzanti;
 
            if (move_uploaded_file($_FILES["resim"]["tmp_name"], "..".$konum."/".$yeni_ad)) {
                echo "<script>alert('Dosya başarıyla yüklendi.');</script>";
 
				if ($_POST['tablo'] == 'resim_hakkimizda') {
					$sorgu = $db->prepare("INSERT INTO resim_hakkimizda (resim_adi, konum) VALUES (:resim, :konum)");
					$sorgu->execute(array(':resim'=> $yeni_ad, ':konum'=>$konum));
					if(! $sorgu)
						echo "<script>alert('Kayıt sırasında bir sorun oluştu!');</script>";
				} else {
					$sorgu = $db->prepare("INSERT INTO resim_urunler (resim_adi, konum) VALUES (:resim, :konum)");
					$sorgu->execute(array(':resim'=> $yeni_ad, ':konum'=>$konum));
					if(! $sorgu)
						echo "<script>alert('Kayıt sırasında bir sorun oluştu!');</script>";
				}
			} else
				echo "<script>alert('Dosya Yüklenemedi!');</script>";
		} else
			echo "<script>alert('Dosya jpeg, jpg, png formatlarında olabilir!');</script>";
    } else
        echo "<script>alert('Dosya boyutu 5 Mb\'ı geçmemeli!');</script>";
}
// logoyu değiştirme
else if ($_POST['logo']) {
	if ($_FILES["resim"]["size"]<1024*1024) { //Dosya boyutunu aldık ve 1Mb'tan az olmasını söyledik.
        if ($_FILES["resim"]["type"]=="image/png") {  //Dosya tipi aldık png olmasını söyledik.
			// dosyayı silme
			$dosya_yolu = '../assets/images/icon.png';
			if(file_exists($dosya_yolu))
				unlink($dosya_yolu);
			else {
				echo "<script>alert('Dosya bulunamadı!');</script>";
				exit;
			}
		

            if (move_uploaded_file($_FILES["resim"]["tmp_name"], $dosya_yolu))
                echo "<script>alert('Dosya başarıyla yüklendi.');</script>";
			else
				echo "<script>alert('Dosya Yüklenemedi!');</script>";
		} else
			echo "<script>alert('Dosya jpeg, jpg, png formatlarında olabilir!');</script>";
    } else
        echo "<script>alert('Dosya boyutu 5 Mb\'ı geçmemeli!');</script>";
}

// listeleme sorguları
$resim_urunler = $db->query("SELECT * FROM resim_urunler");
$resim_hakkimizda = $db->query("SELECT * FROM resim_hakkimizda");
?>

<div class="main-content container-fluid">
	<!-- logo resmini değiştirme -->
	<div class="card">
		<div class="card-header text-center">
			<h4 class="card-title text-center">Logo</h4>
			<span style="text-transform:none;">(<span class="text-danger"> Önceki logo silinir </span>)</span>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<form action="" method="POST">
						<div class="form-file">
							<input type="file" class="form-file-input" name="logo">
						</div>
						<br>

						<div class="col-12 d-flex">
							<button type="submit" class="btn btn-primary me-1 mb-1">Yükle</button>
							<button type="reset" class="btn btn-light-secondary me-1 mb-1">İptal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- hakkımızda için resim yükleme -->
	<div class="card">
		<div class="card-header text-center">
			<h4 class="card-title text-center">Resim Yükle</h4>
			<span style="text-transform:none;">( <span style="color:cyan">Hakkımızda</span> için )</span>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-file">
							<input type="file" class="form-file-input" name="resim">
						</div>
						<input type="text" name="tablo" style="display: none;" value="resim_hakkimizda">

						<br>

						<div class="col-12 d-flex">
							<button type="submit" class="btn btn-primary me-1 mb-1">Yükle</button>
							<button type="reset" class="btn btn-light-secondary me-1 mb-1">İptal</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<hr>

		<div class="card-header text-center">
			<h4 class="card-title text-center">Resimleri Listele</h4>
			<span style="text-transform:none;">( <span style="color:cyan">Hakkımızda</span> için )</span>
		</div>

		<div class="card-content">
			<!-- table hover -->
			<div class="table-responsive">
				<table class="table table-hover mb-0">
					<thead>
						<tr>
							<th>Resim</th>
							<th>ResimAdı</th>
							<th>Eylem</th>
						</tr>
					</thead>
					<tbody>
						<form action="" method="POST">
							<?php foreach ($resim_hakkimizda->fetchAll(PDO::FETCH_ASSOC) as $resim) { ?>
								<tr>
									<td>
										<img class="img-fluid" style="width: 3rem;" src="<?php echo "..".$resim['konum']."/".$resim['resim_adi']; ?>">
									</td>
									<td>
										<span><?php echo $resim['resim_adi']; ?></span>
									</td>
									<td>
										<button type="submit" class="btn btn-outline-danger" onclick="document.getElementById('hakkimizda_sil').value = '<?php echo $resim['ID']; ?>';">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
												<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
												<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
											</svg>
										</button>
									</td>
								</tr>
							<?php } ?>
							<input type="text" name="hakkimizda_sil" id="hakkimizda_sil" style="display: none;" value="">
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- ürünler için resim yükleme -->
	<div class="card">
		<div class="card-header text-center">
			<h4 class="card-title text-center">Resim Yükle</h4>
			<span style="text-transform:none;">( <span style="color:cyan">Ürünler</span> için )</span>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-file">
							<input type="file" class="form-file-input" name="resim">
						</div>
						<input type="text" name="tablo" style="display: none;" value="resim_urunler">

						<br>

						<div class="col-12 d-flex">
							<button type="submit" class="btn btn-primary me-1 mb-1">Yükle</button>
							<button type="reset" class="btn btn-light-secondary me-1 mb-1">İptal</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<hr>

		<div class="card-header text-center">
			<h4 class="card-title text-center">Resimleri Listele</h4>
			<span style="text-transform:none;">( <span style="color:cyan">Ürünler</span> için )</span>
		</div>

		<div class="card-content">
			<!-- table hover -->
			<div class="table-responsive">
				<table class="table table-hover mb-0">
					<thead>
						<tr>
							<th>Resim</th>
							<th>ResimAdı</th>
							<th>Eylem</th>
						</tr>
					</thead>
					<tbody>
						<form action="" method="POST">
							<?php foreach ($resim_urunler->fetchAll(PDO::FETCH_ASSOC) as $resim) { ?>
								<tr>
									<td>
										<img class="img-fluid" style="width: 3rem;" src="<?php echo "..".$resim['konum']."/".$resim['resim_adi']; ?>">
									</td>
									<td>
										<span><?php echo $resim['resim_adi']; ?></span>
									</td>
									<td>
										<button type="submit" class="btn btn-outline-danger" onclick="document.getElementById('urunler_sil').value = '<?php echo $resim['ID']; ?>';">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
												<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
												<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
											</svg>
										</button>
									</td>
								</tr>
							<?php } ?>
							<input type="text" name="urunler_sil" id="urunler_sil" style="display: none;" value="">
						</form>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script> document.querySelector('div.sidebar-menu > ul.menu > li.sidebar-item:nth-child(6)').classList.add('active'); </script>
<?php include './footer.php'; ?>