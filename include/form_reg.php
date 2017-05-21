		<p>Rellena el siguiente formulario para registrarte en nuestra base de datos.</p> 
        <form class="form-horizontal" action="" method="post" id="myForm">
          
          
          <!--Grupo nombre-->
          <div class="form-group" id="grp_nombre">
            <label class="control-label col-sm-2" for="input_nombre"><span>*</span>Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nombre" id="input_nombre" value="" placeholder="Escribe tu nombre y apellidos">
            <!--Error nombre-->
              <div class="alert alert-danger errores" id="error_nombre">
                 <strong>¡Error!</strong> El nombre no puede estar en blanco ni tener menos de 3 caracteres.
              </div>
            <!--Fin error nombre-->
            </div>
          </div>
          <!--Fin grupo nombre-->
          
          <!--Grupo correo-->
          <div class="form-group" id="grp_correo">
            <label class="control-label col-sm-2" for="input_correo"><span>*</span>Correo:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="correo" id="input_correo" placeholder="Escribe tu correo">
            </div>
          </div>
          <!--Fin grupo -->
          
          
          <!--Grupo contraseña-->
          <div class="form-group" id="grp_password">
            <label class="control-label col-sm-2" for="input_password"><span>*</span>Contraseña:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" data-toggle="tooltip" title="La contraseña debe tener entre 4 y 8 caracteres" data-placement="right" name="password" id="input_password" value="">
            </div>
          </div>
          <!--Fin grupo contraseña-->
          
          <!--Grupo contraseña2-->
          <div class="form-group" id="grp_password2">
            <label class="control-label col-sm-2" for="input_password2"><span>*</span>Contraseña:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" data-toggle="tooltip" title="Las contraseñas no coinciden" data-placement="right" name="password2" id="input_password2" value="">
            </div>
          </div>
          <!--Fin grupo contraseña-->
          
          
          <!--Grupo radio-->
          <div class="form-group" id="grp_raza">
            <label class="control-label col-sm-2" for="input_genero"><span>*</span>Raza:</label>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="raza" id="radio1" value="humano">Humano</label>
                <label class="radio-inline"><input type="radio" name="raza" id="radio2" value="elfo">Elfo</label>
                <label class="radio-inline"><input type="radio" name="raza" id="radio3" value="hobbit">Hobbit</label>
                <label class="radio-inline"><input type="radio" name="raza" id="radio4" value="mago">Istari</label>
                <label class="radio-inline"><input type="radio" name="raza" id="radio5" value="indefinido">T.Bombadil</label>
                
                <!--Error radio-->
              <div class="alert alert-danger errores" id="error_radio">
                 <strong>¡Error!</strong> Debes elegir al menos una raza.
              </div>
            	<!--Fin error-->
            </div>
          </div>
          <!--fin grupo-->
          
          <!--Grupo pais-->
          <div class="form-group" id="grp_pais">
            <label class="control-label col-sm-2" for="sel1"><span>*</span>País:</label>
            <div class="col-sm-10"> 
              <select class="form-control" name="pais" id="input_pais">
                <option value="">Elige un país...</option>
                <?php
                
                
				
				
				
                $sql = "SELECT * FROM apps_countries ORDER BY country_name";
				
				//echo $sql;

				
                $result = mysqli_query($conn, $sql);
				
				
                 // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['country_name'] . '</option>
					';
                }
                
                ?>
    
              </select>
              
              <!--Error pais-->
              <div class="alert alert-danger errores" id="error_pais">
                 <strong>¡Error!</strong> Debes elegir al menos un país.
              </div>
            	<!--Fin error-->
            </div>
          </div>
          <!--Fin grupo pais-->
    
          
          <div class="form-group" id="grpCheck"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label><input type="checkbox" id="checkBox"> Acepto las <a href="" data-toggle="modal" data-target="#myModal">condiciones</a> de uso de la página.</label>
              </div>
              <!--Error Check-->
              <div class="alert alert-danger errores" id="error_check">
                 <strong>¡Error!</strong> Debes aceptar las condiciones.
              </div>
              <!--Fin error-->
            </div>
            
          </div>

          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="nota" value="5.5">
              	<span class="btn btn-default" id="btn_send" >Enviar <i class="glyphicon glyphicon-ok"></i></span>
              
            </div>
          </div>
      


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Condiciones de uso</h4>
      </div>
      <div class="modal-body">
        <p>Al registrarte te comprometes a no revelar los secretos de la milenaria y secreta orden de los canteros.</p>
        <p>En caso de incumplimiento, al usuario se le hinchará el estómago y se le carén todos los pelos menos tres.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--Fin modal-->






    </div>






