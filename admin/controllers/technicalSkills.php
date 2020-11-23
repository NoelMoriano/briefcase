<?php
session_start();
if (!isset($_SESSION['userEmail'])) {
  header("Location:../admin/login.php");
}

require("../control/classConnectionMySQL.php");

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

$ability = $_POST['ability'];
$percentage = $_POST['percentage'];

$userIdSession = $_SESSION['userId'];

//////////////////////////////
// INSERTAR 
//////////////////////////////
if (isset($_POST['saveAbility']) && $userIdSession == '') {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '../technical-skills.php';
          </script>";

}elseif (isset($_POST['saveAbility'])){
  $query =  "INSERT INTO `technical_skills`(`ability`,`percentage`,`userId`) 
  VALUES ('$ability','$percentage','$userIdSession')";

    $result = $newConn->ExecuteQuery($query);
    if($result){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
            echo "<script>
            alert('Registro Guardado Existosamente');
            window.location = '../technical-skills.php';
          </script>";
        }
    }else{
        echo "<script>
     alert('Error en registro, intentelo mas tarde');
     window.location = '../technical-skills.php';
          </script>";
  }
}


//////////////////////////////
// UPDATE 
//////////////////////////////
if (isset($_POST['updateAbility']) && $_POST['abilityTecId'] !== '') {

$abilityTecId = $_POST['abilityTecId'];
$dateUpdate = date('Y-m-d H:i:s');

$query =  "UPDATE `technical_skills` 
SET `ability`='$ability',`percentage`='$percentage',`updateAt`='$dateUpdate' WHERE id = $abilityTecId";

  $result = $newConn->ExecuteQuery($query);
  if($result){
      $rowCount =  $newConn->GetCountAffectedRows();
      if($rowCount > 0){
          echo "<script>
          alert('Actualizado Existosamente');
          window.location = '../technical-skills.php';
        </script>";
      }
  }else{
      echo "<script>
   alert('Error al actualizar, intentelo mas tarde');
   window.location = '../technical-skills.php';
        </script>";
  }
}
///////////////////////////////
// ELIMINAR
///////////////////////////////
  if (isset($_GET['abilityTecId'])) {

  $abilityTecId = $_GET['abilityTecId'];

  $query = "DELETE FROM technical_skills WHERE id = '$abilityTecId'";
  $result = $newConn->ExecuteQuery($query);

  if($result){
          echo "<script>
     alert('Eliminado exitosamente');
     window.location = '../technical-skills.php';
          </script>";
  }else{
          echo "<script>
     alert('Fallo la eliminación, intentelo mas tarde');
     window.location = '../technical-skills.php';
          </script>";
  }

}

// Cerramos la Conexion a la BD
$newConn->CloseConnection();
