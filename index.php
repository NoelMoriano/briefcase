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
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./assets/css/index.css" />
		<title>Técnicos - Servitec</title>
        <!-- favicon -->
        <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./assets/css/flaticon.css" />

        		<!-- bootstrap -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<!-- Plugin css -->
		<link rel="stylesheet" href="assets/css/plugin.css" />
		<!-- Flaticon -->
		<link rel="stylesheet" href="assets/css/flaticon.css" />
		<!-- stylesheet -->
		<link rel="stylesheet" href="assets/css/index.css" />
		<!-- responsive -->
		<link rel="stylesheet" href="assets/css/responsive.css" />
	</head>
	<body>
    
    <div class="preloader" id="preloader">
			<div class="loader loader-1">
				<div class="loader-outter"></div>
				<div class="loader-inner"></div>
			</div>
        </div>
        
	<section id="container-general-team">
        <h1 class="wow fadeInDown">
            NUESTROS TÉCNICOS DE CONFIANZA
        </h1>

        <div class="item">
            <div class="triangle">
            </div>
        </div>

        <div class="container-boxes">
            <div class="grid-items">
            <?php
            $queryProduct = "SELECT * FROM users WHERE userType != 'admin' ORDER BY updateAt DESC";
            $resultUsers = $newConn->ExecuteQuery($queryProduct);

            if ($resultUsers) {
            while ($rowUser = mysqli_fetch_array($resultUsers)) {
            ?>
                <div class="box-item wow zoomIn">
                    <img class="img-user" src="./admin/uploads/users/<?=$rowUser['userPhoto'] 
                        ? $rowUser['userPhoto'] 
                        : 'user-nofound.png'?>"  alt="<?=$rowUser["names"]?>">
                    <p class="name">  <?=ucfirst($rowUser["names"]." ".$rowUser["lastName"])?></p>
                    <a class="btn about-links wow fadeIn" href="briefcase.php?userId=<?=$rowUser['id']?>">
                     <span>Ver más</span></a>
                </div>
                  <?php
                    }
                }else{
                 echo "<h5>Error en consulta contacte a soporte</h3>";
                }
                ?>
            </div>
        </div>
        <div class="footer-wrapper">
            <p class="footer-text wow backInUp delay-3s">© Copyright | Design <img src="./assets//images/icon/heart.svg" /> by Servitec</p>
        </div>
    </section>
    
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
