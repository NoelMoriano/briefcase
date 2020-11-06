<?php
  session_start();
  if (isset($_SESSION['userEmail'])) {
    header("Location:../admin/index.php");
  }

require("../control/classConnectionMySQL.php");

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();

//////////////////////////////
// DATOS POST
//////////////////////////////
$userEmail = $_POST['InputEmail'];
$password = $_POST['InputPassword'];


//////////////////////////////
// VERIFIC SESSION
//////////////////////////////
if (substr($userEmail,0,1)=="'" || empty($userEmail) || empty($password))
    {
    echo "<script>
    alert('Inserte datos!');
    window.location='../login.php';
    </script>";
    exit();
    }

$query = "SELECT * FROM users WHERE email = '$userEmail' AND password = '$password'";
$result = $newConn->ExecuteQuery($query);
$rows = mysqli_num_rows($result);

if ($rows>0){
      $_SESSION['userEmail'] = $userEmail;
       echo "<script>
       alert('Bienvenido');
       window.location='../index.php';
        </script>";

}else{
      echo "<script>
       alert('Datos Incorrectos');
       window.location='../index.html';
     </script>";
     }
 mysqli_free_result($result);

 // Cerramos la Conexion a la BD
$newConn->CloseConnection();
?>
