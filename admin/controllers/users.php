<?php
require("../control/constant.php");
require("../control/classConnectionMySQL.php");
require("../control/detectPlatform.php");

echo dirname (__FILE__);

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();


//////////////////////////////
// DATOS POST
//////////////////////////////

// firstPicture
$userPhoto = $_FILES["userPhoto"]["name"];
$destination_path = getcwd().DIRECTORY_SEPARATOR;
$target_path = $destination_path . '../uploads/users/'. basename($userPhoto);
move_uploaded_file($_FILES['userPhoto']['tmp_name'], $target_path);


$names = $_POST['names'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password= $_POST['password'];
$age = $_POST['age'];
$birthdayDate = $_POST['birthdayDate'];
$direction = $_POST['direction'];
$profession = $_POST['profession'];
$interests = $_POST['interests'];
$phone = $_POST['phone']; 

//////////////////////////////
// INSERTAR users
//////////////////////////////
if (isset($_POST['saveUser']) && $names == '') {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '../users.php';
          </script>";

}elseif (isset($_POST['saveUser'])) {

  $queryUser =  "INSERT INTO `users`(`userEmail`, `password`, `names`, `userPhoto`, `lastName`, `age`, `birthdayDate`, `direction`, `profession`, `interests`, `phone`) 
  VALUES ('$email','$password','$names' ,'$userPhoto','$lastName','$age', '$birthdayDate','$direction','$profession','$interests','$phone')";

    $resultUser = $newConn->ExecuteQuery($queryUser);
    if($resultUser){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
            echo "<script>
            alert('Registro Guardado Existosamente');
            window.location = '../users.php';
          </script>";
        }
    }else{
        echo "<script>
     alert('Error en registro');
     window.location = '../users.php';
          </script>";
  }
}


///////////////////////////////
// ELIMINAR
///////////////////////////////
  if (isset($_GET['idUser'])) {
    $idUser = $_GET['idUser'];
  $query = "DELETE FROM users WHERE id = '$idUser'";
  $result = $newConn->ExecuteQuery($query);
  if($result){
      $rowCount=$newConn->GetCountAffectedRows();
      if($rowCount>0){
          echo "<script>
     alert('Eliminado exitosamente');
     window.location = '../users.php';
          </script>";
      }
  }
  else{
          echo "<script>
     alert('Eliminado exitosamente');
     window.location = '../users.php';
          </script>";
  }

}

// Cerramos la Conexion a la BD
$newConn->CloseConnection();
