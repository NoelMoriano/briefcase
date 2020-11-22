<?php
require("../admin/control/classConnectionMySQL.php");

$newConn = new connectionMySQL();

$newConn->createConnection(); 

$ratingValue = $_POST['star'];
$userId = $_POST['userId'];

if (isset($_POST['actionRating']) && $ratingValue=='' ) {
    echo "<script> alert('Seleccione una cantidad de estrellas'); 
           window.location = '../index.php'; </script>";
}else {
    $query = "INSERT INTO `technical_rating`(`rating`, `userId`) VALUES ('$ratingValue', '$userId')";
    $resultQuery = $newConn->ExecuteQuery($query);
    
    if ($resultQuery){
        echo "<script> alert('Registro exitoso'); 
        window.location = '../index.php'; </script>";
    }else {
        echo "<script> alert('Registro fallido, intentalo más tarde.'); 
        window.location = '../index.php'; </script>";
    }
}

// Cerramos la Conexion a la BD
$newConn->CloseConnection();

