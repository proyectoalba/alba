<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<h1><?php echo __('Editar Entrada en Legajo de Salud para '.$alumno->getApellido().' '.$alumno->getNombre(), array()) ?></h1>

<div id="sf_admin_container">

<?php if ($sf_user->hasFlash('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
</div>
<?php endif; ?>

<?php echo form_tag('legajosalud/save', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<?php echo object_input_hidden_tag($legajosalud, 'getId') ?>
<?php echo input_hidden_tag('legajosalud[fk_alumno_id]', $alumno_id) ?>
<?php echo input_hidden_tag('aid', $alumno_id) ?>


<fieldset id="sf_fieldset_informacion_general" class="">
<h2><?php echo __('Entrada') ?></h2>

<div class="form-row">

  <?php echo label_for('legajosalud[fecha]', __('Fecha:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('legajosalud{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('legajosalud{fecha}')): ?>
    <?php echo form_error('legajopedagogico{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_date_tag($legajosalud, 'getFecha', array (
  'rich' => true,
//  'withtime' => true,
  'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png',
  'control_name' => 'legajosalud[fecha]',
)) ?>
  </div> 
</div>

<div class="form-row">
<?php echo label_for('legajosalud[titulo]', __('Enfermedad:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('legajosalud{titulo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('legajosalud{titulo}')): ?>
    <?php echo form_error('legajosalud{titulo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($legajosalud, 'getTitulo', array (
  'size' => 20,
  'control_name' => 'legajosalud[titulo]',
)) ?>
    </div>

</div>

<div class="form-row">
  <?php echo label_for('legajosalud[descripcion]', __('Observaci&oacute;n:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('legajosalud{descripcion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('legajosalud{descripcion}')): ?>
    <?php echo form_error('legajosalud{descripcion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php 
#echo object_input_tag($legajosalud, 'getDescripcion', array ( 'size' => 40, 'control_name' => 'legajosalud[descripcion]',));
echo textarea_tag('legajosalud[descripcion]', ($legajosalud->getDescripcion())?stream_get_contents($legajosalud->getDescripcion()):"" ,'size=80x20');
?>
    </div>
</div>
</fieldset>

<ul class="sf_admin_actions">
      <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
    <li><?php echo button_to(__('Legajos'), 'legajosalud/verLegajo?aid='.$alumno_id, array (
  'class' => 'sf_admin_action_list',
)) ?></li>
</ul>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($legajosalud->getId()): ?>
<?php echo button_to(__('delete'), 'legajosalud/delete?id='.$legajosalud->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

</div>

