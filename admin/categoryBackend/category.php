<?php 
require("../control/classConnectionMySQL.php");

// Creamos una nueva instancion
$newConn = new connectionMySQL();

// Creamos una nueva conexion
$newConn->createConnection();


//////////////////////////////
// DATOS POST
//////////////////////////////
///
$path="C:/xampp/htdocs/maisen/admin/uploads/category";
// firstPicture
$categoryName = $_POST['categoryName'];
$categoryDescription = $_POST['categoryDescription'];



$img=$_FILES['img']['tmp_name'];
$img1 = $_FILES['img']['name'];

move_uploaded_file($img,$path."/".$img1);


//////////////////////////////
// INSERTAR CATEGORY
//////////////////////////////
if (isset($_POST['saveCategory']) && $categoryName == '') {
    echo "<script>
     alert('Todos los campos son importantes');
     window.location = '../category.php';
          </script>";

}elseif (isset($_POST['saveCategory'])) {
	$query = "INSERT INTO category(categoryName, categoryDescription, img) VALUES ('$categoryName','$categoryDescription','$img1')";
    $result = $newConn->ExecuteQuery($query);
    if($result){
        $rowCount =  $newConn->GetCountAffectedRows();
        if($rowCount > 0){
            echo "Query ejecutado exitosamente<BR>";
            header("Location:../category.php");
        }
    }else{
        echo "<h3>Error ejecutando la consulta</h3>";
  }  
}
   


///////////////////////////////
// ELIMINAR
///////////////////////////////
  if (isset($_GET['idCategory'])) {
  	$idCategory = $_GET['idCategory'];
	$query = "DELETE FROM category WHERE idCategory = '$idCategory'";
	$result = $newConn->ExecuteQuery($query);
	if($result){
	    $rowCount=$newConn->GetCountAffectedRows();
	    if($rowCount>0){
	        echo "Eliminado exitosamente";
	        header("Location:../category.php");
	    }
	}
	else{
	        echo "<h3>Error ejecutando la consulta</h3>";
	}   
	     
}
 
// Cerramos la Conexion a la BD
$newConn->CloseConnection();

