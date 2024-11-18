<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Wedding of <?php echo $undangan['nama_lengkap_pria']; ?> & <?php echo $undangan['nama_lengkap_wanita']; ?>
	</title>

	<!-- Font Awesome Icons -->
	<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
		rel='stylesheet' type='text/css'>

	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

	<link rel="stylesheet" href="https://npmcdn.com/sweetalert2@4.0.15/dist/sweetalert2.min.css">

	<!-- Theme CSS - Includes Bootstrap -->
	<link href="<?php echo base_url(); ?>assets/css/creative.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/creative.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body id="page-top">
	<?php if ($error): ?>
		<div class="alert-error">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			<?php echo $error; ?>.
		</div>
	<?php endif; ?>
	<?php if ($success): ?>
		<div class="alert-success">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
			<?php echo $success; ?>.
		</div>
	<?php endif; ?>

	<audio id="weddingMusic" autoplay loop>
		<source src="<?php echo base_url(); ?>assets/audio/audio1.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
	</audio>



	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
		<div class="container nav-name">

			<a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo $undangan['nama_panggilan_pria']; ?> &
				<?php echo $undangan['nama_panggilan_wanita']; ?></a>

			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
				data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto my-2 my-lg-0">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#invitation">Invitation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#location">Location</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#gift">Gift</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="#guestbook">Guestbook</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<button id="muteButton" class="mute-button" onclick="toggleMute()">
        <i id="muteIcon" class="fas fa-volume-up"></i> <!-- Default is Unmuted -->
    </button>


	<!-- Masthead -->
	<header class="masthead">
		<div class="container h-100">
			<div class="row h-100 align-items-center justify-content-center text-center">
				<div class="col-lg-8 align-self-end heading-style">
					<h2 class="text-white-75 font-weight-bold"><?php echo $undangan['kalimat_1']; ?> </h2>
				</div>
				<div class="col-lg-8 align-self-baseline heading-style">
					<p class="text-white-75 font-weight-light"><?php echo $undangan['kalimat_2']; ?> </p>
				</div>
				<div class="col-lg-8 align-self-baseline heading-style-name">
					<p class="text-white-75 font-weight-bold"><?php echo $undangan['nama_lengkap_pria']; ?> </p>

					<span class="text-white-75 font-weight-light"><?php echo $undangan['orangtua_pria']; ?> </span>
				</div>

				<div class="col-lg-8 align-self-baseline and-space and-style">
					<span class="text-white-75 font-weight-light">&</span>
				</div>

				<div class="col-lg-8 align-self-baseline heading-style-name">
					<p class="text-white-75 font-weight-bold"><?php echo $undangan['nama_lengkap_wanita']; ?> </p>

					<p style="font-family: 'La Belle Aurore', cursive !important; font-size: 17px !important;"
						class="mb-180 text-white-75 font-weight-light"><?php echo $undangan['orangtua_wanita']; ?> </p>
				</div>
			</div>
		</div>
	</header>

	<!-- Elemen Audio -->
	<!-- <audio controls>
		<source src="assets/audio/audio1.mp3" type="audio/mp3">
		Browser Anda tidak mendukung elemen audio.
	</audio> -->

	<!-- Tombol Mute/Unmute -->
	<!-- <button id="muteButton">Mute</button> -->

	<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-b533ffa"
		data-id="b533ffa" data-element_type="column">
		<div class="elementor-widget-wrap elementor-element-populated">
			<div class="elementor-element elementor-element-ccfb800 elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-weddingpress-audio"
				data-id="ccfb800" data-element_type="widget"
				data-settings="{&quot;sticky&quot;:&quot;bottom&quot;,&quot;sticky_offset&quot;:60,&quot;loop&quot;:&quot;yes&quot;,&quot;sticky_on&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;],&quot;sticky_effects_offset&quot;:0}"
				data-widget_type="weddingpress-audio.default">
				<div class="elementor-widget-container">
					<script>
						var settingAutoplay = 'yes';
						window.settingAutoplay = settingAutoplay === 'disable' ? false : true;
					</script>

					<div id="audio-container" class="audio-box">



						<audio id="song" loop>
							<source
								src="https://www.kalacerita.com/wp-content/uploads/2024/04/Cintanya-Aku-Tiara-Andini-Arsy-Widianto.mp3"
								type="audio/mp3">
						</audio>



						<div class="elementor-icon-wrapper" id="unmute-sound" style="display: none;">
							<div class="elementor-icon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									width="150pt" height="150pt" viewBox="0 0 150 150">
									<g id="surface1">
										<path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
											d="M 128.789062 48.148438 C 127.089844 46.566406 119.722656 51.324219 118.589844 52.160156 C 120.835938 50.492188 116.527344 51.261719 115.171875 51.003906 C 113.644531 50.703125 112.152344 50.234375 110.730469 49.605469 C 106.957031 47.984375 103.90625 45.175781 101.320312 42.007812 C 96.707031 36.347656 93.871094 29.5 89.933594 23.40625 C 86.21875 17.628906 81.601562 12.992188 75.371094 10.105469 C 69 7.148438 61.84375 5.980469 56.882812 0.5625 C 54.359375 -2.191406 40.703125 5.863281 41.660156 9.453125 C 49.863281 39.984375 54.308594 71.40625 54.898438 103.015625 C 38.035156 102.070312 14.230469 116.269531 21.871094 135.9375 C 28.796875 153.769531 54.949219 154.015625 65.96875 140.230469 C 71.523438 133.277344 69.902344 120.785156 70.140625 112.34375 C 70.46875 100.742188 70.269531 89.152344 69.539062 77.570312 C 68.324219 58.15625 65.648438 38.859375 61.53125 19.84375 C 62.019531 20.078125 62.5 20.324219 62.980469 20.578125 C 72.238281 25.546875 76.324219 35.363281 81.460938 44 C 85.984375 51.613281 92.0625 58.929688 101.136719 60.679688 C 109.679688 62.324219 118.121094 58.878906 124.933594 53.808594 C 126.300781 52.78125 130.800781 50.019531 128.789062 48.148438 Z M 128.789062 48.148438 ">
										</path>
										<path
											style="fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;stroke-width:20;stroke-linecap:butt;stroke-linejoin:miter;stroke:rgb(0%,0%,0%);stroke-opacity:1;stroke-miterlimit:10;"
											d="M 27.994792 417.005208 L 410 12.005208 "
											transform="matrix(0.3,0,0,0.3,0,0)"></path>
									</g>
								</svg>
							</div>
						</div>

						<div class="elementor-icon-wrapper" id="mute-sound" style="display: none;">
							<div class="elementor-icon">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
									width="150pt" height="150pt" viewBox="0 0 150 150">
									<g id="surface1">
										<path style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;"
											d="M 128.789062 48.148438 C 127.089844 46.566406 119.722656 51.324219 118.589844 52.160156 C 120.835938 50.492188 116.527344 51.261719 115.171875 51.003906 C 113.644531 50.703125 112.152344 50.234375 110.730469 49.605469 C 106.957031 47.984375 103.90625 45.175781 101.320312 42.007812 C 96.707031 36.347656 93.871094 29.5 89.933594 23.40625 C 86.21875 17.628906 81.601562 12.992188 75.371094 10.105469 C 69 7.148438 61.84375 5.980469 56.882812 0.5625 C 54.359375 -2.191406 40.703125 5.863281 41.660156 9.453125 C 49.863281 39.984375 54.308594 71.40625 54.898438 103.015625 C 38.035156 102.070312 14.230469 116.269531 21.871094 135.9375 C 28.796875 153.769531 54.949219 154.015625 65.96875 140.230469 C 71.523438 133.277344 69.902344 120.785156 70.140625 112.34375 C 70.46875 100.742188 70.269531 89.152344 69.539062 77.570312 C 68.324219 58.15625 65.648438 38.859375 61.53125 19.84375 C 62.019531 20.078125 62.5 20.324219 62.980469 20.578125 C 72.238281 25.546875 76.324219 35.363281 81.460938 44 C 85.984375 51.613281 92.0625 58.929688 101.136719 60.679688 C 109.679688 62.324219 118.121094 58.878906 124.933594 53.808594 C 126.300781 52.78125 130.800781 50.019531 128.789062 48.148438 Z M 128.789062 48.148438 ">
										</path>
									</g>
								</svg>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Acara Section -->
	<section class="page-section page-section2 " id="invitation">
		<div class="container">
			<div class="row justify-content-center">
				<div class="container text-center mb-50">
					<div class="row date-style">
						<div class="col-sm">
							<h2><?php echo $undangan['acara_1']; ?></h2>
							<p>
								<span><?php echo $undangan['waktu_acara_1']; ?></span>
							</p>
						</div>
						<div class="col-sm date-wedding-style">
							<h1><?php echo $undangan['hari_undangan']; ?></h1>
							<p>
							<h1><?php echo $undangan['tgl_undangan']; ?></h1>
							</p>
							<hr class="divider light my-4">
						</div>
						<div class="col-sm">
							<h2><?php echo $undangan['acara_2']; ?></h2>
							<p>
								<span><?php echo $undangan['waktu_acara_2']; ?></span>
							</p>
						</div>
					</div>
				</div>

				<div class="col-lg-8 text-center invitation-style">
					<h1>Tempat</h1>
					<h2 class="mb-4"><?php echo $undangan['ket_tempat']; ?></h2>
					<p class="mb-4"><?php echo $undangan['alamat_lengkap']; ?></p>

					<hr class="divider light my-4">

					<h4>Save the Date</h4>

					<a target="_blank"
						href="https://calendar.google.com/event?action=TEMPLATE&amp;tmeid=NDVna2g4bGJvNGQ4Z3NzcXI5cWw5dTc5M2YgZW5jZXAuc3VyeWFuYWpyQG0&amp;tmsrc=encep.suryanajr%40gmail.com"><img
							border="0" src="assets/img/icon-calendar.gif" style="width : 20px"></a>

				</div>
			</div>
		</div>
	</section>

	<!-- Lokasi Section -->
	<section class="pb-0 page-section invitation-maps" id="location">
		<h2>Lokasi Pernikahan</h2>
		<hr class="divider my-4">

		<div class="container wedding-maps">
			<?php echo $undangan['google_maps']; ?>
		</div>
	</section>

	<!-- Gift Section -->
	<section class="page-section" id="gift">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center guestbook-style">
					<h2 class="mt-0">Wedding Gift</h2>
					<!-- Rekening Pria -->
					<div style="display: grid; place-content: center;">
						<div style="position: relative; display: inline-block;">
							<img src="<?php echo base_url(); ?>assets/img/atm-card.png" class="user-image"
								alt="user photo">
							<!-- Overlay text inside the image -->
							<!-- Overlay text inside the image with copy button -->
							<p
								style="position: absolute; top: 12%; color:white; left: 14%; transform: translateX(-50%); width: 70px; height: auto; z-index: 1;">
								<?php echo $undangan['nabank_pria']; ?>
							</p>
							<p id="norek_pria"
								style="position: absolute; top: 40%; left: 70%; transform: translate(-50%, -50%); margin: 0; color: white; font-weight: bold;">
								<?php echo $undangan['norek_pria']; ?>
							</p>
							<p
								style="position: absolute; top: 50%; left: 70%; width: 145px; transform: translate(-50%, -50%); margin: 0; color: white; font-weight: bold;">
								<?php echo $undangan['narek_pria']; ?>
							</p>
							<button id="copyBtnPria" onclick="copyNorekPria()"
								style="position: absolute; top: 74%; left: 14%; transform: translate(-50%, 0); background-color: transparent; color: white; border: none; padding: 5px 10px; cursor: pointer;">
								Copy
							</button>
						</div>
					</div>
					<!-- Rekening Wanita -->
					<div style="display: grid; place-content: center;">
						<div style="position: relative; display: inline-block;">
							<img src="<?php echo base_url(); ?>assets/img/atm-card.png" class="user-image"
								alt="user photo">
							<!-- Overlay text inside the image -->
							<!-- Overlay text inside the image with copy button -->
							<p
								style="position: absolute; top: 12%; color:white; left: 14%; transform: translateX(-50%); width: 70px; height: auto; z-index: 1;">
								<?php echo $undangan['nabank_wanita']; ?>
							</p>
							<p id="norek_wanita"
								style="position: absolute; top: 40%; left: 70%; transform: translate(-50%, -50%); margin: 0; color: white; font-weight: bold;">
								<?php echo $undangan['norek_wanita']; ?>
							</p>
							<p
								style="position: absolute; top: 50%; left: 70%; width: 145px; transform: translate(-50%, -50%); margin: 0; color: white; font-weight: bold;">
								<?php echo $undangan['narek_wanita']; ?>
							</p>
							<button id="copyBtnWanita" onclick="copyNorekWanita()"
								style="position: absolute; top: 74%; left: 14%; transform: translate(-50%, 0); background-color: transparent; color: white; border: none; padding: 5px 10px; cursor: pointer;">
								Copy
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Guestbook Section -->
	<section class="page-section" id="guestbook">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center guestbook-style">
					<h2 class="mt-0">Guestbook</h2>
					<hr class="divider my-4">
					<p class="text-muted mb-5"><?php echo $undangan['kata_pernikahan']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="container contact-form">

					<?php echo form_open_multipart(base_url(), array('class' => 'form-horizontal')); ?>

					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama"
										value="<?php if (isset($_POST['nama_lengkap'])) {
											echo $_POST['nama_lengkap'];
										} ?>" />
								</div>
								<div class="form-group">
									<input type="text" name="kontak" class="form-control" placeholder="No. Telp/Kontak"
										value="<?php if (isset($_POST['kontak'])) {
											echo $_POST['kontak'];
										} ?>" />
								</div>
								<div class="form-group">
									<input type="text" name="sosial_media" class="form-control"
										placeholder="Sosial Media" value="<?php if (isset($_POST['sosial_media'])) {
											echo $_POST['sosial_media'];
										} ?>" />
								</div>
								<div class="form-group">
									<select name="hadir" class="form-control select2">
										<option value="Hadir">Hadir</option>
										<option value="Tidak">Tidak</option>
										<option value="Tidak">Mungkin</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<textarea name="ucapan" class="form-control"
										placeholder="Ucapan/Doa untuk kedua mempelai."
										style="width: 100%; height: 200px;"><?php if (isset($_POST['ucapan'])) {
											echo $_POST['ucapan'];
										} ?></textarea>
								</div>
								<div class="form-group">
									<input id="btn-a" type="submit" name="form1" class="btnContact"
										value="Kirim Ucapan" />
								</div>
							</div>
						</div>
					</form>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="page-section " id="guestbook">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center guestbook-style">
					<h2 class="mt-0">Terima Kasih atas semua Ucapan/Do'a dari Kalian</h2>
					<hr class="divider my-4">
				</div>
			</div>
			<div class="row">
				<?php
				foreach ($guestbook as $row) {
					?>
					<div class="guestbook-card-style col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="box-part text-center">
							<div class="guestbook-card">
								<div class="title">
									<h2><?php echo $row['nama_lengkap']; ?></h2>
									<span><?php echo $row['kontak']; ?> / <?php echo $row['sosial_media']; ?></span>
									<p>(<?php echo $row['hadir']; ?>)</p>
									<hr class="divider my-4">

								</div>

								<div class="text">
									<span><?php echo $row['ucapan']; ?></span>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>

			</div>
		</div>
	</section>

	<!-- Doa Section -->
	<section class="page-section page-section2 bg-primary" id="invitation">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center invitation-style">
					<p class="mb-4">
						<?php echo $undangan['doa_pernikahan']; ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="bg-light py-5">
		<div class="container">
			<div class="small text-center text-muted">Wedding of <?php echo $undangan['nama_lengkap_pria']; ?> &
				<?php echo $undangan['nama_lengkap_wanita']; ?>
			</div>
		</div>
	</footer>

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Plugin JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Custom scripts for this template -->
	<script src="<?php echo base_url(); ?>assets/js/creative.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

	<script>
		function copyNorekPria() {
			var norekText = document.getElementById("norek_pria").innerText;

			var tempInput = document.createElement("textarea");
			tempInput.value = norekText;
			document.body.appendChild(tempInput);

			tempInput.select();
			tempInput.setSelectionRange(0, 99999);
			document.execCommand("copy");

			document.body.removeChild(tempInput);

			var copyButton = document.getElementById("copyBtnPria");
			copyButton.innerText = "Disalin";
			copyButton.style.backgroundColor = "transparent";

			setTimeout(function () {
				copyButton.innerText = "Copy";
				copyButton.style.backgroundColor = "transparent";
			}, 2000);
		}
	</script>

	<script>
		function copyNorekWanita() {
			var norekText = document.getElementById("norek_wanita").innerText;

			var tempInput = document.createElement("textarea");
			tempInput.value = norekText;
			document.body.appendChild(tempInput);

			tempInput.select();
			tempInput.setSelectionRange(0, 99999);
			document.execCommand("copy");

			document.body.removeChild(tempInput);

			var copyButton = document.getElementById("copyBtnWanita");
			copyButton.innerText = "Disalin";
			copyButton.style.backgroundColor = "transparent";

			setTimeout(function () {
				copyButton.innerText = "Copy";
				copyButton.style.backgroundColor = "transparent";
			}, 2000);
		}
	</script>


	<script>
		$(document).ready(function () {
			// Memeriksa jika musik sebelumnya sedang diputar
			if (localStorage.getItem('isMusicPlaying') === 'true') {
				var music = $('#weddingMusic')[0];
				music.play().catch(function (error) {
					console.warn('Autoplay is blocked by browser:', error);
				});
			}
		});
	</script>

	

</body>


</html>