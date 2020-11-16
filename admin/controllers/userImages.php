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

//FUNCTION MOVE IMG
function moveImage($dataImg){
    $nameImg = $dataImg["name"];
    $destination_path_1 = getcwd().DIRECTORY_SEPARATOR;
    $target_path_1 = $destination_path_1 . '../uploads/users/'. basename($nameImg);
    move_uploaded_file($dataImg['tmp_name'], $target_path_1);
  }
  
  moveImage($_FILES['userPhoto']);
  moveImage($_FILES['coverPhoto']);
  
  $userPhoto = $_FILES["userPhoto"]["name"];
  $coverPhoto = $_FILES["coverPhoto"]["name"];

  $userId = $_POST['userId'];

  //////////////////////////////
// INSERTAR users
//////////////////////////////

$dateUpdate = date('Y-m-d H:i:s');

$jsonQuery = [
    1=> "UPDATE `users` SET `userPhoto`='$userPhoto', `coverPhoto`='$coverPhoto', `updateAt`='$dateUpdate' 
            WHERE id = '$userId'",
    2=>"UPDATE `users` SET `userPhoto`='$userPhoto',`updateAt`='$dateUpdate' 
            WHERE id = '$userId'",
    3=>"UPDATE `users` SET `coverPhoto`='$coverPhoto',`updateAt`='$dateUpdate' 
            WHERE id = '$userId'"];

if(isset($_POST['saveImages']) && empty($userPhoto) && empty($coverPhoto)){
    echo "<script>
    alert('Campos vacios');
    window.location = '../userImages.php';
         </script>";
}elseif(isset($_POST['saveImages'])){

     if(isset($userPhoto) && isset($coverPhoto)){
        $queryUser = $jsonQuery[1];
    }elseif (isset($userPhoto) && empty($coverPhoto)){
        $queryUser = $jsonQuery[2];
    }elseif(isset($coverPhoto) && empty($userPhoto)){
        $queryUser = $jsonQuery[3];
    }
      
    $resultUser = $newConn->ExecuteQuery($queryUser);
    if($resultUser){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
            echo "<script>
            alert('Guardado existosamente');
            window.location = '../userImages.php';
          </script>";
        }
    }else{
        echo "<script>
     alert('Error al guardar');
     window.location = '../userImages.php';
          </script>";
    }
}
