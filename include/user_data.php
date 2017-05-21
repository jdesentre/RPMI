<?php 
//Tiempo logeado
$secs = time() - $_SESSION['logged_time'];

?>

	<div class="row">
    	<div class="col-md-12">
            <h3>Hola <?php echo $_SESSION['uname'] ?></h3>
            <h4>Llevas logeado <?php echo $secs ?> segundos</h4>
        </div>
    </div>
    