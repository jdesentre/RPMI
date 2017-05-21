	<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li <?php echo ($cpage == 'inicio') ? 'class="active"' : '' ?>><a href="#">Inicio</a></li>
          <li <?php echo ($cpage == 'articulo') ? 'class="active"' : '' ?>><a href="#">Artículo</a></li>
          <li <?php echo ($cpage == 'galeria') ? 'class="active"' : '' ?>><a href="#">Galería</a></li>
          <li <?php echo ($cpage == 'contactar') ? 'class="active"' : '' ?>><a href="#">Contactar</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li <?php echo ($cpage == 'registro') ? 'class="active"' : '' ?>><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
          <?php if(isset($_SESSION['uid'])) : ?>
          <li><a href="registro.php?logout="> Logout</a></li>
          <?php else : ?>
          <li <?php echo ($cpage == 'login') ? 'class="active"' : '' ?>><a href="registro.php?login="><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php endif ?>
        </ul>
      </div>
    </nav>
    
    <!--Breadcrumb-->
    <?php if(is_array($breadcrumb_array)) : ?>
    <ol class="breadcrumb">
    <?php $c = 1 ?>
	<?php foreach($breadcrumb_array AS $key => $value) : ?>
    
      <li class="breadcrumb-item">
      	<?php if($c != count($breadcrumb_array)) : ?>
      	<a  href="<?php echo $value ?>"><?php echo $key ?></a>
        <?php else : ?>
        <?php echo $key ?>
        <?php endif ?>
      </li>
    <?php $c++ ?>
    <?php endforeach ?>
    </ol>
    <?php endif ?>