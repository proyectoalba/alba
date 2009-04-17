<?php use_helper('Validation') ?>
 
 <br>
 <div class="titulo">Inicio de Sesi&oacute;n del Sistema</div>
    <br>
    <?php if (sfConfig::get('sf_environment')  == 'demo'):?>
        <div style="border: 2px dashed; border-color: red; width: 50%">
        Ud. va a ingresar a una demo del sistema en desarrollo.<br/>
        <br/>
        Para iniciar la sesi&oacute;n utilice el usuario "<b>admin</b>" y la contrase&ntilde;a "<b>admin</b>".<br/>
        De esta forma Ud. tendr&aacute; las atribuciones de administrador a excepci&oacute;n del manejo de usuarios.<br/>
        La base de datos de demostraci&oacute;n es recuperada cada <b>una hora</b>
        y por &eacute;ste motivo,<br/> si realiza cambios, &eacute;stos no se mantendr&aacute;n transcurrido ese lapso.<br/>
        </div>
        <br/>
    <?php endif;?>
    <?php echo form_tag('seguridad/login',array('name'=>'frmlogin'))?>
        <table align="center">
          <tr>
            <td class="etiqueta">
                Usuario:
            </td>
            <td>
                <div class="error">  
                <?php echo form_error('login') ?>
                </div>
                <?php echo input_tag('login', $sf_params->get('login'),array('class'=>'textlogin')) ?>
           </td>
           <td rowspan="2">
                <?php echo image_tag('login.png', array('alt' => 'login')) ?>
           </td>
          </tr>
          <tr>
            <td class="etiqueta"> 
                Clave:
            </td>
            <td>
                <div class="error">  
                <?php echo form_error('password') ?>
                </div>
                <?php echo input_password_tag('password','',array('class'=>'textlogin')) ?>
            </td>
          </tr>
          </table>  
        <p align="center">
        <?php echo submit_tag('submit', array('class'=>'boton','value'=>'Ingresar')) ?>
        </p>
    </form>
   
    <?php if ($error_inicio_sesion):?>
        <p align="center" class="error">Error de usuario y/o contrase&ntilde;a</p>
        <p align="center" ><?php echo link_to('Olvid&oacute; su contrase&ntilde;a?','seguridad/enviarclave?usuario=' . $sf_params->get('login'))?></p>
    <?php endif; ?>
 <br>
  
<script>
    document.frmlogin.login.focus();
</script>
