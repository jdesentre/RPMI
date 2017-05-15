<?php
include('include/config.php');

//Conectamos con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//Array para construir el breadcrumb
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


</body>
</html>
<?php mysqli_close($conn); ?>