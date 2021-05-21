<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
    }
	else{
    include_once '../../Model/reclamation.php';
    include_once '../../Controller/reclamationC.php';
    $reclamationC = new reclamationC();
    $error = "";

    if (
        isset($_POST["titreRec"]) &&
        isset($_POST["descRec"]) && 
        isset($_POST["dateRec"])
    ){
        if (
            !empty($_POST["titreRec"]) &&
            !empty($_POST["descRec"]) && 
            !empty($_POST["dateRec"])
        ){
            $reclamations = new reclamation(
                $_SESSION['idlogin'],
                $_POST["titreRec"], 
                $_POST["descRec"],
                $_POST["dateRec"]
            );
			$reclamationC->ajouterReclamation($reclamations);
            $error="Message envoyer!";
        }
        else
            $error = "Probleme.";
    }}
?>


<html lang="en">
<head>
<title>Contact Us</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">Livraison gratuite sur toutes les commandes de plus de 100 DT</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">
								
								<!-- Currency / Language / My Account -->
								<li class="account">
									<a href="#">
										Mon Compte
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="index.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
										<li><a href="index.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Inscription</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">Mini<span>Art</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="home.php">Acceuil</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Promotions</a></li>
								<li><a href="#">A propos</a></li>
								<li><a href="contact.php">contact</a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
								<li><a href="index.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li class="checkout">
									<a href="#">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items">2</span>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>

	</ul>

	</div>

	<div class="container contact_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
					</ul>
				</div>

			</div>
		</div>

		<!-- Contact Us -->

		<div class="row">

			<div class="col-lg-6 contact_col">
				<div class="contact_contents">
					<h1>Contactez-Nous</h1>
					<p>Les équipes MiniArt sont toujours à votre écoute.Vous pouvez nous contacter directement par email, téléphone ou courrier.</p>
					<div>
						<p>(216) 29-000-000</p>
						<p>Support@miniArt.com</p>
					</div>
					<div>
						<p>Pour ne manquer aucune actualité, suivez-nous sur nos réseaux sociaux.</p>
					</div>
					<div>
						<p>En Ligne: 8.00-18.00 Lundi-Vendredi</p>
						<p>Dimanche: Fermer</p>
					</div>
				</div>

				<!-- Follow Us -->

				<div class="follow_us_contents">
					<h1>suivez-nous</h1>
					<ul class="social d-flex flex-row">
						<li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>

			</div>

			<div class="col-lg-6 get_in_touch_col">
				<div class="get_in_touch_contents">
					<h1>Besoin d'aide !</h1>
					<p>Vous devez remplir ce formulaire.</p>
					<form method="post" onsubmit="return verifContact();">
						<div>
							<input id="idUsr" class="form_input input_name input_ph" type="number" name="idUsr" value=<?php echo $_SESSION['idlogin']; ?> hidden>
							<input id="tit" class="form_input input_email input_ph" type="text" name="titreRec" placeholder="Titre" required="required">
							<input id="dateRec" class="form_input input_website input_ph" type="calendar" name="dateRec" placeholder="Date" required="required" data-error="Name is required." value="<?php $date=date('Y/m/d'); echo $date; ?>" hidden>
							<textarea id="descRec" class="input_ph input_message" name="descRec"  placeholder="Message" rows="3" required data-error="Message Vide !"></textarea>
						</div>
						<div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">Envoyer</button>
						</div>
						<?php
						if(strlen($error) > 0) {echo "<script type='text/javascript'>alert('$error');</script>";}
						?>
					</form>
				</div>
			</div>

		</div>
	</div>

	<!-- Newsletter -->

	<form action="newsletter.php" method="GET">
	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Inscription</h4>
						<p>Recevez les dernières promotions jusqu'à 50% de réduction par e-mail</p>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="post">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" name="newsletter_email" type="email" placeholder="Votre email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Inscription</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</form>

	<!-- Footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Contact</a></li>
							<li><a href="#">FAQ</a></li>
							<div id="google_translate_element"></div>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="https://www.facebook.com/Hamza.FIFA2/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="Ma3andish Twitter ya Akh"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="Manish Maghroum bih"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="Hamza.FIFA2"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="NON"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">© 2021 Par ExeCode.</div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>