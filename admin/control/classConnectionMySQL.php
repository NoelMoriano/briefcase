<?php 

class connectionMySQL{
// Definicion de atributos
private $host;
private $user;
private $password;
private $database;
private $conn;
 
public function __construct(){ 
//Constructor
require_once "config_db.php";
$this->host=HOST;
$this->user=USER;
$this->password=PASSWORD;
$this->database=DATABASE;  
}
  
public function createConnection(){
	// Metodo que crea y retorna la conexion a la BD.
	$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
	$this->conn->set_charset("utf8");
	 if($this->conn->connect_errno) {
	  die("Error al conectarse a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
	 }
	 // else{
	 // 	echo "Conexion exitosa";
	 // }

	 /* check connection */
	if (mysqli_connect_errno()) {
	    printf("Error de conexión: %s\n", mysqli_connect_error());
	    exit();
	}

}
  
public function closeConnection(){
//Metodo que cierra la conexion a la BD
 $this->conn->close();
}
  
public function executeQuery($sql){
/* Metodo que ejecuta un query sql
 Retorna un resultado si es un SELECT*/
 $result = $this->conn->query($sql);
 return $result;
}
  
public function getCountAffectedRows(){
/* Metodo que retorna la cantidad de filas
 afectadas con el ultimo query realizado.*/
 return $this->conn->affected_rows;
}
  
public function getRows($result){
/*Metodo que retorna la ultima fila
 de un resultado en forma de arreglo.*/
 return $result->fetch_row();
}
  
public function setFreeResult($result){
//Metodo que libera el resultado del query.
 $result->free_result();
 }
}














