<?php
  session_start();
  if (!isset($_SESSION['userEmail'])) {
    header("Location:../admin/login.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en">

<?php
require("control/classConnectionMySQL.php");

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel - users</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php require("sections/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php require("sections/header.php") ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Fotos</h1>

                <!-- Start Category -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Imagenes</h6>
                    </div>
                    <div class="card-body">
                    
                    <?php

                        $userIdIsset = isset($_SESSION["userId"]);

                        if(isset($_SESSION["userId"]) && $_SESSION["userId"] !== null ){

                            $userId = $_SESSION["userId"];
                            $queryUser = "SELECT * FROM users WHERE id = $userId";
                            $resultUsers = $newConn->ExecuteQuery($queryUser);

                            if ($resultUsers) {
                                while ($rowUser = mysqli_fetch_array($resultUsers)) {
                                    $userId = $rowUser['id'] ? $rowUser['id'] : '';
                                    $userPhoto = $rowUser['userPhoto'] ? $rowUser['userPhoto'] : '';
                                    $coverPhoto = $rowUser['coverPhoto'] ? $rowUser['coverPhoto'] : ''; 
                                }
                            }else{
                                echo "<h5>Error en consulta contacte a soporte</h3>";
                            }
                        }
                        
                    ?>
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-1">
                                    <form class="category" action="controllers/userImages.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-8 mb-4 mb-sm-0 d-flex">
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese nombres"
                                                       hidden
                                                       name="userId" value="<?=$userIdIsset ? $userId : ''?>">
                                                        <div>
                                                        <label for="">Foto perfil:</label> <br>
                                                            <img src="./uploads/users/<?=$userPhoto ? $userPhoto : 'user-nofound.png'?>" alt="" class="img-fluid" width="250px">
                                                        </div>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <div>
                                                            <label for="">Imagen portada:</label><br>
                                                            <img src="./uploads/users/<?=$coverPhoto ? $coverPhoto : 'bg-default.jpg'?>" alt="" class="img-fluid" width="250px">
                                                        </div> 
                                            </div>

                                            <div class="col-sm-4 mb-4 mb-sm-0">
                                            <label for="">Foto perfil</label>
                                                        <input type="file"
                                                     class="form-control form-control-category input-form-small"
                                                     id="userPhoto" placeholder="Imagen User" name="userPhoto">
                                                     <br/>
                                            <label for="">Imagen portada</label>
                                            <input type="file"
                                                     class="form-control form-control-category input-form-small"
                                                     id="coverPhoto" placeholder="Imagen Portada" name="coverPhoto"> 
                                                     
                                            </div>                                            
                                        </div>
                              
                                        <input type="submit" class="btn btn-category btn-block btn-small btn-primary" name="saveImages" value="Guardar"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Collapsable Card Example -->
                </div>


                    </div>
                </div>
                <!-- End Category -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php require("sections/footer.html") ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
