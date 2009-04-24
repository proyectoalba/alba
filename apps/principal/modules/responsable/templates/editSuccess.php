<?php
    if(isset($datosCuenta)) {
?>
<script type="text/javascript">
function completaDatos() 
{
var datosCuenta = new Array()
datosCuenta [0] = "<?php echo $datosCuenta->getDireccion()?>"
datosCuenta [1] = "<?php echo $datosCuenta->getCiudad()?>"
datosCuenta [2] = "<?php echo $datosCuenta->getFkProvinciaId()?>"
datosCuenta [3] = "<?php echo $datosCuenta->getCodigoPostal()?>"
datosCuenta [4] = "<?php echo $datosCuenta->getTelefono()?>"
document.getElementsByName("responsable[direccion]")[0].value = datosCuenta[0]
document.getElementsByName("responsable[ciudad]")[0].value = datosCuenta[1]
document.getElementsByName("responsable[fk_provincia_id]")[0].value = datosCuenta[2]
document.getElementsByName("responsable[codigo_postal]")[0].value = datosCuenta[3]
document.getElementsByName("responsable[telefono]")[0].value = datosCuenta[4]
}
</script>
<?php
    }
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<div id="sf_admin_container">
<h1><?php 
    echo __('Editar Responsable',array());
    if ($responsable->getCuenta())
        echo '(' . $responsable->getCuenta()->getNombre() .')' ;
?></h1>

<div id="sf_admin_header">
<?php include_partial('responsable/edit_header', array('responsable' => $responsable)) ?>
</div>

<div id="sf_admin_content">

<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="save-ok">
        <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
    </div>
<?php endif; ?>

<?php echo form_tag('responsable/save', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<?php echo object_input_hidden_tag($responsable, 'getId') ?>

<fieldset id="sf_fieldset_informaci_oacute_n_general" class="">
<h2><?php echo __('Informaci&oacute;n general') ?></h2>

<div class="form-row">
  <?php echo label_for('responsable[apellido]', __('Apellido:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{apellido}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{apellido}')): ?>
    <?php echo form_error('responsable{apellido}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getApellido', array (
  'size' => 64,
  'control_name' => 'responsable[apellido]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[apellido_materno]', __('Apellido Materno:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{apellido_materno}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{apellido_materno}')): ?>
    <?php echo form_error('responsable{apellido_materno}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($responsable, 'getApellidoMaterno', array (
  'size' => 64,
  'control_name' => 'responsable[apellido_materno]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[nombre]', __('Nombre:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{nombre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{nombre}')): ?>
    <?php echo form_error('responsable{nombre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getNombre', array (
  'size' => 64,
  'control_name' => 'responsable[nombre]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[sexo]', __('Sexo:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{sexo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{sexo}')): ?>
    <?php echo form_error('responsable{sexo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo include_partial('sexo', array('type' => 'edit', 'responsable' => $responsable)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[fk_tipodocumento_id]', __('Tipo Documento:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{fk_tipodocumento_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{fk_tipodocumento_id}')): ?>
    <?php echo form_error('responsable{fk_tipodocumento_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_select_tag($responsable, 'getFkTipodocumentoId', array (
  'related_class' => 'Tipodocumento',
  'peer_method' => 'getEnOrden',
  'control_name' => 'responsable[fk_tipodocumento_id]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[nro_documento]', __('Nro. Documento:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{nro_documento}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{nro_documento}')): ?>
    <?php echo form_error('responsable{nro_documento}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getNroDocumento', array (
  'size' => 16,
  'control_name' => 'responsable[nro_documento]',
)) ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_donde_vive" class="">
<h2><?php echo __('Donde vive') ?></h2>
<br>
<?php
    if(isset($datosCuenta)) {
        echo button_to("Cargar datos de la cuenta", "", array("class" => "sf_admin_action_sava", "onClick" => "javascript:completaDatos()"));
   }
?>
<div class="form-row">
  <?php echo label_for('responsable[direccion]', __('Direcci&oacute;n:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{direccion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{direccion}')): ?>
    <?php echo form_error('responsable{direccion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getDireccion', array (
  'size' => 64,
  'control_name' => 'responsable[direccion]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[ciudad]', __('Ciudad:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{ciudad}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{ciudad}')): ?>
    <?php echo form_error('responsable{ciudad}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getCiudad', array (
  'size' => 64,
  'control_name' => 'responsable[ciudad]',
)) ?>
    </div>
</div>


<div class="form-row">
    <?php echo label_for('responsable[fk_pais_id]', __('Pais:'), 'class="required" ') ?>
    <?php include_partial('pais_id',array('responsable' => $responsable))?>
</div>

<div class="form-row">
  <?php echo label_for('responsable[fk_provincia_id]', __('Provincia:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{fk_provincia_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{fk_provincia_id}')): ?>
    <?php echo form_error('responsable{fk_provincia_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
    <div id="item_provincia"></div>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[codigo_postal]', __('CP:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{codigo_postal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{codigo_postal}')): ?>
    <?php echo form_error('responsable{codigo_postal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getCodigoPostal', array (
  'size' => 20,
  'control_name' => 'responsable[codigo_postal]',
)) ?>
    </div>
</div>

</fieldset>
<fieldset id="sf_fieldset_otros" class="">
<h2><?php echo __('Otros') ?></h2>

<div class="form-row">
  <?php echo label_for('responsable[telefono]', __('Tel&eacute;fono:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{telefono}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{telefono}')): ?>
    <?php echo form_error('responsable{telefono}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getTelefono', array (
  'size' => 20,
  'control_name' => 'responsable[telefono]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[telefono_movil]', __('Tel. Movil:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{telefono_movil}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{telefono_movil}')): ?>
    <?php echo form_error('responsable{telefono_movil}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getTelefonoMovil', array (
  'size' => 20,
  'control_name' => 'responsable[telefono_movil]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[email]', __('Email:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{email}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{email}')): ?>
    <?php echo form_error('responsable{email}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getEmail', array (
  'size' => 64,
  'control_name' => 'responsable[email]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[relacion]', __('Relaci&oacute;n con los alumnos:'), 'class="required" ') ?>
  
    
   <div class="content<?php if ($sf_request->hasError('responsable{fk_rolresponsable_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{fk_rolresponsable_id}')): ?>
    <?php echo form_error('responsable{fk_rolresponsable_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>    
  
   <?php echo object_select_tag($responsable, 'getFkRolresponsableId', array (
  'related_class' => 'RolResponsable',
  'control_name' => 'responsable[fk_rolresponsable_id]',
)) ?>   
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[observacion]', __('Observaci&oacute;n:'), '') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{observacion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{observacion}')): ?>
    <?php echo form_error('responsable{observacion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($responsable, 'getObservacion', array (
  'size' => 80,
  'control_name' => 'responsable[observacion]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('responsable[autorizacion_retiro]', __('Aut. Retiro:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('responsable{autorizacion_retiro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('responsable{autorizacion_retiro}')): ?>
    <?php echo form_error('responsable{autorizacion_retiro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_checkbox_tag($responsable, 'getAutorizacionRetiro', array (
  'control_name' => 'responsable[autorizacion_retiro]',
)) ?>
    </div>
</div>

    <?php
        echo object_input_hidden_tag($responsable,'getFkCuentaId',array('control_name' =>'responsable[fk_cuenta_id]'));
    ?>

        </fieldset>


<?php echo include_partial('edit_actions', array('responsable' => $responsable)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($responsable->getId()): ?>
<?php echo button_to(__('delete'), 'responsable/delete?id='.$responsable->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

</div>

<div id="sf_admin_footer">
<?php include_partial('responsable/edit_footer', array('responsable' => $responsable)) ?>
</div>
</div>
