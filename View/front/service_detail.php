<?php
session_start();
error_reporting(1);

if (strlen($_SESSION['idlogin'] == 0)) {
	header("location:logout.php");
}

include('../../ConfigDB.php');
include_once '../../Controller/ProductController.php';
include_once '../../Controller/QueryController.php';
$productController = new ProductController();
$queryController = new QueryController();
$img_url = "../uploads/";
$type = $_GET['type'];
$id = $_GET['id'];
$row = $productController->getOneByIdByType($id, $type);

$query2 = "select * from avisproduits where idProd=$id order by idAvis desc limit 3";
$ret2 = $queryController->getQueryResult($query2);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Single Product</title>
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
	<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
	<style>
		.btnr {
			left: 70%;
		}

		.etoiles {
			float: left;
			height: 46px;
			padding: 0 10px;
		}

		.etoiles:not(:checked)>input {
			position: absolute;
			top: -9999px;
		}

		.etoiles:not(:checked)>label {
			float: right;
			width: 1em;
			overflow: hidden;
			white-space: nowrap;
			cursor: pointer;
			font-size: 30px;
			color: #ccc;
		}

		.etoiles:not(:checked)>label:before {
			content: '★ ';
		}

		.etoiles>input:checked~label {
			color: #ffc700;
		}

		.etoiles:not(:checked)>label:hover,
		.etoiles:not(:checked)>label:hover~label {
			color: #deb217;
		}

		.etoiles>input:checked+label:hover,
		.etoiles>input:checked+label:hover~label,
		.etoiles>input:checked~label:hover,
		.etoiles>input:checked~label:hover~label,
		.etoiles>label:hover~input:checked~label {
			color: #c59b08;
		}
	</style>
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include_once 'header.php' ?>


		<div class="fs_menu_overlay"></div>

		<!-- Hamburger Menu -->

		<div class="fs_menu_overlay"></div>
		<div class="hamburger_menu">
			<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
			<div class="hamburger_menu_content text-right">
				<ul class="menu_top_nav">
					<li class="menu_item has-children">
						<a href="#">
							Mon Compte
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="menu_selection">
							<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
							<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Inscription</a></li>
						</ul>
					</li>
					<li class="menu_item"><a href="#">Acceuil</a></li>
					<li class="menu_item"><a href="#">Produits</a></li>
					<li class="menu_item"><a href="#">Services</a></li>
					<li class="menu_item"><a href="#">A propos</a></li>
					<li class="menu_item"><a href="#">contact</a></li>
				</ul>
			</div>
		</div>

		<div class="container single_product_container">
			<div class="row">
				<div class="col">

					<!-- Breadcrumbs -->

					<div class="breadcrumbs d-flex flex-row align-items-center">
						<ul>
							<li><a href="index.html">Acceuil</a></li>
							<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Services</a></li>
							<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Apercu et Achats</a></li>
						</ul>
					</div>

				</div>
			</div>

			<?php if ($row != null) { ?>
				<div class="row">
					<div class="col-lg-7">
						<div class="single_product_pics">
							<div class="row">
								<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
									<div class="single_product_thumbnails">
										<ul>
											<li><img src="<?php echo $img_url.$row['img1']; ?>" alt="" data-image="<?php echo $img_url.$row['img1']; ?>"></li>
											<li class="active"><img src="<?php echo $img_url.$row['img1']; ?>" alt="" data-image="<?php echo $img_url.$row['img1']; ?>"></li>
											<li><img src="<?php echo $img_url.$row['img1']; ?>" alt="" data-image="<?php echo $img_url.$row['img1']; ?>"></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-9 image_col order-lg-2 order-1">
									<div class="single_product_image">
										<div class="single_product_image_background" style="background-image:url(<?php echo $img_url.$row['img1']; ?>)"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="product_details">
							<div class="product_details_title">
								<h2><?php echo $row['titreProd']; ?></h2>
								<p><?php echo $row['descProd']; ?></p>
							</div>
							<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
								<span class="ti-truck"></span><span>Livraison Gratuite</span>
							</div>
							<div class="product_price"><?php echo $row['prixProd']; ?></div>
							<ul class="star_rating">
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
							</ul>

							<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
								<span>Quantite</span>
								<div class="quantity_selector">
									<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
									<span id="quantity_value">1</span>
									<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
								</div>
								<div class="red_button add_to_cart_button"><a href="#">Ajouter au Panier</a></div>
								<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
							</div>
						</div>
					</div>
				</div>

		</div>

		<!-- Tabs -->

		<div class="tabs_section_container">

			<div class="container">
				<div class="row">
					<div class="col">
						<div class="tabs_container">
							<ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
								<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
								<li class="tab" data-active-tab="tab_2"><span>Plus d'information</span></li>
								<li class="tab" data-active-tab="tab_3"><span>Avis</span></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">

						<!-- Tab Description -->

						<div id="tab_1" class="tab_container active">
							<div class="row">
								<div class="col-lg-5 desc_col">
									<div class="tab_title">
										<h4>Description</h4>
									</div>
									<div class="tab_text_block">
										<h2><?php echo $row['titreProd']; ?></h2>
										<p><?php echo $row['descProd']; ?></p>
									</div>
									<div class="tab_image">
										<img src="<?php echo $img_url.$row['img1']; ?>" alt="">
									</div>
								</div>

								<div class="col-lg-5 offset-lg-2 desc_col">
									<div class="tab_image">
										<img src="<?php echo $img_url.$row['img1']; ?>" alt="">
									</div>


								</div>
							</div>
						</div>

						<!-- Tab Additional Info -->

						<div id="tab_2" class="tab_container">
							<div class="row">
								<div class="col additional_info_col">
									<div class="tab_title additional_info_title">
										<h4>Additional Information</h4>
									</div>
									<p>SERVICE:<span><?php echo $row['titreProd']; ?></span></p>
									<p>Description:<span><?php echo $row['descProd']; ?></span></p>
									<p>Quantite:<span><?php echo $row['quantProd']; ?></span></p>
									<p>Livraison:<span>Gratuite</span></p>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- Tab Reviews -->

					<div id="tab_3" class="tab_container">
						<div class="row">

							<!-- User Reviews -->
							<div class="col-lg-6 reviews_col">
								<div class="tab_title reviews_title">
									<h4>Les Avis</h4>
								</div>
								<?php $rows = array();
								while ($row = mysqli_fetch_array($ret2)) {
									$rows[] = $row; ?>


									<!-- User Review -->

									<div class="user_review_container d-flex flex-column flex-sm-row">
										<div class="user">
											<div class="user_pic"></div>
											<div class="user_rating">
												<ul class="star_rating">
													<?php $cond = $row['etoiles'];
													for ($i = 1; $i <= $cond; $i++) { ?>
														<li><i class="fa fa-star" aria-hidden="true"></i></li>
													<?php } ?>
												</ul>
											</div>
										</div>
										<div class="review">
											<div class="review_date"><?php echo $row['dateAv']; ?></div>
											<div class="user_name"><?php echo $row['nomUt']; ?></div>
											<p><?php echo $row['message']; ?></p>
										</div>
									</div>
								<?php } ?>
								<!-- User Review -->


							</div>

							<!-- Add Review -->

							<div class="col-lg-6 add_review_col">

								<div class="add_review">
									<form id="review_form" onsubmit="return verifAvis();" method="get" action="feedback.php">
										<div>
											<h1>Ajouter un avis</h1>
											<input type="text" name="idUsr" value="<?php echo $_SESSION['idlogin']; ?>" hidden>
											<input type="text" name="idProd" value="<?php echo $idprod; ?>" hidden>
											<input id="nomUt" class="form_input input_name" type="text" name="nomUt" placeholder="Nom d'utilisateur" required="required">
											<input id="emailUt" class="form_input input_email" type="email" name="emailUt" placeholder="Email" required="required">
										</div>
										<div>

											<div class="etoiles">
												<input type="radio" id="star5" name="etoiles" value="5" />
												<label for="star5" title="Mrigla">5 stars</label>
												<input type="radio" id="star4" name="etoiles" value="4" />
												<label for="star4" title="cv">4 stars</label>
												<input type="radio" id="star3" name="etoiles" value="3" />
												<label for="star3" title="mosh khayeb">3 stars</label>
												<input type="radio" id="star2" name="etoiles" value="2" />
												<label for="star2" title="khayeb">2 stars</label>
												<input type="radio" id="star1" name="etoiles" value="1" />
												<label for="star1" title="te3ba">1 star</label>
											</div>
											<textarea id="message" class="input_review" name="message" placeholder="Votre Avis" rows="4" required data-error="Please, leave us a review."></textarea>
										</div>
										<div class="text-left text-sm-right">
											<button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">Envoyer</button>
										</div>
									</form>
								</div>

							</div>

						</div>
					</div>

					</div>
				</div>
			</div>

		</div>
		<?php
		if (strlen($error) > 0) {
			echo "<script type='text/javascript'>alert('$error');</script>";
		}
		?>
		<!-- Benefit -->

		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>LIVRAISON GRATUITE</h6>
								<p>Pour les commandes de plus de 100 DT</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Paiement à la livraison</h6>
								<p>payer lorsque vous recevez votre produit</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>30 Jours Pour les Retours</h6>
								<p>vous avez 30 jours pour retourner votre produit</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Support En Ligne</h6>
								<p>8AM - 09PM</p>
							</div>
						</div>
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
	<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="js/single_custom.js"></script>
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