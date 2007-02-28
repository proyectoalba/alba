<?php use_helper('Validation') ?>
 
 <br>
 <div class="titulo">Inicio de Sesi&oacute;n del Sistema</div>
    <br>
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