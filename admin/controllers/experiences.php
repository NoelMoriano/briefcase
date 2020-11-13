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

$employerName = $_POST['employerName'];
$position = $_POST['position'];
$startYear = $_POST['startYear'];
$endYear= $_POST['endYear'];

$userIdGlobal = $_POST['userId'];

echo "ID->".$userIdGlobal;

//////////////////////////////
// INSERTAR 
//////////////////////////////
if (isset($_POST['saveExperience']) && $userIdGlobal == '') {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '../experiences.php';
          </script>";

}elseif (isset($_POST['saveExperience'])) {

  $query =  "INSERT INTO `experiences`(`employerName`,`position`,`startYear`, `endYear`,`userId`) 
  VALUES ('$employerName','$position','$startYear' ,'$endYear','$userIdGlobal')";

    $result = $newConn->ExecuteQuery($query);
    if($result){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
            echo "<script>
            alert('Registro Guardado Existosamente');
            window.location = '../experiences.php';
          </script>";
        }
    }else{
        echo "<script>
     alert('Error en registro');
     window.location = '../experiences.php';
          </script>";
  }
}


//////////////////////////////
// UPDATE 
//////////////////////////////
if (isset($_POST['updateExperience']) && $_POST['experienceId'] !== '') {

$experienceId = $_POST['experienceId'];
$dateUpdate = date('Y-m-d H:i:s');

$query =  "UPDATE `experiences` 
SET `employerName`='$employerName',`position`='$position',`startYear`='$startYear',`endYear`='$endYear' ,`updateAt`='$dateUpdate'
WHERE id = $experienceId";

  $result = $newConn->ExecuteQuery($query);
  if($result){
      $rowCount =  $newConn->GetCountAffectedRows();
      if($rowCount > 0){
          echo "<script>
          alert('Actualizado Existosamente');
          window.location = '../experiences.php';
        </script>";
      }
  }else{
      echo "<script>
   alert('Error al actualizar');
   window.location = '../experiences.php';
        </script>";
  }
}
///////////////////////////////
// ELIMINAR
///////////////////////////////
  if (isset($_GET['experienceId'])) {
    $experienceId = $_GET['experienceId'];
  $query = "DELETE FROM experiences WHERE id = '$experienceId'";
  $result = $newConn->ExecuteQuery($query);
  if($result){
      $rowCount=$newConn->GetCountAffectedRows();
      if($rowCount>0){
          echo "<script>
     alert('Eliminado exitosamente');
     window.location = '../experiences.php';
          </script>";
      }
  }
  else{
          echo "<script>
     alert('Fallo la Eliminación');
     window.location = '../experiences.php';
          </script>";
  }

}

// Cerramos la Conexion a la BD
$newConn->CloseConnection();
