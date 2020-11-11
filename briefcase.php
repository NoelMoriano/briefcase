<!DOCTYPE html>
<html lang="en">
<?php
require("./admin/control/classConnectionMySQL.php");

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="keyword" content="resume,cv,portfolio,vcard" />
		<title>Servitec - CV/Resume/Portfolio</title>
		<!-- favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
		<!-- bootstrap -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<!-- Plugin css -->
		<link rel="stylesheet" href="assets/css/plugin.css" />
		<!-- Flaticon -->
		<link rel="stylesheet" href="assets/css/flaticon.css" />
		<!-- stylesheet -->
		<link rel="stylesheet" href="assets/css/index.css" />
		<link rel="stylesheet" href="assets/css/multicolor.css" />
		<!-- responsive -->
		<link rel="stylesheet" href="assets/css/responsive.css" />
	</head>
	<?php
	$userId = $_GET["userId"];

        $queryProduct = "SELECT * FROM users WHERE id = $userId";
        $resultUsers = $newConn->ExecuteQuery($queryProduct);
         if ($resultUsers) {
            while ($rowUser = mysqli_fetch_array($resultUsers)) {
				$userPhoto = $rowUser['userPhoto'];
				$names = $rowUser['names'];
				$lastName = $rowUser['lastName'];
				$userEmail = $rowUser['userEmail'];
				$password= $rowUser['password'];
				$age = $rowUser['age'];
				$birthdayDate = $rowUser['birthdayDate'];
				$direction = $rowUser['direction'];
				$profession = $rowUser['profession'];
				$interests = $rowUser['interests'];
				$phone = $rowUser['phone']; 
				$description = $rowUser['description']; 
				$userFb = $rowUser['userFb']; 
				$userTwitter = $rowUser['userTwitter']; 
				$userLinkedin = $rowUser['userLinkedin']; 
				$coverPhoto = $rowUser['coverPhoto']; 
			 }
        }else{
            echo "<h5>Error en consulta contacte a soporte</h3>";
        }
        ?>
	<body>
		<!-- preloader area start -->
		<div class="preloader" id="preloader">
			<div class="loader loader-1">
				<div class="loader-outter"></div>
				<div class="loader-inner"></div>
			</div>
		</div>
		<!-- preloader area end -->

		<!--Main-Menu Area Start-->
		<div class="side-menu-wrapper">
			<div class="menu-toogle-icon">
				<div id="nav-icon3">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="side-menu">
				<div class="heading-area">
					<a href="briefcase.php" class="profile-photo">
						<img
							src="./admin/uploads/users/<?=$userPhoto?>"
							alt=""
							class="wow zoomIn"
							data-wow-delay="0.2s"
						/>
					</a>
					<div class="name wow fadeInUp" data-wow-delay="0.3s"><?=ucfirst($names)?></div>
				</div>
				<ul id="mainmenu-area">
					<li class="current">
						<a href="briefcase.php#home" class="wow fadeInUp" data-wow-delay="0.4s"
							><i class="fas fa-home"></i>Inicio</a
						>
					</li>
					<li>
						<a href="briefcase.php#about" class="wow fadeInUp" data-wow-delay="0.4s"
							><i class="fas fa-user"></i>Sobre Mi</a
						>
					</li>
					<li>
						<a href="briefcase.php#service" class="wow fadeInUp" data-wow-delay="0.4s"
							><i class="fas fa-briefcase"></i>Servicios</a
						>
					</li>
					<li>
						<a href="briefcase.php#resume" class="wow fadeInUp" data-wow-delay="0.4s"
							><i class="fas fa-file-alt"></i>Resumen</a
						>
					</li>
					<!--<li>
						<a href="briefcase.php#project-gallery" class="wow fadeInUp" data-wow-delay="0.4s"
							><i class="fas fa-layer-group"></i>Portfolio</a
						>
					</li>
					<li>
						<a href="briefcase.php#blog" class="wow fadeInUp" data-wow-delay="0.4s"
							><i class="fab fa-blogger"></i>Blog</a
						>
					</li>-->
					<li>
						<a href="briefcase.php#contact" class="wow fadeInUp" data-wow-delay="0.4s"
							><i class="fab fa-whatsapp"></i>Contacto</a
						>
					</li>
				</ul>
			</div>
		</div>
		<!--Main-Menu Area Start-->

		<!-- Main Content Area Start -->
		<div class="main-content">
			<div class="main-content-inner">
				<!-- About div Start -->
				<div class="home-section" id="home" style="background-image:url('./admin/uploads/users/<?=$coverPhoto?>')">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-6">
								<div class="home-content">
									<div class="home-image">
										<img
											src="./admin/uploads/users/<?=$userPhoto?>"
											alt=""
											class="wow zoomIn"
											data-wow-delay="0.2s"
										/>
									</div>
									<div class="home-main-content">
										<h4 class="heading wow fadeInUp" data-wow-delay="0.3s"><?=ucfirst($names)." ".ucfirst($lastName)?></h4>
										<div class="designation wow zoomIn" data-wow-delay="0.4s">
											<span> Soy <span class="typed"></span> </span>
										</div>
										<div class="social-info wow fadeInUp" data-wow-delay="0.5s">
											<ul>
												<?php echo $userFb
												? "<li>
													<a href='$userFb' target='_blank'>
														<i class='fab fa-facebook-f'></i>
													</a>
												</li>"
												: ""
												?>
												
												<?php echo $userTwitter
												? "<li>
													<a href='$userTwitter' target='_blank'>
														<i class='fab fa-twitter'></i>
													</a>
												</li>"
												: ""
												?>

												<?php echo $userLinkedin
												? "<li>
													<a href='$userLinkedin' target='_blank'>
														<i class='fab fa-linkedin-in'></i>
													</a>
												</li>"
												: ""
												?>								
											</ul>
										</div>
										<div class="about-links wow fadeInUp" data-wow-delay="0.6s">
											<a href="mailto:<?=$userEmail?>" class="mybtn3 mybtn-bg">
												<span>Contáctame</span></a
											>
											<!--<a
												href="https://www.youtube.com/watch?v=6zM4p_A0ISk"
												class="mybtn3 mybtn-bg video-play mfp-iframe"
											>
												<span> <i class="fas fa-play"></i> Intro</span>
											</a>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- About div End -->

				<!-- About div Start -->
				<div class="about-section" id="about">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										Acerca <span class="color">de Mi</span>
										<span class="bg-text">Acerca De</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="about">
									<div class="row">
										<div class="col-lg-4">
											<div class="about-image wow fadeInUp" data-wow-delay="0.3s">
												<img src="./admin/uploads/users/<?=$userPhoto?>" alt="" />
											</div>
										</div>
										<div class="col-lg-8 align-self-center">
											<div class="short-description wow fadeInUp">
												<p>
												<?=$description?>
												</p>
												<!--<div class="about-links">
													<a href="briefcase.php#" class="mybtn3 mybtn-bg"> <span>Descargar CV</span> </a>
												</div>-->
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="about-content wow fadeInUp">
												<div class="personal-info">
													<ul>
														<li>
															<span><label>Cumpleaños: &nbsp</label><?=$birthdayDate?></span>
														</li>
														<li>
															<span><label>Edad:</label><?=$age?></span>
														</li>
														<li>
															<span><label>Dirección:</label><?=$direction?></span>
														</li>
														<li>
															<span><label>Intereses:</label><?=$interests?></span>
														</li>
														<li>
															<span><label>Profesion:</label><?=$profession?></span>
														</li>
														<li>
															<span
																><label>Email:</label>
																<a href="mailto:<?=$userEmail?>"><?=$userEmail?></a></span
															>
														</li>
														<li>
															<span
																><label>Teléfono:</label>
																<a href="briefcase.php#"><?=$phone?></a></span
															>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- About div End -->


				<!-- Counter Area Start -->
				<!--<div class="counter-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-6">
								<div class="single-counter wow fadeInUp">
									<img src="assets/images/icon/005-target.png" alt="" />
									<div class="counter-wrapper">
										<div class="counter">80</div>
										<span>k+</span>
									</div>
									<p class="text">Proyecto terminado</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="single-counter wow fadeInUp">
									<img src="assets/images/icon/002-medical-mask.png" alt="" />
									<div class="counter-wrapper">
										<div class="counter">19</div>
										<span>k+</span>
									</div>
									<p class="text">Usuarios felices</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="single-counter wow fadeInUp">
									<img src="assets/images/icon/053-success-1.png" alt="" />
									<div class="counter-wrapper">
										<div class="counter">39</div>
										<span>k+</span>
									</div>
									<p class="text">Excelentes críticas</p>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="single-counter wow fadeInUp">
									<img src="assets/images/icon/045-hacker.png" alt="" />
									<div class="counter-wrapper">
										<div class="counter">50</div>
										<span>+</span>
									</div>
									<p class="text">Equipo de apoyo</p>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				<!-- Counter Area End -->

				<!-- My service Start -->
				<!--<div class="service-wrapper" id="service">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										My <span class="color">Services</span>
										<span class="bg-text">Services</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-4 col-md-6">
								<a href="service-details.html" class="single-feature wow fadeInUp">
									<img src="assets/images/icon/024-server.png" alt="" />
									<div class="content">
										<h4 class="title">Amazon AWS</h4>
										<p>
											Clarinet accustomed. Would legs of framework officers. We've to morning like a
											contracting
										</p>
									</div>
								</a>
							</div>
							<div class="col-lg-4 col-md-6">
								<a href="service-details.html" class="single-feature wow fadeInUp">
									<img src="assets/images/icon/062-code-1.png" alt="" />
									<div class="content">
										<h4 class="title">Web Development</h4>
										<p>
											Clarinet accustomed. Would legs of framework officers. We've to morning like a
											contracting
										</p>
									</div>
								</a>
							</div>
							<div class="col-lg-4 col-md-6">
								<a href="service-details.html" class="single-feature wow fadeInUp">
									<img src="assets/images/icon/064-vector.png" alt="" />
									<div class="content">
										<h4 class="title">Creative design</h4>
										<p>
											Clarinet accustomed. Would legs of framework officers. We've to morning like a
											contracting
										</p>
									</div>
								</a>
							</div>
							<div class="col-lg-4 col-md-6">
								<a href="service-details.html" class="single-feature wow fadeInUp">
									<img src="assets/images/icon/043-analytics.png" alt="" />
									<div class="content">
										<h4 class="title">App Development</h4>
										<p>
											Clarinet accustomed. Would legs of framework officers. We've to morning like a
											contracting
										</p>
									</div>
								</a>
							</div>
							<div class="col-lg-4 col-md-6">
								<a href="service-details.html" class="single-feature wow fadeInUp">
									<img src="assets/images/icon/033-rocket.png" alt="" />
									<div class="content">
										<h4 class="title">Fast & Optimized</h4>
										<p>
											Clarinet accustomed. Would legs of framework officers. We've to morning like a
											contracting
										</p>
									</div>
								</a>
							</div>
							<div class="col-lg-4 col-md-6">
								<a href="service-details.html" class="single-feature wow fadeInUp">
									<img src="assets/images/icon/054-puzzle.png" alt="" />
									<div class="content">
										<h4 class="title">Pixel Precision</h4>
										<p>
											Clarinet accustomed. Would legs of framework officers. We've to morning like a
											contracting
										</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>-->

				<!-- My service End -->
				<br>
				<br>
				<br>
				<br>
				<br>

				<!-- Resume Area Start -->
				<!--<div class="resume-wrapper" id="resume">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										Mi <span class="color">CURRÍCULUM</span>
										<span class="bg-text">CURRÍCULUM</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="resume-box">
									<div class="resume-title">
										<h4 class="title">Educación</h4>
									</div>
									<div class="education-list">
										<div class="single-education wow fadeInUp">
											<div class="year">
												<span>2006-2008</span>
											</div>
											<h4 class="university-name">Envato University</h4>
											<p class="degree">MSC in Computer Engineer</p>
										</div>
										<div class="single-education wow fadeInUp">
											<div class="year">
												<span>2003-205</span>
											</div>
											<h4 class="university-name">Envato University</h4>
											<p class="degree">BSC in Computer Engineer</p>
										</div>
										<div class="single-education wow fadeInUp">
											<div class="year">
												<span>2000-2002</span>
											</div>
											<h4 class="university-name">Envato University</h4>
											<p class="degree">HSC in Computer Engineer</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="resume-box">
									<div class="resume-title">
										<h4 class="title">Experiencia</h4>
									</div>
									<div class="education-list">
										<div class="single-education wow fadeInUp">
											<div class="year">
												<span>2018-2020</span>
											</div>
											<h4 class="university-name">Peru hop</h4>
											<p class="degree">Full Stack Web Developer</p>
										</div>
										<div class="single-education wow fadeInUp">
											<div class="year">
												<span>2014-2018</span>
											</div>
											<h4 class="university-name">Servitec</h4>
											<p class="degree">Frontend Web Developer</p>
										</div>
										<div class="single-education wow fadeInUp">
											<div class="year">
												<span>2009-2011</span>
											</div>
											<h4 class="university-name">Envato Company</h4>
											<p class="degree">Web Designer</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="resume-box">
									<div class="resume-title">
										<h4 class="title">Habilidades técnicos</h4>
									</div>
									<div class="skill-list">
										<div class="single-skill wow fadeInUp">
											<div class="heading">
												<h4 class="name">Reparación laptops</h4>
												<h5 class="value">75%</h5>
											</div>
											<div class="progress">
												<div
													class="progress-bar progress-bar-striped progress-bar-animated"
													role="progressbar"
													aria-valuenow="85"
													aria-valuemin="0"
													aria-valuemax="100"
													style="width: 85%"
												></div>
											</div>
										</div>
										<div class="single-skill wow fadeInUp">
											<div class="heading">
												<h4 class="name">Reparación celulares</h4>
												<h5 class="value">75%</h5>
											</div>
											<div class="progress">
												<div
													class="progress-bar progress-bar-striped progress-bar-animated"
													role="progressbar"
													aria-valuenow="95"
													aria-valuemin="0"
													aria-valuemax="100"
													style="width: 95%"
												></div>
											</div>
										</div>
										<div class="single-skill wow fadeInUp">
											<div class="heading">
												<h4 class="name">Reparación impresoras</h4>
												<h5 class="value">75%</h5>
											</div>
											<div class="progress">
												<div
													class="progress-bar progress-bar-striped progress-bar-animated"
													role="progressbar"
													aria-valuenow="65"
													aria-valuemin="0"
													aria-valuemax="100"
													style="width: 65%"
												></div>
											</div>
										</div>
										<div class="single-skill wow fadeInUp">
											<div class="heading">
												<h4 class="name">Reparación tablets</h4>
												<h5 class="value">75%</h5>
											</div>
											<div class="progress">
												<div
													class="progress-bar progress-bar-striped progress-bar-animated"
													role="progressbar"
													aria-valuenow="75"
													aria-valuemin="0"
													aria-valuemax="100"
													style="width: 75%"
												></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="resume-box">
									<div class="resume-title">
										<h4 class="title">Habilidades linguísticas</h4>
									</div>
									<div class="skill-list">
										<div class="single-skill wow fadeInUp">
											<div class="heading">
												<h4 class="name">Español</h4>
												<h5 class="value">75%</h5>
											</div>
											<div class="progress">
												<div
													class="progress-bar progress-bar-striped progress-bar-animated"
													role="progressbar"
													aria-valuenow="75"
													aria-valuemin="0"
													aria-valuemax="100"
													style="width: 75%"
												></div>
											</div>
										</div>
										<div class="single-skill wow fadeInUp">
											<div class="heading">
												<h4 class="name">Ingles</h4>
												<h5 class="value">75%</h5>
											</div>
											<div class="progress">
												<div
													class="progress-bar progress-bar-striped progress-bar-animated"
													role="progressbar"
													aria-valuenow="95"
													aria-valuemin="0"
													aria-valuemax="100"
													style="width: 95%"
												></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="resume-box">
									<div class="resume-title">
										<h4 class="title">Professional Skills</h4>
									</div>
									<div class="skill-list2">
										<div class="single-skill2 wow fadeInUp">
											<div class="circle-progress" data-percent="80"></div>
											<h4 class="name">Web Design</h4>
										</div>
										<div class="single-skill2 wow fadeInUp">
											<div class="circle-progress" data-percent="90"></div>
											<h4 class="name">Web Devlopment</h4>
										</div>
										<div class="single-skill2 wow fadeInUp">
											<div class="circle-progress" data-percent="70"></div>
											<h4 class="name">Graphic Design</h4>
										</div>
										<div class="single-skill2 wow fadeInUp">
											<div class="circle-progress" data-percent="85"></div>
											<h4 class="name">Auto CAD</h4>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="resume-box">
									<div class="resume-title">
										<h4 class="title">Knowledge</h4>
									</div>
									<div class="knowledge-list wow fadeInUp">
										<div class="single-knowledge">
											<p>Search engine marketing</p>
										</div>
										<div class="single-knowledge">
											<p>iOS and android apps</p>
										</div>
										<div class="single-knowledge">
											<p>Spreadsheets (Excel, Google Spreadsheets, etc.)</p>
										</div>
										<div class="single-knowledge">
											<p>Email Communication</p>
										</div>
										<div class="single-knowledge">
											<p>Presentation software (PowerPoint, Keynote)</p>
										</div>
										<div class="single-knowledge">
											<p>Office suites (Microsoft Office, G Suite)</p>
										</div>
										<div class="single-knowledge">
											<p>Operating systems (Windows and MacOS)</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				<!-- Resume Area End -->

				<!-- My Client Area Area Strat -->
				<!--<div class="partners">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										My <span class="color">Clients</span>
										<span class="bg-text">Clients</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="partners-slider wow fadeInUp" data-wow-delay="0.3s">
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/1.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/2.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/3.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/4.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/5.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/6.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/7.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/8.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/9.png" alt="" />
									</a>
								</div>
								<div class="slider-item">
									<a href="briefcase.php#">
										<img src="assets/images/partner/10.png" alt="" />
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				<!-- My Client Area Area End -->

				<!-- Portfolio Area Start -->
				<!--<div class="project-gallery" id="project-gallery">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										My <span class="color">Portfolio</span>
										<span class="bg-text">Portfolio</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="project-gallery-filter d-flex justify-content-center">
									<ul
										class="project-gallery-menu d-inline-block wow fadeInUp"
										data-wow-delay="0.3s"
									>
										<li class="filter active" data-filter="all">All Cetagories</li>
										<li class="filter" data-filter=".cat-1">Marketing</li>
										<li class="filter" data-filter=".cat-2">Management</li>
										<li class="filter" data-filter=".cat-3">Consulting</li>
									</ul>
								</div>

								<div class="row project-gallery-item">
									<div class="mix col-md-6 col-lg-4 gallery-item cat-1 cat-3">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/7.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/7.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mix col-md-6 col-lg-4 gallery-item cat-3 cat-4">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/1.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/1.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mix col-md-6 col-lg-4 gallery-item cat-2 cat-1">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/2.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/2.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mix col-md-6 col-lg-4 gallery-item cat-1 cat-3">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/9.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/9.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mix col-md-6 col-lg-4 gallery-item cat-3 cat-4">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/5.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/5.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mix col-md-6 col-lg-4 gallery-item cat-1 cat-2">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/3.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/3.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mix col-md-6 col-lg-4 gallery-item cat-4 cat-2">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/4.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/4.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mix col-md-6 col-lg-4 gallery-item cat-3 cat-2">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/6.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/6.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mix col-md-6 col-lg-4 gallery-item cat-3 cat-1">
										<div class="gallery-item-content wow fadeInUp">
											<div class="item-thumbnail">
												<img src="assets/images/work/8.jpg" alt="" />
												<div class="content-overlay">
													<div class="content">
														<div class="links">
															<a href="portfolio-details.html" class="link"
																><i class="fas fa-link"></i
															></a>
															<a class="img-popup image-preview" href="assets/images/work/8.jpg">
																<i class="fas fa-eye"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 text-center">
								<a href="portfolios.html" class="mybtn3 mybtn-bg wow fadeInUp"
									><span>View All</span></a
								>
							</div>
						</div>
					</div>
				</div>-->
				<!-- Portfolio Area End -->

				<!-- Testimonial Start -->
				<!--<div class="testimonial" id="testimonial">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										My <span class="color">Testimonial</span>
										<span class="bg-text">Testimonial</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="testimonial-slider wow fadeInUp" data-wow-delay="0.3s">
									<div class="slider-item">
										<div class="single-review">
											<div class="stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="content">
												<p>
													Believed attentive assisted picture sharpness to I to she waved the are and
													slide understand the that set task. The you due back
												</p>
											</div>
											<div class="reviewr">
												<div class="img">
													<img src="assets/images/reviewr/p1.png" alt="" />
												</div>
												<div class="content">
													<h4 class="name">Austin Bishop</h4>
													<p>CEO at ABC</p>
												</div>
											</div>
										</div>
									</div>
									<div class="slider-item">
										<div class="single-review">
											<div class="stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="content">
												<p>
													Believed attentive assisted picture sharpness to I to she waved the are and
													slide understand the that set task. The you due back
												</p>
											</div>
											<div class="reviewr">
												<div class="img">
													<img src="assets/images/reviewr/p2.png" alt="" />
												</div>
												<div class="content">
													<h4 class="name">Alexander</h4>
													<p>CEO at DER</p>
												</div>
											</div>
										</div>
									</div>
									<div class="slider-item">
										<div class="single-review">
											<div class="stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="content">
												<p>
													Believed attentive assisted picture sharpness to I to she waved the are and
													slide understand the that set task. The you due back
												</p>
											</div>
											<div class="reviewr">
												<div class="img">
													<img src="assets/images/reviewr/p3.png" alt="" />
												</div>
												<div class="content">
													<h4 class="name">Sebastian</h4>
													<p>CEO at ECS</p>
												</div>
											</div>
										</div>
									</div>
									<div class="slider-item">
										<div class="single-review">
											<div class="stars">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
											</div>
											<div class="content">
												<p>
													Believed attentive assisted picture sharpness to I to she waved the are and
													slide understand the that set task. The you due back
												</p>
											</div>
											<div class="reviewr">
												<div class="img">
													<img src="assets/images/reviewr/p4.png" alt="" />
												</div>
												<div class="content">
													<h4 class="name">Christopher</h4>
													<p>CEO at XYZ</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				<!-- Testimonial End -->

				<!-- Pricing  Area Start -->
				<!--<div class="pricing2" id="pricing2">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										Pricing <span class="color">Packages</span>
										<span class="bg-text">Pricing</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-4 col-md-6">
								<div class="price-box basic wow fadeInUp">
									<div class="price-title">
										<h3 class="heading-title">Basic Plan</h3>
										<p class="heading-sub-title">This is basic Service Plan</p>
									</div>
									<div class="price-rate">
										<div class="center-align-content">
											<p class="price">$250</p>
											<p class="duration">/mo</p>
											<i class="fas fa-dollar-sign"></i>
										</div>
									</div>
									<div class="service-feature">
										<ul class="service-feature-list">
											<li>
												<p>Android Application</p>
											</li>
											<li>
												<p><del>IOS Application</del></p>
											</li>
											<li>
												<p><del>UX/UI Designs</del></p>
											</li>
											<li>
												<p>Wordpress Develop</p>
											</li>
											<li>
												<p>PSD to HTML</p>
											</li>
											<li>
												<p><del>Digital Marketing</del></p>
											</li>
											<li>
												<p>Content Editing</p>
											</li>
										</ul>
									</div>
									<div class="buy-btn-wrapper">
										<a class="mybtn3 mybtn-bg" href="briefcase.php#"
											><span>Start Now <i class="fas fa-shopping-cart"></i></span
										></a>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="price-box standard wow fadeInUp">
									<div class="price-title">
										<h3 class="heading-title">Standard Plan</h3>
										<p class="heading-sub-title">This is Standard Service Plan</p>
									</div>
									<div class="price-rate">
										<div class="center-align-content">
											<p class="price">$350</p>
											<p class="duration">/mo</p>
											<i class="fas fa-dollar-sign"></i>
										</div>
									</div>
									<div class="service-feature">
										<ul class="service-feature-list">
											<li>
												<p>Android Application</p>
											</li>
											<li>
												<p>IOS Application</p>
											</li>
											<li>
												<p><del>UX/UI Designs</del></p>
											</li>
											<li>
												<p>Wordpress Develop</p>
											</li>
											<li>
												<p>PSD to HTML</p>
											</li>
											<li>
												<p>Digital Marketing</p>
											</li>
											<li>
												<p>Content Editing</p>
											</li>
										</ul>
									</div>
									<div class="buy-btn-wrapper">
										<a class="mybtn3 mybtn-bg" href="briefcase.php#"
											><span>Start Now <i class="fas fa-shopping-cart"></i></span
										></a>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="price-box premium wow fadeInUp">
									<div class="price-title">
										<h3 class="heading-title">Premium Plan</h3>
										<p class="heading-sub-title">This is Premium Service Plan</p>
									</div>
									<div class="price-rate">
										<div class="center-align-content">
											<p class="price">$450</p>
											<p class="duration">/mo</p>
											<i class="fas fa-dollar-sign"></i>
										</div>
									</div>
									<div class="service-feature">
										<ul class="service-feature-list">
											<li>
												<p>Android Application</p>
											</li>
											<li>
												<p>IOS Application</p>
											</li>
											<li>
												<p>UX/UI Designs</p>
											</li>
											<li>
												<p>Wordpress Develop</p>
											</li>
											<li>
												<p>PSD to HTML</p>
											</li>
											<li>
												<p>Digital Marketing</p>
											</li>
											<li>
												<p>Content Editing</p>
											</li>
										</ul>
									</div>
									<div class="buy-btn-wrapper">
										<a class="mybtn3 mybtn-bg" href="briefcase.php#"
											><span>Start Now <i class="fas fa-shopping-cart"></i></span
										></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				<!-- Pricing Area End -->

				<!-- Blog Area Start -->
				<!--<div class="blog-section" id="blog">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										My <span class="color">Blogs</span>
										<span class="bg-text">Blogs</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="blog-slider wow fadeInUp" data-wow-delay="0.3s">
									<div class="slider-item">
										<div class="single-blog">
											<div class="img">
												<img src="assets/images/blog/img1.png" alt="" />
											</div>
											<div class="content">
												<ul class="top-meta">
													<li>
														<p class="date">21 Aug, 2019</p>
													</li>
													<li>
														<p class="post-by">By, Admin</p>
													</li>
												</ul>
												<a href="blog-details.html">
													<h4 class="title">5 reasons why your website needs more whitespace</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="slider-item">
										<div class="single-blog">
											<div class="img">
												<img src="assets/images/blog/img2.png" alt="" />
											</div>
											<div class="content">
												<ul class="top-meta">
													<li>
														<p class="date">21 Aug, 2019</p>
													</li>
													<li>
														<p class="post-by">By, Admin</p>
													</li>
												</ul>
												<a href="blog-details.html">
													<h4 class="title">7 steps to optimize your website for Millennials</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="slider-item">
										<div class="single-blog">
											<div class="img">
												<img src="assets/images/blog/img3.png" alt="" />
											</div>
											<div class="content">
												<ul class="top-meta">
													<li>
														<p class="date">21 Aug, 2019</p>
													</li>
													<li>
														<p class="post-by">By, Admin</p>
													</li>
												</ul>
												<a href="blog-details.html">
													<h4 class="title">8 Things To Know When Designing Augmented</h4>
												</a>
											</div>
										</div>
									</div>
									<div class="slider-item">
										<div class="single-blog">
											<div class="img">
												<img src="assets/images/blog/img4.png" alt="" />
											</div>
											<div class="content">
												<ul class="top-meta">
													<li>
														<p class="date">24 Aug, 2019</p>
													</li>
													<li>
														<p class="post-by">By, Admin</p>
													</li>
												</ul>
												<a href="blog-details.html">
													<h4 class="title">3 reasons why your website needs more whitespace</h4>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 text-center">
								<a href="blogs.html" class="mybtn3 mybtn-bg wow fadeInUp"
									><span>View All</span></a
								>
							</div>
						</div>
					</div>
				</div>-->

				<!-- Blog Area End -->

				<!-- Contact Area Start -->
				<div class="contact" id="contact">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="section-heading wow fadeInUp" data-wow-delay="0.2s">
									<h2 class="title">
										PONTE EN<span class="color">CONTACTO</span>
										<span class="bg-text">CONTACTO</span>
									</h2>
								</div>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-4 col-md-6">
								<!-- Single Info -->
								<div class="single-info wow fadeInUp">
									<div class="info-icon">
										<i class="flaticon-placeholder"></i>
									</div>
									<div class="info-content">
										<h5>Mi dirección:</h5>
										<p><?=$direction?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<!-- Single Info -->
								<div class="single-info wow fadeInUp">
									<div class="info-icon">
										<i class="flaticon-telephone"></i>
									</div>
									<div class="info-content">
										<h5>Teléfono:</h5>
										<p><?=$phone?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<!-- Single Info -->
								<div class="single-info wow fadeInUp">
									<div class="info-icon">
										<i class="flaticon-email-2"></i>
									</div>
									<div class="info-contentr">
										<h5>Email:</h5>
										<p><?=$userEmail?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row cAndm">
							<div class="col-lg-6">
								<div class="home-page-form">
									<div class="contact-form">
										<form id="contact-form" action="#">
											<div class="controls">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input
																id="name"
																type="text"
																name="name"
																class="form-control"
																placeholder="Name*"
																required="required"
																data-error="Name is required."
															/>
															<div class="help-block with-errors"></div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input
																id="email"
																type="email"
																name="email"
																class="form-control"
																placeholder="Email*"
																required="required"
																data-error="Valid email is required."
															/>
															<div class="help-block with-errors"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<input
																id="subject"
																type="text"
																name="subject"
																class="form-control"
																placeholder="Subject*"
																required="required"
																data-error="Subject is required."
															/>
															<div class="help-block with-errors"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea
																id="message"
																name="message"
																class="form-control"
																placeholder="Message*"
																rows="7"
																required="required"
																data-error="Please,leave us a message."
															></textarea>
															<div class="help-block with-errors"></div>
														</div>
													</div>
													<div class="col-md-12">
														<button type="submit" class="mybtn3 mybtn-bg">
															<span>Enviar Mensaje</span>
														</button>
													</div>
												</div>
											</div>
										</form>
										<!-- End Contact From -->
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="google_map_wrapper">
									<iframe
										src="https://www.google.com/maps/embed?pb=chorrillos"
										frameborder="0"
										style="border: 0"
										allowfullscreen=""
										aria-hidden="false"
										tabindex="0"
									></iframe>
								</div>
							</div>
						</div>
						<!--/.row-->
					</div>
					<!--/.container-->
				</div>
				<!-- Contact Area End -->
			</div>
		</div>
		<!-- Main Content Area End -->

		<!-- Back to Top Start -->
		<div class="bottomtotop">
			<i class="fas fa-chevron-right"></i>
		</div>
		<!-- Back to Top End -->

		<!-- jquery -->
		<script src="assets/js/jquery.js"></script>
		<!-- popper -->
		<script src="assets/js/popper.min.js"></script>
		<!-- bootstrap -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- plugin js-->
		<script src="assets/js/plugin.js"></script>
		<script src="assets/js/jQuery-plugin-progressbar.js"></script>
		<!-- Typed js -->
		<script src="assets/js/typed.min.js"></script>
		<!-- buoyant js -->
		<script src="assets/js/jquery.buoyant.min.js"></script>
		<!-- Wow js -->
		<script src="assets/js/wow.js"></script>
		<!-- main -->
		<script src="assets/js/main.js"></script>
	</body>

</html>
