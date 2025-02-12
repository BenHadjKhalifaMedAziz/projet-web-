<?php
session_start();
error_reporting(1);
if (strlen($_SESSION['idlogin'] == 0)) {
	header("location:index.php");
}
include('../../ConfigDB.php');
include_once '../../Controller/ProductController.php';
$productController = new ProductController();
$products = $productController->getTopArtList();
$cultural = $productController->getTopCulturalList();
$img_url = "../uploads/";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>MiniArt - Bienvenue</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>

<body>

	<div class="super_container">

		<?php include_once 'header.php' ?>
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

		<!-- Slider -->

		<div class="main_slider" style="background-image:url(images/slider.jpg)">
			<div class="container fill_height">
				<div class="row align-items-center fill_height">
					<div class="col">
						<div class="main_slider_content">
							<h6>Le plus grand marché arabe pour l'achat et la vente de microservices</h6>
							<h1>Bienvenue au MiniArt</h1>
							<div class="red_button shop_now_button"><a href="#">Services</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Banner -->

		<div class="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="banner_item align-items-center" style="background-image:url(images/art.jpg)">
							<div class="banner_category">
								<a href="categories.html">Artistiques</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="banner_item align-items-center" style="background-image:url(images/culture.jpg)">
							<div class="banner_category">
								<a href="categories.html">Culturelles</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="banner_item align-items-center" style="background-image:url(images/promotion.jpg)">
							<div class="banner_category">
								<a href="categories.html">En Promotion</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- New Arrivals -->

		<div class="new_arrivals">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="section_title new_arrivals_title">
							<h2>Nouveau Services</h2>
						</div>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col text-center">
						<div class="new_arrivals_sorting">
							<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tout</li>
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".art">Artistiques</li>
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".cult">Culturelle</li>
								<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".promo">En Promotion</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

							<?php
							foreach ($products as $product) {
							?>
								<div class="product-item art">
									<div class="product discount product_filter">
										<div class="product_image" style="height: 300px;">
											<img style="height: -webkit-fill-available;object-fit: cover;" src="<?php echo $img_url.$product['img1'] ?>" alt="">
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>New</span></div>
										<div class="product_info">
											<h6 class="product_name">
												<a href="#">
													<?php
													$limit = 15;
													echo substr($product['titreProd'], 0, $limit);
													if (strlen($product['titreProd']) >= $limit) {
														echo '...';
													}
													?>
												</a>
											</h6>
											<div class="product_price"><?php echo $product['prixProd'] ?> Dt</div>
										</div>
									</div>
									<div class="red_button add_to_cart_button">
										<a href="<?php echo $productController->getProductUrl($product, 'art'); ?>">
											Details
										</a>
									</div>
								</div>
							<?php
							}
							foreach ($cultural as $product) {
							?>
								<div class="product-item cult">
									<div class="product discount product_filter">
										<div class="product_image" style="height: 300px;">
											<img style="height: -webkit-fill-available;object-fit: cover;" src="<?php echo $img_url.$product['img1'] ?>" alt="">
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>New</span></div>
										<div class="product_info">
											<h6 class="product_name">
												<a href="#">
													<?php
													$limit = 15;
													echo substr($product['titreProd'], 0, $limit);
													if (strlen($product['titreProd']) >= $limit) {
														echo '...';
													}
													?>
												</a>
											</h6>
											<div class="product_price"><?php echo $product['prixProd'] ?> Dt</div>
										</div>
									</div>
									<div class="red_button add_to_cart_button">
										<a href="<?php echo $productController->getProductUrl($product, 'cult'); ?>">
											Details
										</a>
									</div>
								</div>
							<?php
							}
							?>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Deal of the week -->

		<div class="deal_ofthe_week">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="deal_ofthe_week_img">
							<img src="images/deal of the week.jpg" alt="">
						</div>
					</div>
					<div class="col-lg-6 text-right deal_ofthe_week_col">
						<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
							<div class="section_title">
								<h2>Promotion de mois</h2>
							</div>
							<ul class="timer">
								<li class="d-inline-flex flex-column justify-content-center align-items-center">
									<div id="day" class="timer_num">03</div>
									<div class="timer_unit">Day</div>
								</li>
								<li class="d-inline-flex flex-column justify-content-center align-items-center">
									<div id="hour" class="timer_num">15</div>
									<div class="timer_unit">Hours</div>
								</li>
								<li class="d-inline-flex flex-column justify-content-center align-items-center">
									<div id="minute" class="timer_num">45</div>
									<div class="timer_unit">Mins</div>
								</li>
								<li class="d-inline-flex flex-column justify-content-center align-items-center">
									<div id="second" class="timer_num">23</div>
									<div class="timer_unit">Sec</div>
								</li>
							</ul>
							<div class="red_button deal_ofthe_week_button"><a href="#">Voir le Produit</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Best Sellers -->

		<div class="best_sellers">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="section_title new_arrivals_title">
							<h2>Meilleure Services</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="product_slider_container">
							<div class="owl-carousel owl-theme product_slider">

								<!-- Slide 1 -->

								<div class="owl-item product_slider_item">
									<div class="product-item">
										<div class="product discount">
											<div class="product_image">
												<img src="images/product_1.png" alt="">
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
												<div class="product_price">$520.00<span>$590.00</span></div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 2 -->

								<div class="owl-item product_slider_item">
									<div class="product-item women">
										<div class="product">
											<div class="product_image">
												<img src="images/product_2.png" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
												<div class="product_price">$610.00</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 3 -->

								<div class="owl-item product_slider_item">
									<div class="product-item women">
										<div class="product">
											<div class="product_image">
												<img src="images/product_3.png" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
												<div class="product_price">$120.00</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 4 -->

								<div class="owl-item product_slider_item">
									<div class="product-item accessories">
										<div class="product">
											<div class="product_image">
												<img src="images/product_4.png" alt="">
											</div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
											<div class="favorite favorite_left"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
												<div class="product_price">$410.00</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 5 -->

								<div class="owl-item product_slider_item">
									<div class="product-item women men">
										<div class="product">
											<div class="product_image">
												<img src="images/product_5.png" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
												<div class="product_price">$180.00</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 6 -->

								<div class="owl-item product_slider_item">
									<div class="product-item accessories">
										<div class="product discount">
											<div class="product_image">
												<img src="images/product_6.png" alt="">
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">Fujifilm X100T 16 MP Digital Camera (Silver)</a></h6>
												<div class="product_price">$520.00<span>$590.00</span></div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 7 -->

								<div class="owl-item product_slider_item">
									<div class="product-item women">
										<div class="product">
											<div class="product_image">
												<img src="images/product_7.png" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h6>
												<div class="product_price">$610.00</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 8 -->

								<div class="owl-item product_slider_item">
									<div class="product-item accessories">
										<div class="product">
											<div class="product_image">
												<img src="images/product_8.png" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">Blue Yeti USB Microphone Blackout Edition</a></h6>
												<div class="product_price">$120.00</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 9 -->

								<div class="owl-item product_slider_item">
									<div class="product-item men">
										<div class="product">
											<div class="product_image">
												<img src="images/product_9.png" alt="">
											</div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
											<div class="favorite favorite_left"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">DYMO LabelWriter 450 Turbo Thermal Label Printer</a></h6>
												<div class="product_price">$410.00</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Slide 10 -->

								<div class="owl-item product_slider_item">
									<div class="product-item men">
										<div class="product">
											<div class="product_image">
												<img src="images/product_10.png" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">Pryma Headphones, Rose Gold & Grey</a></h6>
												<div class="product_price">$180.00</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Slider Navigation -->

							<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</div>
							<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

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

		<!-- Blogs -->

		<div class="blogs">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="section_title">
							<h2>Latest Blogs</h2>
						</div>
					</div>
				</div>
				<div class="row blogs_container">
					<div class="col-lg-4 blog_item_col">
						<div class="blog_item">
							<div class="blog_background" style="background-image:url(images/blog_1.jpg)"></div>
							<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
								<h4 class="blog_title">Here are the trends I see coming this fall</h4>
								<span class="blog_meta">by admin | dec 01, 2017</span>
								<a class="blog_more" href="#">Read more</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 blog_item_col">
						<div class="blog_item">
							<div class="blog_background" style="background-image:url(images/blog_2.jpg)"></div>
							<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
								<h4 class="blog_title">Here are the trends I see coming this fall</h4>
								<span class="blog_meta">by admin | dec 01, 2017</span>
								<a class="blog_more" href="#">Read more</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 blog_item_col">
						<div class="blog_item">
							<div class="blog_background" style="background-image:url(images/blog_3.jpg)"></div>
							<div class="blog_content d-flex flex-column align-items-center justify-content-center text-center">
								<h4 class="blog_title">Here are the trends I see coming this fall</h4>
								<span class="blog_meta">by admin | dec 01, 2017</span>
								<a class="blog_more" href="#">Read more</a>
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