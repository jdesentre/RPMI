<?php
include('config.php');
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Error conectando a la BD: " . mysqli_connect_error());
}
mysqli_query($conn,"set names 'utf8'");

$username = (isset($_GET['u']) && $_GET['u'] != '') ? $_GET['u'] : 'NULL';

//Compruebo si el usuario existe
$sql = "SELECT * FROM usuarios WHERE username = '" . $username . "' LIMIT 1";
$result = mysqli_query($conn, $sql);
//Si hay resultados, es que el usuario existe
if(mysqli_num_rows($result) > 0)
{
	echo "Existe usuario";
}
else
{
	echo "No existe";
}
		
?>