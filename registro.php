<?php
include('include/config.php');
session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Error conectando a la BD: " . mysqli_connect_error());
}
mysqli_query($conn,"set names 'utf8'");

//Variables de errores y alertas para mostrar
$error_login = false;
$error_register = false;

//Si se ha enviado el formulario de registro...
if(isset($_POST['nombre']))
{
	$sql = "INSERT INTO `losenlaces_pr7`.`usuarios` 
	(`id_usuario`, `nombre`, `correo`, `cultura`, `password`, `id_pais`, `time`) 
	VALUES (
		NULL, 
		'" . $_POST['nombre'] . "', 
		'" . $_POST['correo'] . "', 
		'" . $_POST['raza'] . "', 
		'" . md5($_POST['password']) . "', 
		'" . $_POST['pais'] . "', 
		'" . time() . "'
	);";
	
	//Ejecuto la consulta, y si ha ido bien,creo variables de sesión y refresco la página
	if(mysqli_query($conn,$sql))
	{
		$_SESSION['uname'] = $_POST['nombre'];
		$_SESSION['logged_time'] = time();
		//Para crear la variable de sesión con el ID, debo obtenerlo del último insert
		//https://www.w3schools.com/php/php_mysql_insert_lastid.asp
		$last_id = mysqli_insert_id($conn);
		$_SESSION['uid'] = $last_id;
		
		//Refresco la página
		header("Refresh:0");
	}
	else
	{
		die("Se ha producido un error al insertar los datos: " . $sql . "<br>" . mysqli_error($conn));
	}

	//print_r($_POST);
}

//Si se ha enviado el formulario de logeo
if(isset($_POST['login_email']))
{
	//Compruebo si el usuario y contraseña son correctos (la contraseña debe ser encriptada)
	$sql = "SELECT * FROM usuarios WHERE correo = '" . $_POST['login_email'] . "' AND password = '" . md5($_POST['login_pwd']) . "' LIMIT 1";
	
	$result = mysqli_query($conn, $sql);
	//Si hay resultados, es que la consulta es correcta
	if(mysqli_num_rows($result) > 0)
	{
		//Obtengo los datos del usuario en un array asociativo
		$row = mysqli_fetch_assoc($result);
		//Creo las variables de sesión y refresco la página
		$_SESSION['uname'] = $row['nombre'];
		$_SESSION['logged_time'] = time();
		$_SESSION['uid'] = $row['id_usuario'];
		
		//Recargo la página, pero creando la variable GET 'login' para que muestre el formulario de logeo
		header("Refresh:0");

	}
	else
	{
		//Si el usuario es incorrecto, activo la variable de error
		$error_login = true;
	}
}

//Si el usuario se ha deslogeado (porque en el enlace está la variable GET 'logout')
if(isset($_GET['logout']))
{
	// remove all session variables
	session_unset(); 
	// destroy the session 
	session_destroy(); 
	
	//Recargo la página, pero creando la variable GET 'login' para que muestre el formulario de logeo
	header("Refresh:0; url=registro.php?login=");


}


//Array para construir el breadcrumb (esto es específico del profesor)
$breadcrumb_array = array(
	'Inicio' => 'index.php',
	'Registro' => 'registro.php'
	);

if(isset($_GET['login']))
{
	$ptitle = "Login";
	$cpage = "login";
}
else
{
	$ptitle = "Formulario de registro";
	$cpage = "registro";
}

?>
<div class="container" >

	<?php include('include/head.php') ?>
	
    <!--Top Header-->
    <?php include('include/top_header.php') ?>
    <!--Fin Header-->    
    <!--Menú-->
    <?php include('include/menu.php') ?>
    <!--Fin menú-->
	
    
    <h1><?php echo $ptitle ?></h1>
    <div class="row">
    	<div class="col-md-6">
		<?php
            if(isset($_SESSION['uid']))
            {
                include('include/user_data.php');
            }
			else if(isset($_GET['login']))
            {
                include('include/form_login.php');
            }
            else
            {
                include('include/form_reg.php');
            }  
        ?>
    	</div>
	</div>
    <div id="footer">
        <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />Esta obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Licencia Creative Commons Atribución-NoComercial 4.0 Internacional</a>.
    
    </div>
</div>


<script src="js/scripts.js"></script>
</body>
</html>
	