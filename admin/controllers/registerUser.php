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

/* function fetchUser($field){
  $queryUser = "SELECT $field FROM users WHERE id = $userId";
  $resultQuery = $newConn->ExecuteQuery($queryUser);
  while($userRow->mysqli_fetch_array($resultQuery)){
    return $userRow["id"];
  }
} */

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
$userType = $_POST['userType']; 

//////////////////////////////
// INSERTAR users
//////////////////////////////
if (isset($_POST['saveUser']) && $names == '') {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '../register.php';
          </script>";

}elseif (isset($_POST['saveUser'])) {

  $queryUser =  "INSERT INTO `users`(`userEmail`, `password`, `names`, 
  `lastName`, `age`, `birthdayDate`, `direction`, `profession`, `interests`, `phone`,`description`,
  `userFb`,`userTwitter`,`userLinkedin`,`userType`) 
  VALUES ('$email','$password','$names','$lastName','$age', '$birthdayDate',
  '$direction','$profession','$interests','$phone','$description','$userFb','$userTwitter','$userLinkedin','$userType')";

    $resultUser = $newConn->ExecuteQuery($queryUser);
    if($resultUser){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
            echo "<script>
            alert('Registro Guardado Existosamente, puede iniciar sesión');
            window.location = '../login.php';
          </script>";
        }
    }else{
        echo "<script>
     alert('Error en registro');
     window.location = '../register.php';
          </script>";
  }
}


// Cerramos la Conexion a la BD
$newConn->CloseConnection();
