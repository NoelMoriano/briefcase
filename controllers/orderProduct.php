 <?php
header("Content-type: text/html;charset=\"utf-8\"");
date_default_timezone_set('America/Lima');


$quantity = $_POST['quantity'] ;
$product = $_POST['product'] ;
$names = $_POST['names'] ;
$phone = $_POST['phone'] ;
$mail = $_POST['email'] ;
$mail_copy = "beto1perk@gmail.com";
$message = $_POST['message'];


$header = 'From: '.$mail."\r\n".
'Reply-To:'.$mail_copy."\r\n".
'X-Mailer: PHP/'.phpversion();

$mensaje = "Nombre usuario: " . $names . ",\r\n";
$mensaje .= "Producto: " . $product . " \r\n";
$mensaje .= "Cantidad: " . $quantity ."Uni.". " \r\n";
$mensaje .= "Telefono: " . $phone . " \r\n";
$mensaje .= "Email: " . $mail . " \r\n";
$mensaje .= "MENSAJE DE CONSULTA: " . $message . " \r\n";
$mensaje .= "Fecha del Mensaje: " . date('d/m/Y')."  ".date('h:i:s')."\n\n";

$para = 'mariano260996@gmail.com';


if (isset($_POST['sendOrder']) && empty($quantity) || empty($product) || empty($names) || empty($phone) || empty($mail) || empty($message)) {
  
  echo "<script>
          alert('Ingrese todos tus datos para realizar la orden del producto...');
          window.location.href='../index.php';
  </script>";
  
}else{
mail($para,"NUEVA ORDEN DE PRODUCTO:",utf8_decode($mensaje), $header);
echo "<script type='text/javascript'>
            window.location.href='../index.php';
        </script>";
}

?>