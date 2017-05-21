	
        <p>Escribe tu nombre de usuario (correo) y tu contraseña.</p> 
        <!--El destino  -->
        <form action="registro.php?login=" method="post">
          <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="text" class="form-control" name="login_email" id="login_email">
          </div>
          <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" class="form-control" name="login_pwd" id="login_pwd">
          </div>
          
          <button type="submit" class="btn btn-default">Enviar</button>
          
          <?php if($error_login) : ?>
          <br>
            <div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>ERROR</strong> Usuario y contraseña incorrectos.
            </div>
          <?php endif ?>
        </form>