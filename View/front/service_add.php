<?php
session_start();
error_reporting(1);
if (strlen($_SESSION['idlogin'] == 0)) {
	header("location:logout.php");
} else {
	include('../../ConfigDB.php');
	include_once '../../Model/service.php';
	include_once '../../Controller/ProductController.php';
	include_once '../../Controller/QueryController.php';
	$productController = new ProductController();
	$error = "";


	if (
		isset($_POST["idusr"]) &&
		isset($_POST["titre"]) &&
		isset($_POST["desc"]) &&
		isset($_POST["prix"]) &&
		isset($_POST["quant"])
	) {
		if (
			!empty($_POST["idusr"]) &&
			!empty($_POST["titre"]) &&
			!empty($_POST["desc"]) &&
			!empty($_POST["prix"]) &&
			!empty($_POST["quant"])
		) {
			$target_dir = "../uploads/";
			$tempName = basename($_FILES["fileToUpload"]["name"]);
			$ext = substr($tempName, strrpos($tempName, '.') + 1);
			$fname = "img" . "-" . uniqid() . "." . $ext;
			$target_file = $target_dir . $fname;
			$image_name = $fname;
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if ($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}

			// Check if file already exists
			if (file_exists($target_file)) {
				$error = "Sorry, file already exists.";
				$uploadOk = 0;
			}

			// Check file size
			else  if ($_FILES["fileToUpload"]["size"] > 2000000) {
				$error = "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats
			else  if (
				$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
			) {
				$error = $imageFileType . ": Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			else if ($uploadOk == 0) {
				$error = "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$service = new service(
					$_SESSION['idlogin'],
					$_POST["titre"],
					$_POST["desc"],
					$_POST["prix"],
					$_POST["quant"],
					$image_name,
					"",
					""
				);
				if ($_POST['typeservice'] == "artistique") {
					$productController->addProduct($service, "art");
					header("location:services.php");
				} else if ($_POST['typeservice'] == "culturelle") {
					$productController->addProduct($service, "cult");
					header("location:services.php");
				} else {
					echo '<script type="text/javascript">alert("Valeur ' . $_POST['typeservice'] . '");</script>';
				}
			} else {
				$error = "Sorry, there was an error uploading your file!";
			}
		} else
			$error = "Invalid values";
	}
}
?>


<html lang="en">

<head>
	<title>Ajouter une service</title>
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

		<?php include_once 'header.php' ?>

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
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Ajouter Service</a></li>
					</ul>
				</div>

			</div>
		</div>

		<!-- Contact Us -->

		<div class="row">

			<div class="col-lg-12 get_in_touch_col">
				<div class="get_in_touch_contents">
					<h1>Ajouter une Service</h1>
					<p>Vous devez remplir ce formulaire.</p>
					<form method="post" enctype="multipart/form-data">
						<div>
							<input id="input_name" class="form_input input_name input_ph" type="number" name="idusr" value=<?php echo $_SESSION['idlogin']; ?> hidden>
							<input id="input_email" class="form_input input_email input_ph" type="text" name="titre" placeholder="Titre" required="required" data-error="Valid email is required.">
							<textarea id="input_message" class="input_ph input_message" name="desc" placeholder="Description" rows="3" required data-error="Message Vide !"></textarea>
							<input id="input_website" class="form_input input_website input_ph" type="calendar" name="prix" placeholder="prix" required="required" data-error="Name is required.">
							<input id="input_email" class="form_input input_email input_ph" type="text" name="quant" placeholder="Quantite" required="required" data-error="Valid email is required.">
							<div>
								<input type="file" name="fileToUpload" id="fileToUpload">
							</div>
							<input name="typeservice" list="typeservice" class="form_input input_email input_ph">
							<datalist id="typeservice" aria-placeholder="Type Produit">
								<option value="artistique">
								<option value="culturelle">
							</datalist>
						</div>
						<div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">Ajouter</button>
						</div>
						<?php
						if (strlen($error) > 0) {
							echo "<script type='text/javascript'>alert('$error');</script>";
						}
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
			new google.translate.TranslateElement({
				pageLanguage: 'en'
			}, 'google_translate_element');
		}
	</script>

	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>