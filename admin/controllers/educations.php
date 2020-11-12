<?php
require("../control/constant.php");
require("../control/classConnectionMySQL.php");
require("../control/detectPlatform.php");

//pathName
//echo dirname (__FILE__);
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();


//////////////////////////////
// DATOS POST
//////////////////////////////

$institutionName = $_POST['institutionName'];
$educationTitle = $_POST['educationTitle'];
$startYear = $_POST['startYear'];
$endYear= $_POST['endYear'];

$userIdGlobal = $_POST['userId'];

echo "ID->".$userIdGlobal;

//////////////////////////////
// INSERTAR 
//////////////////////////////
if (isset($_POST['saveEducation']) && $userIdGlobal == '') {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '../educations.php';
          </script>";

}elseif (isset($_POST['saveEducation'])) {

  $queryEducation =  "INSERT INTO `educations`(`institutionName`, `educationTitle`, `startYear`, `endYear`,`userId`) 
  VALUES ('$institutionName','$educationTitle','$startYear' ,'$endYear','$userIdGlobal')";

    $resultEducation = $newConn->ExecuteQuery($queryEducation);
    if($resultEducation){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
            echo "<script>
            alert('Registro Guardado Existosamente');
            window.location = '../educations.php';
          </script>";
        }
    }else{
        echo "<script>
     alert('Error en registro');
     window.location = '../educations.php';
          </script>";
  }
}


//////////////////////////////
// UPDATE 
//////////////////////////////
if (isset($_POST['updateEducation']) && $_POST['educationId'] !== '') {

$educationId = $_POST['educationId'];
$dateUpdate = date('Y-m-d H:i:s');

$queryEducation =  "UPDATE `educations` 
SET `institutionName`='$institutionName',`educationTitle`='$educationTitle',`startYear`='$startYear',`endYear`='$endYear' ,`updateAt`='$dateUpdate'
WHERE id = $educationId";

  $resultEducation = $newConn->ExecuteQuery($queryEducation);
  if($resultEducation){
      $rowCount =  $newConn->GetCountAffectedRows();
      if($rowCount > 0){
          echo "<script>
          alert('Actualizado Existosamente');
          window.location = '../educations.php';
        </script>";
      }
  }else{
      echo "<script>
   alert('Error al actualizar');
   window.location = '../educations.php';
        </script>";
  }
}
///////////////////////////////
// ELIMINAR
///////////////////////////////
  if (isset($_GET['educationId'])) {
    $educationId = $_GET['educationId'];
  $query = "DELETE FROM educations WHERE id = '$educationId'";
  $result = $newConn->ExecuteQuery($query);
  if($result){
      $rowCount=$newConn->GetCountAffectedRows();
      if($rowCount>0){
          echo "<script>
     alert('Eliminado exitosamente');
     window.location = '../educations.php';
          </script>";
      }
  }
  else{
          echo "<script>
     alert('Fallo la Eliminación');
     window.location = '../educations.php';
          </script>";
  }

}

// Cerramos la Conexion a la BD
$newConn->CloseConnection();
