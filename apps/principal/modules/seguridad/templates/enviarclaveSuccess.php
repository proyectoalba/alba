<?php echo form_tag("seguridad/enviar", array('name'=>'frmresetpasswd'))?>
    <div class="bloque">    
        
        <p>Ud. ha solicitado que se env&iacute;e una nueva contrase&ntildea.<br>Por favor, ingrese los datos
        a continuaci&oacute;n para realizar &eacute;sta operaci&oacute;n:</p>
        <br>
            <label for="usuario">Ingrese su nombre de usuario:</label><br>
            <?php echo input_tag('usuario', $sf_params->get('usuario'),'class=textlogin') ?>               
        </p>                                                  
        <br>
        <p>                                                                                                                                     
            <?php echo submit_tag('submit', 'class=boton value=Enviar mi clave') ?>           
        </p>
  </div>
</form>
<p><?php echo link_to('Volver', "seguridad/login")?>
</p>
<script>
    document.frmresetpasswd.usuario.focus();
</script>