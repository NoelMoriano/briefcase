<?php
require("../control/classConnectionMySQL.php");

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();


//////////////////////////////
// DATOS POST
//////////////////////////////

/*$path="/Users/noelmoriano/.bitnami/stackman/machines/xampp/htdocs/portafolio/admin/uploads/users";
// firstPicture
$fileUserPhotoPath = $_FILES['userPhoto']['tmp_name'];
$userPhoto = $_FILES['userPhoto']['name'];


for ($i=0; $i <=2 ; $i++) {
  move_uploaded_file($fileUserPhotoPath,$path."/".$userPhoto);
}*/

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
if (isset($_POST['saveUser']) && $names.isEmpty) {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '';
          </script>";

}elseif (isset($_POST['saveUser'])) {
  $queryUser = "INSERT INTO users(names,lastName,email,password,age,birthdayDate,direction,profession,interests,phone)
  VALUES ('$names', '$lastName', '$email', '$password','$age', '$birthdayDate','$direction','$profession','$interests','$phone')";
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
     window.location = '';
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
