<?php
require("../admin/control/classConnectionMySQL.php");

$newConn = new connectionMySQL();

$newConn->createConnection(); 

$ratingValue = $_POST['star'];
$userId = $_POST['userId'];

$errorMessage = "<script> alert('Ocurrio un error, intentelo mas tarde'); 
window.location = '../briefcase.php?userId=$userId'; </script>";

if (isset($userId)) {
    $query = "SELECT * FROM `technical_rating` WHERE userId = '$userId'";
    $result = $newConn->ExecuteQuery($query);
    $rowCount =  $newConn->GetCountAffectedRows();
        if($result && $rowCount > 0){
            
            $dataToUpdate = $ratingValue."Stars";
             
             while ($rowRating = mysqli_fetch_array($result)) {
                  $ratingValueDB = $rowRating["$dataToUpdate"];
             }
             
             updateRating($newConn,$userId,$ratingValue,$dataToUpdate,$ratingValueDB);
        }else{
            $ratingUpdate = $ratingValue."Stars";

            insertRating($newConn,$userId,$ratingUpdate);
        }
}else {
    echo $errorMessage;
}


function insertRating($newConn,$userId,$ratingUpdate){
    $countRating = 1;
    
    $query =  "INSERT INTO `technical_rating`(`$ratingUpdate`,`userId`) 
    VALUES ('$countRating','$userId')";
  
      $result = $newConn->ExecuteQuery($query);
      if($result){
            echo "<script>
            alert('Calificación exitosa');
            window.location = '../briefcase.php?userId=$userId';
          </script>";
      }else{
        echo $errorMessage;
    }
}


function updateRating($newConn,$userId,$ratingValue,$dataToUpdate,$ratingValueDB){

    $dateUpdate = date('Y-m-d H:i:s');

    $countRating = $ratingValueDB + 1;

    $query = "UPDATE `technical_rating` SET `$dataToUpdate` = '$countRating',`updateAt`='$dateUpdate' WHERE userId = $userId";
    $result = $newConn->ExecuteQuery($query);

    if($result){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
          echo "<script>
          alert('Calificación exitosa');
          window.location = '../briefcase.php?userId=$userId';
        </script>";
        }else{
            echo $errorMessage;
        }

    }else{
        echo $errorMessage;
    }
}


// Cerramos la Conexion a la BD
$newConn->CloseConnection();

