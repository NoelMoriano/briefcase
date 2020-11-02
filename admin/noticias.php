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

    <title>Maisen Panel - Blank</title>

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
    <?php require("sections/sidebar.html")

    ?>
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
                <h1 class="h3 mb-4 text-gray-800">Noticias</h1>

                <!-- Start Category -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Nuevas Noticias</h6>
                    </div>
                    <div class="card-body">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-1">
                                    <form class="category" action="controllers/notice.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text"
                                                       class="form-control form-control-category input-form-small"
                                                       id="exampleFirstName" placeholder="Titulo Noticia"
                                                       name="noticeTitle">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="file"
                                                       class="form-control form-control-category input-form-small"
                                                       id="exampleFirstName" placeholder="Imagen categoria" name="imageNotice" required>
                                            </div>
                                        </div>
                                        <div class="form-group row"><p>&nbsp;&nbsp;&nbsp;&nbsp;Descripción Breve</p>
                                        <div class="col-sm-12">
                                          <div class="col-sm-12">
                                              <textarea class="form-control form-control-category input-form-small" id="exampleLastName"
                                                placeholder="" name="descriptionBrief" rows="4" required>
                                              </textarea>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group row"><p>&nbsp;&nbsp;&nbsp;&nbsp;Descripción de la Noticia</p>
                                            <div class="col-sm-12">
                                                <div class="col-sm-12">
                                                  <textarea class="form-control form-control-category input-form-small" id="exampleLastName"
                                                    placeholder="" name="noticeDescription" rows="5" required>
                                                  </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-category btn-block btn-small"
                                               value="Guardar" name="saveNotice">
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <?php
                        $queryNotice = "SELECT * FROM notice ORDER BY creatAt DESC";
                          $resultNotice = $newConn->ExecuteQuery($queryNotice);
                          if($resultNotice){
                            while($rowNotice=mysqli_fetch_array($resultNotice)){
                         ?>
                        <div class="card shadow mb-4">
                          <!-- Card Header - Accordion -->
                          <a href="#collapseCard<?=$rowNotice['idNotice']?>" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCard<?=$rowNotice[0]?>">
                            <h6 class="m-0 font-weight-bold text-primary">
                              <?=$rowNotice['noticeTitle']?>
                              </h6>
                          </a>
                          <!-- Card Content - Collapse -->
                          <div class="collapse show" id="collapseCard<?=$rowNotice[0]?>">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-3">
                                   <td> <img src="uploads/notice/<?=$rowNotice['img']?>" class="img-fluid"></td>
                                </div>
                                <div class="col-sm-7">
                                    <p><?=$rowNotice[2] ?></p>
                                </div>
                                <div class="col-sm-2">
                                  <a class="btn btn-danger" href="controllers/notice.php?idNotice=<?=$rowNotice[0]?>">
                                  <i class="fa fa-delete"></i>
                                  Eliminar
                                  </a>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <?php
                            }
                            $newConn->SetFreeResult($resultNotice);

                        }else{
                            echo "<h3>Error select Notice</h3>";
                        }
                        ?>


                    </div>
                </div>
                <!-- End Category -->

                <!-- /.container-fluid -->

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

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
              </div>
            </div>
          </div>
        </div>

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
