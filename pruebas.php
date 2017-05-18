<?php 
include('include/config.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Error conectando a la BD: " . mysqli_connect_error());
}
mysqli_query($conn,"set names 'utf8'");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>pruebas MYSQL</title>
</head>
<body>



<?php

$id_usuario = $_GET['u'];

$sql = "SELECT * FROM usuarios";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	
	 while($row = mysqli_fetch_assoc($result)) {
		 
		 echo "hola " . $row['nombre'] . "<br>";
	 }
	
	
	
}
else
{
	echo "No hay resultados";
}


?>











</body>
</html>