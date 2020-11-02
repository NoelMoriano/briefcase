<?php
require("../control/classConnectionMySQL.php");

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();

//////////////////////////////
// DATOS POST
//////////////////////////////
///
$path="C:/xampp/htdocs/maisen/admin/uploads/notice";
// firstPicture
$noticeTitle = $_POST['noticeTitle'];
$noticeDescription = $_POST['noticeDescription'];
$descriptionBrief = $_POST['descriptionBrief'];




$imageNotice=$_FILES['imageNotice']['tmp_name'];
$imageNotice1 = $_FILES['imageNotice']['name'];

move_uploaded_file($imageNotice,$path."/".$imageNotice1);


//////////////////////////////
// INSERTAR NOTICE
//////////////////////////////
if (isset($_POST['saveNotice']) && $noticeTitle == '') {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '../noticias.php';
          </script>";

}elseif (isset($_POST['saveNotice'])) {
  $query = "INSERT INTO notice(noticeTitle, descriptionBrief, noticeDescription, img) VALUES ('$noticeTitle','$noticeDescription','$descriptionBrief','$imageNotice1')";
    $result = $newConn->ExecuteQuery($query);
    if($result){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
            echo "Query ejecutado exitosamente<BR>";
            header("Location:../noticias.php");
        }
    }else{
        echo "<h3>Error ejecutando la consulta</h3>";
  }
}



///////////////////////////////
// ELIMINAR
///////////////////////////////
  if (isset($_GET['idNotice'])) {
    $idNotice = $_GET['idNotice'];
  $query = "DELETE FROM notice WHERE idNotice = '$idNotice'";
  $result = $newConn->ExecuteQuery($query);
  if($result){
      $rowCount=$newConn->GetCountAffectedRows();
      if($rowCount>0){
          echo "Eliminado exitosamente";
          header("Location:../noticias.php");
      }
  }
  else{
          echo "<h3>Error ejecutando la consulta</h3>";
  }

}

// Cerramos la Conexion a la BD
$newConn->CloseConnection();

 ?>
