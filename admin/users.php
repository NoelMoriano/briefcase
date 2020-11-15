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
    <?php require("sections/sidebar.html") ?>
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
                <h1 class="h3 mb-4 text-gray-800">User</h1>

                <!-- Start Category -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ingreso de datos</h6>
                    </div>
                    <div class="card-body">
                    
                    <?php
                        $userIdIsset = isset($_GET["idUser"]);

                        if(isset($_GET["idUser"]) && $_GET["idUser"] !== null ){

                            $userId_ = $_GET["idUser"];
                            $queryUser = "SELECT * FROM users WHERE id = $userId_";
                            $resultUsers = $newConn->ExecuteQuery($queryUser);

                            if ($resultUsers) {
                                while ($rowUser = mysqli_fetch_array($resultUsers)) {
                                    $userId_ = $rowUser['id'] ? $rowUser['id'] : '';
                                    $userPhoto = $rowUser['userPhoto'] ? $rowUser['userPhoto'] : '';
                                    $names = $rowUser['names'] ? $rowUser['names'] : '';
                                    $lastName = $rowUser['lastName'] ? $rowUser['lastName'] : '';
                                    $userEmail = $rowUser['userEmail'] ? $rowUser['userEmail'] : '';
                                    $password= $rowUser['password'] ? $rowUser['password'] : '';
                                    $age = $rowUser['age'] ? $rowUser['age'] : '';
                                    $birthdayDate = $rowUser['birthdayDate'] ? $rowUser['birthdayDate'] : '';
                                    $direction = $rowUser['direction'] ? $rowUser['direction'] : '';
                                    $profession = $rowUser['profession'] ? $rowUser['profession'] : '';
                                    $interests = $rowUser['interests'] ? $rowUser['interests'] : '';
                                    $phone = $rowUser['phone'] ? $rowUser['phone'] : ''; 
                                    $description = $rowUser['description'] ? $rowUser['description'] : ''; 
                                    $userFb = $rowUser['userFb'] ? $rowUser['userFb'] : ''; 
                                    $userTwitter = $rowUser['userTwitter'] ? $rowUser['userTwitter'] : ''; 
                                    $userLinkedin = $rowUser['userLinkedin'] ? $rowUser['userLinkedin'] : ''; 
                                    $coverPhoto = $rowUser['coverPhoto'] ? $rowUser['coverPhoto'] : ''; 
                                    $userType = $rowUser['userType'] ? $rowUser['userType'] : ''; 
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
                                    <form class="category" action="controllers/users.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-4 mb-sm-0">
                                            <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese nombres"
                                                       hidden
                                                       name="userId" value="<?=$userIdIsset ? $userId_ : ''?>">
                                                        <div>
                                                            <label for="">Nombres:</label>
                                                                <input type="text"
                                                            class="form-control input-form-small"
                                                            placeholder="Ingrese nombres"
                                                            name="names" value="<?=$userIdIsset ? $names : ''?>">
                                                        </div>
                                                       
                                            </div>
                                            <div class="col-sm-4 mb-4 mb-sm-0">
                                                        <div>
                                                            <label for="">Apellidos:</label>
                                                            <input type="text"
                                                            class="form-control input-form-small"
                                                            placeholder="Ingrese apellidos"
                                                            name="lastName" value="<?=$userIdIsset ? $lastName : ''?>">
                                                        </div> 
                                            </div>
                                            <div class='col-sm-4 mb-4 mb-sm-0'>
                                            <?php
                                            if($_SESSION['userEmail'] == "admin@admin.com") {
                                                ?>
                                                    <div>
                                                        <label for="">Tipo usuario:</label>
                                                        <select class="form-control input-form-small" name="userType">
                                                            <option value="user">User</option>
                                                            <option value="admin">Admin</option>
                                                        </select>
                                                    </div>
                                            <?php
                                            }
                                            ?>    
                                            </div>                                    
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Email:</label>
                                                <input type="email"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese email"
                                                       name="email" value="<?=$userIdIsset ? $userEmail : ''?>">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Contraseña:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese password"
                                                       name="password" value="<?=$userIdIsset ? $password : ''?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Edad:</label>
                                                <input type="number"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su edad"
                                                       name="age" value="<?=$userIdIsset ? $age : ''?>">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Fecha cumpleaños:</label>
                                                <input type="date"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese fecha de cumpleaños"
                                                       name="birthdayDate" value="<?=$userIdIsset ? $birthdayDate : ''?>">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Dirección:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su dirección"
                                                       name="direction" value="<?=$userIdIsset ? $direction : ''?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Profesion:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su profesion"
                                                       name="profession" value="<?=$userIdIsset ? $profession : ''?>">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Telefono:</label>
                                                <input type="number"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese teléfono"
                                                       name="phone" value="<?=$userIdIsset ? $phone : ''?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="">Intereses:</label>
                                            <div class="col-sm-12">
                                                <label for="">Separe sus intereses por giones (,)</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese Intereses"
                                                       name="interests" value="<?=$userIdIsset ? $interests : ''?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="">Descripción profesional</label>
                                              <textarea class="form-control"
                                                        style="color: #444"
                                                        placeholder="Ingrese descripción"
                                                        name="description">
                                                        <?=$userIdIsset ? $description : ''?>
                                              </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Facebook:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su FB"
                                                       name="userFb" value="<?=$userIdIsset ? $userFb : ''?>">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Twitter:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su Twitter"
                                                       name="userTwitter" value="<?=$userIdIsset ? $userTwitter : ''?>">
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Linkedin:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su Linkedin"
                                                       name="userLinkedin" value="<?=$userIdIsset ? $userLinkedin : ''?>">
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
                                        <input type="submit" class="<?=$userIdIsset ? 'btn btn-category btn-block btn-small btn-success' : 'btn btn-category btn-block btn-small btn-primary'?>" name="<?=$userIdIsset ? 'updateUser' : 'saveUser'?>" value="<?=$userIdIsset ? 'Actualizar' : 'Guardar'?>"/>
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
                                        <th>F.Cumpleaños</th>
                                        <th>Dirección</th>
                                        <th>Profesion</th>
                                        <th>Intereses</th>
                                        <th>Teléfono</th>
                                        <th>CreateAt</th>
                                        <th>Opciones</th>
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
                                        <th>F.Cumpleaños</th>
                                        <th>Dirección</th>
                                        <th>Profesion</th>
                                        <th>Intereses</th>
                                        <th>Teléfono</th>
                                        <th>CreateAt</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php

                                        $userId_ = $_SESSION['userId'];

                                         $queryUsers = "SELECT * FROM users ORDER BY createAt DESC";
                                         $queryUser = "SELECT * FROM users WHERE id = $userId_";
                                        $result = $newConn->ExecuteQuery(($_SESSION['userEmail'] == "admin@admin.com" ) ? $queryUsers : $queryUser);
                                         if ($result) {
                                             while ($rowUser = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                        <td><img src="./uploads/users/<?=$rowUser["userPhoto"] ? $rowUser["userPhoto"] : 'user-nofound.png'?>" class="img-fluid"></td>
                                        <td><?=$rowUser["names"]?></td>
                                        <td><?=$rowUser["lastName"]?></td>
                                        <td><?=$rowUser["userEmail"]?></td>
                                        <td><?=$rowUser["password"]?></td>
                                        <td><?=$rowUser["age"]?></td>
                                        <td><?=$rowUser["birthdayDate"]?></td>
                                        <td><?=$rowUser["direction"]?></td>
                                        <td><?=$rowUser["profession"]?></td>
                                        <td><?=$rowUser["interests"]?></td>
                                        <td><?=$rowUser["phone"]?></td>
                                        <td><?=$rowUser["createAt"]?></td>
                                        <td>
                                        <a href="users.php?idUser=<?=$rowUser["id"]?>" class="btn btn-info"><i class="fa fa-edit"></i></a>

                                        <button" data-toggle="modal" data-target="#exampleModal<?=$rowUser["id"]?>" class="btn btn-danger btn-small"><i class="fa fa-trash"></i></button>

                                        <div  class="modal fade" id="exampleModal<?=$rowUser["id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="color: #444">Eliminar usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="color: #444;text-align: left;">Seguro que desea eliminar al usuario <strong><?=$rowUser["names"]." ".$rowUser["lastName"]?></strong> </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a href="controllers/users.php?idUser=<?=$rowUser["id"]?>" type="button" class="btn btn-danger">Si</a>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </td>
                                        </tr>
                                     <?php
                                            }
                                        }else{
                                        echo "<h5>Error en consulta contacte a soporte</h3>";
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
