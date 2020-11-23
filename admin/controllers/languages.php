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

$language = $_POST['language'];
$percentage = $_POST['percentage'];

$userIdSession = $_SESSION['userId'];

//////////////////////////////
// INSERTAR 
//////////////////////////////
if (isset($_POST['saveLanguage'])) {
          if(empty($userIdSession)) {
            echo "<script>
            alert('Todos los campos son importantes');
            window.location = '../languages.php';
                 </script>";
          }else{
            $query =  "INSERT INTO `languages`(`language`,`percentage`,`userId`) 
            VALUES ('$language','$percentage','$userIdSession')";
          
              $result = $newConn->ExecuteQuery($query);
              if($result){
                  $rowCount =  $newConn->GetCountAffectedRows();
                  if($rowCount > 0){
                      echo "<script>
                      alert('Registro Guardado Existosamente');
                      window.location = '../languages.php';
                    </script>";
                  }
              }else{
                  echo "<script>
               alert('Error en registro, intentelo mas tarde');
               window.location = '../languages.php';
                    </script>";
        }
    }
}

//////////////////////////////
// UPDATE 
//////////////////////////////
if (isset($_POST['updateLanguage']) && $_POST['languageId'] !== '') {

$languageId = $_POST['languageId'];
$dateUpdate = date('Y-m-d H:i:s');

$query =  "UPDATE `languages` 
SET `language`='$language',`percentage`='$percentage',`updateAt`='$dateUpdate' WHERE id = $languageId";

  $result = $newConn->ExecuteQuery($query);
  if($result){
      $rowCount =  $newConn->GetCountAffectedRows();
      if($rowCount > 0){
          echo "<script>
          alert('Actualizado Existosamente');
          window.location = '../languages.php';
        </script>";
      }
  }else{
      echo "<script>
   alert('Error al actualizar, intentelo mas tarde');
   window.location = '../languages.php';
        </script>";
  }
}
///////////////////////////////
// ELIMINAR
///////////////////////////////
  if (isset($_GET['languageId'])) {

  $languageId = $_GET['languageId'];

  $query = "DELETE FROM languages WHERE id = '$languageId'";
  $result = $newConn->ExecuteQuery($query);

  if($result){
          echo "<script>
     alert('Eliminado exitosamente');
     window.location = '../languages.php';
          </script>";
  }else{
          echo "<script>
     alert('Fallo la eliminación, intentelo mas tarde');
     window.location = '../languages.php';
          </script>";
  }

}

// Cerramos la Conexion a la BD
$newConn->CloseConnection();
