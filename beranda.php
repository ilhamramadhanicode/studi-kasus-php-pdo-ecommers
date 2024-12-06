<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit();
}

require_once "Repository/Database.php";

$db = new Database();

$rows = $db->query("SELECT * FROM restoran");

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
		rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Beranda</title>
</head>

<body>


	<!-- Awal Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" id="judul" href="#">Kuliner Pedas</a>
			<button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto"
					style="font-family: 'Roboto', sans-serif; font-weight: 400; font-style: normal;">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#help">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="">Profile</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Akhir Navbar -->

	<!-- Awal Jumbotron -->
	<div class="jumbotron text-center">
		<img src="jumbo/seblak.jpg" alt="Seblak Pedas" class="rounded-circle img-thumbnail mt-2" width="200">
		<h1 class="mt-4">Kuliner Pedas</h1>
		<p>Tersedia Makanan & Minuman</p>
	</div>
	<!-- Akhir Jumbotron -->

	<!-- About Me  -->
	<div class="container" id="about" style="margin-top: 60px;">
		<div class="row text-center">
			<div class="col-md-12">
				<h2>Tentang Kami</h2>
			</div>
		</div>
		<div class="row text-center" style="margin-top: 50px;">
			<div class="col-md-6">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, dolores perspiciatis vitae
					dignissimos alias explicabo eaque laboriosam. Cupiditate, quod, omnis enim voluptatibus, iste quo
					voluptates inventore neque ipsa dicta ullam.
				</p>
			</div>
			<div class="col-md-6">
				<p>
					Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, temporibus nesciunt ex, numquam
					expedita doloribus non earum laboriosam atque ab ullam id, repellendus unde praesentium nisi error
					quaerat soluta magnam.
				</p>
			</div>
		</div>
	</div>

	<!-- Awal Menu -->
	<div class="container" id="menu1" style="margin-top: 100px;">
		<div class="row">
			<?php foreach ($rows as $row) { ?>
				<div class="col-md-4 mt-3">
					<div class="card">
						<div class="card-body">
							<img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="...">
							<h5 class="card-title mt-2"><?= $row["harga"]; ?></h5>
							<p class="card-text"><?= $row["category"] ?></p>
							<a href="#" class="btn btn-primary">Pesan Sekarang</a>
							<a href="ubah.php?id=<?= $row["id"]; ?>" style="margin-left: 8px;">Edit</a> | <a href="hapus.php?id=<?= $row["id"]; ?>">Hapus</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- Akhir Menu -->

	<!-- Awal Contact -->
	<section id="contact">
		<div class="container">
			<div class="row text-center mb-3">
				<div class="col">
					<h2>Contact Me</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8">
					<form>
						<div class="mb-3">
							<label for="name" class="form-label">Nama <span style="color: red;">*</span></label>
							<input type="text" autocomplete="off" class="form-control shadow-none" id="name"
								aria-describedby="emailHelp">
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email <span style="color: red;">*</span></label>
							<input type="text" autocomplete="off" class="form-control shadow-none" id="email"
								aria-describedby="emailHelp">
						</div>
						<div class="mb-3">
							<label for="pesan" class="form-label">Pesan <span style="color: red;">*</span></label>
							<textarea class="form-control shadow-none" autocomplete="off" id="pesan"
								rows="8" style="resize: none;"></textarea>
						</div>
						<button type="submit" class="btn btn-primary" style="width: 100%;">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Akhir Contact -->

	<!-- Awal Footer -->
	<footer class="text-center bg-primary">
		<div class="row">
			<div class="col-md-3 lead">
				<h3 class="text-white">Company</h3>
				<p class="fs-6"><a href="#">About</a></p>
				<p class="fs-6"><a href="#">Careers</a></p>
				<p class="fs-6"><a href="#">Support</a></p>
				<p class="fs-6"><a href="#">Pricing</a></p>
				<p class="fs-6"><a href="#">FAQ</a></p>
			</div>
			<div class="col-md-3 lead">
				<h3 class="text-white">Product</h3>
				<p class="fs-6"><a href="#">Seblak Pedas</a></p>
				<p class="fs-6"><a href="#">Ayam Geprek</a></p>
				<p class="fs-6"><a href="#">Minuman Ice Segar</a></p>
			</div>
			<div class="col-md-3 lead">
				<h3 class="text-white">Contact</h3>
				<p class="fs-6"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" style="fill: white; width: 20px;"
							viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
							<path
								d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
						</svg> +62
						821-2373-7452</a>
				</p>
				<p class="fs-6"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" style="fill: white; width: 20px;"
							viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
							<path
								d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
						</svg>
						kulinerpedas@gmail.com</a></p>
				<p class="fs-6"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" style="fill: white; width: 20px;"
							viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
							<path
								d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
						</svg> Tanjungsari,
						jl.margajaya 45362</a></p>
			</div>
			<div class="col-md-3 lead" id="help">
				<h3 class="text-white">Get Help</h3>
				<p class="fs-6"><a href="#">Help Center</a></p>
				<p class="fs-6"><a href="#">Contact Us</a></p>
				<p class="fs-6"><a href="#">Privact Policy</a></p>
				<p class="fs-6"><a href="#">Terms</a></p>
				<form action="logout.php" method="post">
					<button type="submit" class="btn btn-info text-white">Logout</button>
				</form>
			</div>
		</div>

		<div class="icon">
			<a href="#">
				<svg xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
					<path
						d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
				</svg>
			</a>
			<a href="#">
				<svg xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
					<path
						d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
				</svg>
			</a>
			<a href="#">
				<svg xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
					<path
						d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" />
				</svg>
			</a>
			<a href="#">
				<svg xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
					<path
						d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
				</svg>
			</a>
		</div>

		<hr class="text-white">
		<p class="text-white mt-5">© Copyright 2024 - Kuliner Pedas</p>
	</footer>
	<!-- Akhir Footer -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>

</body>

</html>