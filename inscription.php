<?php


include "inc/function.php";
$showRegistrationAlert = 0;
$categories = getAllCategories();
if (!empty($_POST)) { //click sur le bouton sauvegarder 
	if (AddVisiteur($_POST)) {
		$showRegistrationAlert = 1;
	}
}

// 1 - connexion vers la BD
$servername = "localhost";

$DBuser = "root";

$DBpassword = "";

$DBname = "ms - memia";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}


// 2 - creation de la requête
$requete = "SELECT * FROM categories";

// 3 - execution de la requête

$resultat = $conn->query($requete);

// 4 - resultat de la requête

$categories = $resultat->fetchAll();

//var_dump($categories);


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
	<title>Memia - Epicerie.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="css/slicknav.min.css">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/responsive.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.11/sweetalert2.min.css">

</head>

<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->



	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +216 00 000 000</li>
								<li><i class="ti-email"></i> memia@gmail.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i>Nos localisations</li>
								<li><i class="ti-user"></i> <a href="inscription.php">S'inscrire</a></li>
								<li><i class="ti-power-off"></i><a href="connexion.php">Se connecter</a></li>
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="images/logo.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						
						<div class="mobile-nav"></div>
					</div>
				

				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">

						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
												<li class="active"><a href="#">Acceuil</a></li>

												<!--Importation des categories de la bd-->
												<li><a href="#">Catégories<i class="ti-angle-down"></i><span class="new">Nouveau</span></a>
													<ul class="dropdown">
														<?php
														foreach ($categories as $categorie) {
															print '<li><a href="#">' . $categorie['nom'] . '</a></li>';
														}
														?>
													</ul>
												</li>
												<li><a href="produits.php">Nos Produits </a></li>
												<li><a href="#">Nos Promotions</a></li>
												<li><a href="#">Blog</a></li>
												<li><a href="#">About as</a></li>
												<li><a href="contact.php">Contact Us</a></li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Accueil<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="inscription.html">S'inscrire</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

		<!-- Start Contact -->
		<section id="contact-us" class="contact-us section">
			<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>Créer un compte</h4>
									<h3>Inscrivez-vous</h3>
								</div>
								<form class="form" method="post" action="inscription.php">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Nom<span>*</span></label>
												<input name="nom" type="text" placeholder="Entrer votre nom">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Prénom<span>*</span></label>
												<input name="prenom" type="text" placeholder="Entrer votre prénom" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email" type="email" placeholder="Entrer votre email" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Mot de passe<span>*</span></label>
												<input name="mp" type="password" placeholder="Entrer votre mot de passe" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Téléphone<span>*</span></label>
												<input name="telephone" type="text" placeholder="Entrer votre téléphone" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group message">
												<label>Adresse<span>*</span></label>
												<input name="adresse" type="text" placeholder="Entrer votre adresse" required >
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" class="btn ">S'inscrire</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Appelez-Nous:</h4>
									<ul>
										<li>+216 00-000-000</li>
										<li>+216 00-000-000</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
										<li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>Emplacement</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Contact -->

		<!-- Map Section -->
		<div class="map-section">
			<div id="myMap"></div>
		</div>
		<!--/ End Map Section -->


		<!-- Start Footer Area -->
		<footer class="footer">
			<!-- Footer Top -->
			<div class="footer-top section">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer about">
								<div class="logo">
									<a href="index.html"><img src="images/logo2.png" alt="#"></a>
								</div>
								<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
								<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Information</h4>
								<ul>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Faq</a></li>
									<li><a href="#">Terms & Conditions</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Customer Service</h4>
								<ul>
									<li><a href="#">Payment Methods</a></li>
									<li><a href="#">Money-back</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Shipping</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer social">
								<h4>Get In Tuch</h4>
								<!-- Single Widget -->
								<div class="contact">
									<ul>
										<li>NO. 342 - London Oxford Street.</li>
										<li>012 United Kingdom.</li>
										<li>info@eshop.com</li>
										<li>+032 3456 7890</li>
									</ul>
								</div>
								<!-- End Single Widget -->
								<ul>
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-flickr"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->
			<div class="copyright">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="left">
									<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a> - All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="right">
									<img src="images/payments.png" alt="#">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- /End Footer Area -->



		<!-- Jquery -->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<!-- Popper JS -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>
		<!-- Slicknav JS -->
		<script src="js/slicknav.min.js"></script>
		<!-- Owl Carousel JS -->
		<script src="js/owl-carousel.js"></script>
		<!-- Magnific Popup JS -->
		<script src="js/magnific-popup.js"></script>
		<!-- Fancybox JS -->
		<script src="js/facnybox.min.js"></script>
		<!-- Waypoints JS -->
		<script src="js/waypoints.min.js"></script>
		<!-- Jquery Counterup JS -->
		<script src="js/jquery-counterup.min.js"></script>
		<!-- Countdown JS -->
		<script src="js/finalcountdown.min.js"></script>
		<!-- Nice Select JS -->
		<script src="js/nicesellect.js"></script>
		<!-- Ytplayer JS -->
		<script src="js/ytplayer.min.js"></script>
		<!-- Flex Slider JS -->
		<script src="js/flex-slider.js"></script>
		<!-- ScrollUp JS -->
		<script src="js/scrollup.js"></script>
		<!-- Onepage Nav JS -->
		<script src="js/onepage-nav.min.js"></script>
		<!-- Easing JS -->
		<script src="js/easing.js"></script>
		<!-- Google Map JS -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>
		<script src="js/gmap.min.js"></script>
		<script src="js/map-script.js"></script>
		<!-- Active JS -->
		<script src="js/active.js"></script>
</body>

<script>"https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.11/sweetalert2.all.min.js"</script>
<?php
if($showRegistrationAlert == 1){
	print "
	<script>
	Swal.fire({
		title: 'Inscrit !',
		text : 'Création du compte avec succés.',
		icon : 'success',
		confirmButtonText : 'ok',
		timer : 2000
	})
	</script>
	";
	}

?>

</html>