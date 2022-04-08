<?php
$adres = $db->query("SELECT * FROM iletisim WHERE tur='adres'")->fetch(PDO::FETCH_ASSOC);
$telefon = $db->query("SELECT * FROM iletisim WHERE tur='telefon'")->fetch(PDO::FETCH_ASSOC);
$email = $db->query("SELECT * FROM iletisim WHERE tur='email'")->fetch(PDO::FETCH_ASSOC);
$instagram = $db->query("SELECT * FROM iletisim WHERE tur='instagram'")->fetch(PDO::FETCH_ASSOC);
$haftaici_saatler = $db->query("SELECT * FROM iletisim WHERE tur='haftaici-saatler'")->fetch(PDO::FETCH_ASSOC);
$haftasonu_saatler = $db->query("SELECT * FROM iletisim WHERE tur='haftasonu-saatler'")->fetch(PDO::FETCH_ASSOC);
?>

<!-- FOOTER -->
		<footer class="footer container-fluid p-3" id="footer">
			<div class="row">
				<div class="card col-lg-3 col-md-6 col-sm-12">
					<div class="card-body">
						<h5 class="card-title text-info">Adres</h5>
						<address class="card-text">
							<p> <?php echo $adres['deger']; ?> </p>
						</address>
					</div>
				</div>
				<div class="card col-lg-3 col-md-6 col-sm-12">
					<div class="card-body">
						<h5 class="card-title text-info">Çalışma Saatleri</h5>
						<div class="card-text">
							<ul class="list-unstyled">
								<li>
									<ul class="list-inline">
										<li class="list-inline-item"><strong>Pazartesi - Cuma: </strong></li>
										<li class="list-inline-item"><?php echo $haftaici_saatler['deger']; ?></li>
									</ul>
								</li>
								<li>
									<ul class="list-inline">
										<li class="list-inline-item"><strong>Cumartesi - Pazar: </strong></li>
										<li class="list-inline-item"><?php echo $haftasonu_saatler['deger']; ?></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="card col-lg-3 col-md-6 col-sm-12">
					<div class="card-body">
						<h5 class="card-title text-info">Sipariş</h5>
						<div class="card-text">
							<ul class="list-unstyled">
								<li>
									<a href="tel:<?php echo str_replace(' ', '', $telefon['deger']); ?>" class="contact">
										<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
											<path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
										</svg>
										<p class="d-inline"><?php echo $telefon['deger']; ?></p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="card col-lg-3 col-md-6 col-sm-12">
					<div class="card-body">
						<h5 class="card-title text-info">İletişim</h5>
						<div class="card-text">
							<ul class="list-unstyled">
								<li>
									<a href="tel:<?php echo str_replace(' ', '', $telefon['deger']); ?>" class="contact">
										<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
											<path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
										</svg>
										<p class="d-inline"><?php echo $telefon['deger']; ?></p>
									</a>
								</li>
								<li>
									<a href="mailto:<?php echo $email['deger']; ?>" class="contact">
										<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
											<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
										</svg>
										<p class="d-inline"><?php echo $email['deger']; ?></p>
									</a>
								</li>
								<li>
									<a href="https://www.instagram.com/<?php echo $instagram['deger']; ?>" class="contact">
										<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
											<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
										  </svg>
										<p class="d-inline"><?php echo $instagram['deger']; ?></p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 text-center">2022 &copy; Tüm hakları saklıdır.<a href="https://github.com/spsofme" class="developer">Kerim Er</a></div>
			</div>
		</footer>
		
		<!-- JavaScript Libraries -->
		<!--<script src="../../kutuphaneler/popper.min.js"></script>-->
		<script src="./assets/js/bootstrap.min.js"></script>
		<script src="./assets/js/main.js"></script>
	</body>
</html>

<?php $db = null; ?>