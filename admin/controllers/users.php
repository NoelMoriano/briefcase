<?php
require("../control/constant.php");
require("../control/classConnectionMySQL.php");
require("../control/detectPlatform.php");

//pathName
//echo dirname (__FILE__);

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();


//////////////////////////////
// DATOS POST
//////////////////////////////

// firstPicture
$userPhoto = $_FILES["userPhoto"]["name"];
$coverPhoto = $_FILES["coverPhoto"]["name"];

  $destination_path_1 = getcwd().DIRECTORY_SEPARATOR;
  $target_path_1 = $destination_path_1 . '../uploads/users/'. basename($userPhoto);

  $destination_path_2 = getcwd().DIRECTORY_SEPARATOR;
  $target_path_2 = $destination_path_2 . '../uploads/users/'. basename($coverPhoto);

  for ($i=0; $i <=2 ; $i++) {
    move_uploaded_file($_FILES['userPhoto']['tmp_name'], $target_path_1);
    move_uploaded_file($_FILES['coverPhoto']['tmp_name'], $target_path_2);
  }

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
$description = $_POST['description']; 
$userFb = $_POST['userFb']; 
$userTwitter = $_POST['userTwitter']; 
$userLinkedin = $_POST['userLinkedin']; 

//////////////////////////////
// INSERTAR users
//////////////////////////////
if (isset($_POST['saveUser']) && $names == '') {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '../users.php';
          </script>";

}elseif (isset($_POST['saveUser'])) {

  $queryUser =  "INSERT INTO `users`(`userEmail`, `password`, `names`, `userPhoto`,`coverPhoto`, `lastName`, `age`, `birthdayDate`, `direction`, `profession`, `interests`, `phone`,`description`,`userFb`,`userTwitter`,`userLinkedin`) 
  VALUES ('$email','$password','$names' ,'$userPhoto','$coverPhoto','$lastName','$age', '$birthdayDate','$direction','$profession','$interests','$phone','$description','$userFb','$userTwitter','$userLinkedin')";

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
