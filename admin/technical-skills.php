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

$userIdGlobal = $_SESSION['userId'];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel - Habilidades técnicas</title>

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
                <h1 class="h3 mb-4 text-gray-800">Habilidades técnicas</h1>

                <!-- Start Category -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Registro</h6>
                    </div>
                    <div class="card-body">
                    
                    <?php
                        $abilityTecIdIsset = isset($_GET["abilityTecId"]);

                        if(isset($_GET["abilityTecId"]) && $_GET["abilityTecId"] !== null ){

                            $abilityTecId = $_GET["abilityTecId"];
                            $query = "SELECT * FROM technical_skills WHERE id = $abilityTecId";
                            $result = $newConn->ExecuteQuery($query);

                            if ($result) {
                                while ($rowAbility = mysqli_fetch_array($result)) {
                                    $abilityTecId = $rowAbility['id'] ? $rowAbility['id'] : '';
                                    $ability = $rowAbility['ability'] ? $rowAbility['ability'] : '';
                                    $percentage = $rowAbility['percentage'] ? $rowAbility['percentage'] : '';
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
                                    <form class="category" action="controllers/technicalSkills.php" method="post" enctype="multipart/form-data">                                 
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Habilidad técnica:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su habilidad"
                                                       required
                                                       name="ability" value="<?=$abilityTecIdIsset ? $ability : ''?>">
                                                <input type="number"
                                                       class="form-control input-form-small"
                                                       hidden
                                                       name="abilityTecId" 
                                                       value="<?=$abilityTecIdIsset ? $abilityTecId : ''?>">
                                                       
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">% conocimiento:</label>
                                                <input type="number"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese % de conocimiento"
                                                       max="100"
                                                       required
                                                       name="percentage" value="<?=$abilityTecIdIsset ? $percentage : ''?>">
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
                                        <input type="submit" 
                                        class="<?=$abilityTecIdIsset ? 'btn btn-category btn-block btn-small btn-success' : 'btn btn-category btn-block btn-small btn-primary'?>" 
                                        name="<?=$abilityTecIdIsset ? 'updateAbility' : 'saveAbility'?>" 
                                        value="<?=$abilityTecIdIsset ? 'Actualizar' : 'Guardar'?>"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Collapsable Card Example -->

                            <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de H.Técnicos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Habilidad</th>
                                        <th>% conocimiento</th>
                                        <th>CreateAt</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Habilidad</th>
                                        <th>% conocimiento</th>
                                        <th>CreateAt</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                        $query = "SELECT * FROM technical_skills WHERE userId = '$userIdGlobal'";
                                        $result = $newConn->ExecuteQuery($query);
                                         if ($result) {
                                             while ($rowAbility = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                        <td><?=$rowAbility["ability"]?></td>
                                        <td><?=$rowAbility["percentage"]?></td>
                                        <td><?=$rowAbility["createAt"]?></td>
                                        <td>
                                        <a href="technical-skills.php?abilityTecId=<?=$rowAbility["id"]?>" class="btn btn-info"><i class="fa fa-edit"></i></a>

                                        <button" data-toggle="modal" data-target="#exampleModal<?=$rowAbility["id"]?>" class="btn btn-danger btn-small"><i class="fa fa-trash"></i></button>

                                        <div  class="modal fade" id="exampleModal<?=$rowAbility["id"]?>" tabindex="-1" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="color: #444">Eliminar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="color: #444;text-align: left;">Seguro que desea eliminar?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a href="controllers/technicalSkills.php?abilityTecId=<?=$rowAbility["id"]?>" type="button" class="btn btn-danger">Si</a>
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
