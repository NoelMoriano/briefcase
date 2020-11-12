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
		<title>Our team</title>
	</head>
	<body>

	<section id="container-general-team">
        <h1>
            TÉCNICOS
        </h1>

        <div class="item">
            <div class="triangle">
            </div>
        </div>

        <div class="container-boxes">
            <div class="grid-items">
            <?php
            $queryProduct = "SELECT * FROM users ORDER BY createAt DESC";
            $resultUsers = $newConn->ExecuteQuery($queryProduct);

            if ($resultUsers) {
            while ($rowUser = mysqli_fetch_array($resultUsers)) {
            ?>
                <div class="box-item">
                    <img class="img-user"   src="./admin/uploads/users/<?=$rowUser['userPhoto'] ? $rowUser['userPhoto'] : 'user-nofound.png'?>"  alt="">
                    <p class="name">  <?=$rowUser["names"]?>  <?=$rowUser["lastName"]?>  </p>
                    <a class="btn" href="briefcase.php?userId=<?=$rowUser['id']?>">Ver màs</a>
                  
                </div>

                  <?php
                    }
                }else{
                 echo "<h5>Error en consulta contacte a soporte</h3>";
                }
                ?>
            </div>
        </div>

	</section>
	
	</body>
</html>
