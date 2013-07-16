<div id="sf_admin_content">
  <h1>Recuperaci&oacute;n de clave:</h1>
  <div id="sf_admin_container">
    <?php include_partial('global/flashes') ?>
  </div>
</div>
<?php echo form_tag("seguridad/pregunta", array('name' => 'frmresetpasswd')) ?>
<div class="bloque">    

  <p>Ud. ha solicitado que se env&iacute;e una nueva contrase&ntildea.<br>Por favor, ingrese los datos
    a continuaci&oacute;n para realizar &eacute;sta operaci&oacute;n:</p>
  <br/>
  <label for="usuario">Ingrese su nombre de usuario:</label><br>
  <?php echo input_tag('usuario', $usuario, 'class=textlogin') ?>               
  </p>                                                  
  <br/>
  <p>                                                                                                                                     
    <?php echo submit_tag('submit', 'class=boton value=Iniciar recuperación de clave') ?>           
  </p>
</div>
</form>
<p><?php echo link_to('Volver', "seguridad/login") ?>
</p>
<script>
  document.frmresetpasswd.usuario.focus();
</script>