<?php use_helper('Object') ?>
<?php use_helper('Javascript') ?>
<?php use_helper('Validation') ?>

<style>
#form {
background-color: silver;
border:1px solid gray; 
position:relative;
bottom:150px; 
left:360px; 
width:50%;
font-family: "Trebuchet MS", Arial, Verdana, sans-serif;
}


</style>

<div id="form">
<h2>Nueva Cuenta</h2>
<?php echo form_tag('alumno/grabarCuenta', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>
    <table>
        <tr>
            <td>Nombre:</td>
            <td>
                <?php if ($sf_request->hasError('cuenta{nombre}'))
                            echo form_error('cuenta{nombre}', array('class' => 'form-error-msg'));
                 echo object_input_tag($cuenta, 'getNombre', array ('size' => 16,'control_name' => 'cuenta[nombre]',)); ?>
            </td>
            <td></td> 
            <td></td>
            <td>Raz&oacute;n Social:</td> 
            <td>
                <?php if ($sf_request->hasError('cuenta{razon_social}'))
                         echo form_error('cuenta{razon_social}', array('class' => 'form-error-msg'));
                echo object_input_tag($cuenta, 'getRazonSocial', array ('size' => 16,'control_name' => 'cuenta[razon_social]',)); ?>
            </td>
        </tr>
        <tr>
            <td>CUIT:</td> 
            <td>
                <?php if ($sf_request->hasError('cuenta{cuit}'))
                         echo form_error('cuenta{cuit}', array('class' => 'form-error-msg'));
                echo object_input_tag($cuenta, 'getCuit', array ('size' => 16,'control_name' => 'cuenta[cuit]',)); ?>
            </td>
            <td></td> 
            <td></td>
            <td>Tipo IVA:</td> 
            <td>
                   <?php if ($sf_request->hasError('cuenta{fk_tipoiva_id}'))
                            echo form_error('cuenta{fk_tipoiva_id}', array('class' => 'form-error-msg'));?>                    

<?php echo object_select_tag($cuenta, 'getFkTipoivaId', array (
  'related_class' => 'Tipoiva',
  'control_name' => 'cuenta[fk_tipoiva_id]',
)) ?>
            </td>
        </tr>


        <tr>
            <td>Direcci&oacute;n:</td> 
            <td>                
                <?php if ($sf_request->hasError('cuenta{direccion}'))
                        echo form_error('cuenta{direccion}', array('class' => 'form-error-msg'));
                echo object_input_tag($cuenta, 'getDireccion', array ('size' => 16,'control_name' => 'cuenta[direccion]',)); ?>
            </td>
            <td></td> 
            <td></td>
            <td>Ciudad:</td> 
            <td>
                <?php if ($sf_request->hasError('cuenta{ciudad}'))
                        echo form_error('cuenta{ciudad}', array('class' => 'form-error-msg'));
                echo object_input_tag($cuenta, 'getCiudad', array ('size' => 16,'control_name' => 'cuenta[ciudad]',));?>
            </td>
        </tr>

        <tr>
<!--            <td>Provincia:</td> 
            <td>
                <?php if ($sf_request->hasError('cuenta{fk_provincia_id}'))
                        echo form_error('cuenta{fk_provincia_id}', array('class' => 'form-error-msg'));?>
<div id="item_provincia">
  <?php echo object_select_tag($cuenta, 'getFkProvinciaId', array (
  'related_class' => 'Provincia',
  'peer_method' => 'getEnOrden',
  'control_name' => 'cuenta[fk_provincia_id]',
)) ?>
</div>            </td> 
            <td></td>
            <td></td> -->
            <td>CP:</td> 
            <td>
                <?php if ($sf_request->hasError('cuenta{codigo_postal}'))
                        echo form_error('cuenta{codigo_postal}', array('class' => 'form-error-msg'));
                echo object_input_tag($cuenta, 'getCodigoPostal', array ('size' => 16,'control_name' => 'cuenta[codigo_postal]',));?>
            </td>
        </tr>


    </table><br>
    <?php echo submit_to_remote('ajax_submit', 'Grabar', array('update'   => 'nueva_cuenta' , 'url' => 'alumno/grabarCuenta?vista=noMuestraMenu','script' => true)) ?>
    <?php echo button_to_function('Cerrar', update_element_function('nueva_cuenta', array('content' => '')));?>

</form>
</div> 