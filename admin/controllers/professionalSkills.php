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
if (isset($_POST['saveAbility'])) {

    $errorResult = "<script>
                      alert('Ocurrio un error, intentelo mas tarde');
                      window.location = '../professional-skills.php';
                    </script>";

        if(empty($userIdSession)){
            echo $errorResult;
          }else{
            $query =  "INSERT INTO `professional_skills`(`ability`,`percentage`,`userId`) 
            VALUES ('$ability','$percentage','$userIdSession')";
          
              $result = $newConn->ExecuteQuery($query);
              if($result){
                  $rowCount =  $newConn->GetCountAffectedRows();
                  if($rowCount > 0){
                    echo "<script>
                    alert('Registro Guardado Existosamente');
                    window.location = '../professional-skills.php';
                  </script>";;
                  }
              }else{
                echo $errorResult;
        }
    }

}


//////////////////////////////
// UPDATE 
//////////////////////////////
if (isset($_POST['updateAbility'])) {

$abilityProId = $_POST['abilityProId'];
$dateUpdate = date('Y-m-d H:i:s');

$errorResult = "<script>
alert('Error al actualizar, intentelo mas tarde');
window.location = '../professional-skills.php';
     </script>";

if(empty($abilityProId)){
    echo $errorResult;
}else{
    $query =  "UPDATE `professional_skills` 
    SET `ability`='$ability',`percentage`='$percentage',`updateAt`='$dateUpdate' WHERE id = $abilityProId";
    
      $result = $newConn->ExecuteQuery($query);
      if($result){
          $rowCount =  $newConn->GetCountAffectedRows();
          if($rowCount > 0){
            echo "<script>
            alert('Actualizado Existosamente');
            window.location = '../professional-skills.php';
          </script>";
          }
      }else{
          echo $errorResult;
        }
    }
}

///////////////////////////////
// ELIMINAR
///////////////////////////////
  if (isset($_GET['abilityProId'])) {

  $abilityProId = $_GET['abilityProId'];

  $query = "DELETE FROM professional_skills WHERE id = '$abilityProId'";
  $result = $newConn->ExecuteQuery($query);

  if($result){
          echo "<script>
     alert('Eliminado exitosamente');
     window.location = '../professional-skills.php';
          </script>";
  }else{
          echo "<script>
     alert('Fallo la eliminación, intentelo mas tarde');
     window.location = '../professional-skills.php';
          </script>";
  }

}

// Cerramos la Conexion a la BD
$newConn->CloseConnection();
