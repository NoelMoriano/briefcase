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

    <title>Panel - Productos</title>

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
    <?php require("sections/sidebar.html") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php require("sections/header.html") ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">User</h1>

                <!-- Start Category -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ingreso de data</h6>
                    </div>
                    <div class="card-body">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-1">
                                    <form class="category" action="controllers/users.php" method="post" enctype="multipart/form-data">
                                        <!--<div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Producto"
                                                       name="productName">
                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="form-control input-form-small" name="idCategory">
                                                    <option value="default">[Seleccine Categoria]</option>
                                                <?php
                                                /*$queryCategory = "SELECT * FROM users";
                                                $resultCategory = $newConn->ExecuteQuery($queryCategory);
                                                if ($resultCategory) {
                                                    while ($rowCategory = $newConn->GetRows($resultCategory)) {
                                                            ?>
                                                    <option value="<?=$rowCategory[0]?>"><?=$rowCategory[1]?></option>
                                                <?php
                                                    }
                                                  }else{
                                                            echo "<h3>Error select category</h3>";
                                                        }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese nombres"
                                                       name="names">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese apellidos"
                                                       name="lastName">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <input type="file"
                                                     class="form-control form-control-category input-form-small"
                                                     id="userPhoto" placeholder="Imagen User" name="userPhoto">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="email"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese email"
                                                       name="email">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese password"
                                                       name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="number"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su edad"
                                                       name="age">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="date"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese fecha de cumpleaños"
                                                       name="birthdayDate">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su dirección"
                                                       name="direction">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su profesion"
                                                       name="profession">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="number"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese teléfono"
                                                       name="phone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="">Separe sus intereses por giones (-)</label>
                                              <textarea class="form-control"
                                                        style="color: #444"
                                                        placeholder="Intereses"
                                                        name="interests">
                                              </textarea>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group row">
                                          <div class="col-sm-4 mb-3 mb-sm-0">
                                              <input type="file"
                                                     class="form-control form-control-category input-form-small"
                                                     id="userPhoto" placeholder="Imagen Producto" name="userPhoto">
                                          </div>
                                          <div class="col-sm-4 mb-3 mb-sm-0">
                                              <input type="file"
                                                     class="form-control form-control-category input-form-small"
                                                     id="secondPicture" placeholder="Imagen Producto" name="secondPicture">
                                          </div>
                                          <div class="col-sm-4 mb-3 mb-sm-0">
                                              <input type="file"
                                                     class="form-control form-control-category input-form-small"
                                                     id="thirdPicture" placeholder="Imagen Producto" name="thirdPicture">
                                          </div>
                                        </div>-->
                                        <button class="btn btn-primary btn-category btn-block btn-small" name="saveUser">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Collapsable Card Example -->

                            <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de usuarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Email</th>
                                        <th>password</th>
                                        <th>Edad</th>
                                        <th>Fecha cumpleaños</th>
                                        <th>Dirección</th>
                                        <th>Profesion</th>
                                        <th>Teléfono</th>
                                        <th>Intereses</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Email</th>
                                        <th>password</th>
                                        <th>Edad</th>
                                        <th>Fecha cumpleaños</th>
                                        <th>Dirección</th>
                                        <th>Profesion</th>
                                        <th>Teléfono</th>
                                        <th>Intereses</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php

                                         $queryProduct = "SELECT names,lastName,email,password,userPhoto,age,birthdayDate,direction,profession,interests,phone,createAt FROM users
                                         ORDER BY createAt DESC";
                                        $resultUsers = $newConn->ExecuteQuery($queryProduct);
                                         if ($resultUsers) {
                                             while ($rowUser = mysqli_fetch_array($resultUsers)) {

                                        ?>
                                        <tr>
                                        <td><?=$rowUser[1]?></td>
                                        <td><?=$rowUser[2]?></td>
                                        <td><?=$rowUser[3]?></td>
                                        <td><?=$rowUser[4]?></td>
                                        <td><img src="uploads/users/<?=$rowUser[5]?>" class="img-fluid"></td>
                                        <td><?=$rowUser[6]?></td>
                                        <td><?=$rowUser[7]?></td>
                                        <td><?=$rowUser[8]?></td>
                                        <td><?=$rowUser[9]?></td>
                                        <td><?=$rowUser[10]?></td>
                                        <td><?=$rowUser[11]?></td>
                                        <td><?=$rowUser[12]?></td>
                                        <td><a href="controllers/users.php?idUser=<?=$rowUser[0]?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                     <?php
                                        }
                                        }else{
                                        echo "<h3>Error en consulta contacte a soporte</h3>";
                                        }
                                     ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
