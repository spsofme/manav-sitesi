<?php
include './head.php';

if (isset($_POST['eylem'])) {
	// verileri düzenle
	// explode : split
	$eylem = explode(' ', $_POST['eylem'])[1];
	try {
		$ID = intval(explode(' ', $_POST['eylem'])[0]);
	} catch (Error $e) {
		exit;
	}
	if ($eylem == "kaydet") {
		$query = $db->prepare("UPDATE urunler SET urun_adi = ?, resim_adi = ?, tur = ? WHERE ID = ?");
		$insert = $query->execute(array($_POST['urun_adi-'.$ID], $_POST['resim_adi-'.$ID], $_POST['tur-'.$ID], $ID));
		if (! $insert)
			echo "<script>alert('Güncellemede hata oluştu!');</script>";
	} else if ($eylem == "sil") {
		$query = $db->prepare("DELETE FROM urunler WHERE ID = ?");
		$insert = $query->execute(array($ID));
		if (! $insert)
			echo "<script>alert('Silme işleminde hata oluştu!');</script>";
	}
} else if (isset($_POST['ekle_urun_adi']) || isset($_POST['ekle_resim_adi']) || isset($_POST['ekle_tur'])) {
	// veri ekle
	$query = $db->prepare("INSERT INTO urunler (urun_adi, resim_adi, tur) VALUES (?, ?, ?)");
	$insert = $query->execute(array($_POST['ekle_urun_adi'], $_POST['ekle_resim_adi'], $_POST['ekle_tur']));
	if (! $insert)
		echo "<script>alert('Veri eklemede hata oluştu!');</script>";
}

$urunler = $db->query("SELECT * FROM urunler ORDER BY tur ASC");
?>

<div class="main-content container-fluid">
	<!-- veri ekleme -->
	<div class="card">
		<div class="card-header">
			<h4 class="card-title text-center">Ürün ekle</h4>
		</div>
		<div class="card-content">
			<div class="card-body">
				<form action="" method="POST" class="form form-vertical">
					<div class="form-body">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="contact-info-vertical">Resim adı <span style="font-size: small; color:gray;text-transform:none;">(<a href="" style="text-decoration: none; color: cyan;">Resimler</a> menüsünden resim adına bakabilirsiniz.)</span></label>
									<input type="text" class="form-control" name="ekle_resim_adi" placeholder="Resim adı" maxlength="500">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="first-name-vertical">Ürün Adı</label>
									<input type="text" class="form-control" name="ekle_urun_adi" placeholder="Tür" maxlength="50">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="first-name-vertical">Tür</label>
									<select class="form-select" id="basicSelect" name="ekle_tur">
										<option onclick="document.getElementById('ekle_tur').value='Meyve'">Meyve</option>
										<option onclick="document.getElementById('ekle_tur').value='Sebze'">Sebze</option>
										<option onclick="document.getElementById('ekle_tur').value='Baklagil'">Baklagil</option>
										<option onclick="document.getElementById('ekle_tur').value='Baharat'">Baharat</option>
									</select>
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<button type="submit" class="btn btn-primary me-1 mb-1">Ekle</button>
								<button type="reset" class="btn btn-light-secondary me-1 mb-1">İptal</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- veri düzenleme -->
	<div class="card">
		<div class="card-header">
			<h4 class="card-title text-center">Ürünleri Düzenle</h4>
		</div>
		<div class="card-content">
			<!-- table hover -->
			<div class="table-responsive">
				<table class="table table-hover mb-0">
					<thead>
						<tr>
							<th>Resim Adı</th>
							<th>Ürün Adı</th>
							<th>Tür</th>
							<th>Eylem</th>
						</tr>
					</thead>
					<tbody>
						<form action="" method="POST">
							<?php foreach ($urunler->fetchAll(PDO::FETCH_ASSOC) as $urun) { ?>
								<tr>
									<td>
										<input type="text" id="resim_adi-<?php echo $urun['ID']; ?>" name="resim_adi-<?php echo $urun['ID']; ?>" value="<?php echo $urun['resim_adi']; ?>" maxlength="50">
									</td>
									<td>
										<input type="text" id="urun_adi-<?php echo $urun['ID']; ?>" name="urun_adi-<?php echo $urun['ID']; ?>" value="<?php echo $urun['urun_adi']; ?>" maxlength="50">
									</td>
									<td>
										<select class="form-select" name="tur-<?php echo $urun['ID']; ?>">
											<?php $tur_arr = array('Meyve', 'Sebze', 'Baklagil', 'Baharat'); ?>
											
											<option><?php echo $urun['tur']; ?></option>
											
											<?php
											foreach($tur_arr as $tur) {
												if ($tur != $urun['tur']) {
											?>
												<option><?php echo $tur; ?></option>
											<?php }} ?>
										</select>
									</td>
									<td>
										<div class="btn-group" role="group">
											<button type="submit" class="btn btn-outline-primary" onclick="document.getElementById('eylem').value = '<?php echo $urun['ID']; ?> kaydet';">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
													<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
												</svg>
											</button>
											<button type="submit" class="btn btn-outline-danger" onclick="document.getElementById('eylem').value = '<?php echo $urun['ID']; ?> sil';">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
													<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
													<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
												</svg>
											</button>
										</div>
									</td>
								</tr>
							<?php } ?>
							<input type="text" name="eylem" id="eylem" style="display: none;" value="">
						</form>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>

<script> document.querySelector('div.sidebar-menu > ul.menu > li.sidebar-item:nth-child(4)').classList.add('active'); </script>
<?php include './footer.php' ?>