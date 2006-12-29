<?php
// Necesito el template para que el combo de 
// los Cliclos lectivos dependa del esteablecimiento donde estoy
// date: 2006/10/09 16:36:25
?>
<?php use_helpers('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<h1><?php echo __('Modificar Feriado', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('feriado/edit_header', array('feriado' => $feriado)) ?>
</div>

<div id="sf_admin_content">

<?php if ($sf_request->hasErrors()): ?>
<div class="form-errors">
<h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
<ul>
<?php foreach ($sf_request->getErrorNames() as $name): ?>
  <li><?php echo $sf_request->getError($name) ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php elseif ($sf_flash->has('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_flash->get('notice')) ?></h2>
</div>
<?php endif; ?>

<?php echo form_tag('feriado/edit', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<?php echo object_input_hidden_tag($feriado, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <?php echo label_for('feriado[nombre]', __('Nombre:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('feriado{nombre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('feriado{nombre}')): ?>
    <?php echo form_error('feriado{nombre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_tag($feriado, 'getNombre', array (
  'size' => 20,
  'control_name' => 'feriado[nombre]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('feriado[fecha]', __('Fecha:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('feriado{fecha}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('feriado{fecha}')): ?>
    <?php echo form_error('feriado{fecha}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_input_date_tag($feriado, 'getFecha', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/images/sf_admin/date.png',
  'control_name' => 'feriado[fecha]',
  'date_format' => 'dd/MM/yy',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('feriado[repeticion_anual]', __('Anual:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('feriado{repeticion_anual}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('feriado{repeticion_anual}')): ?>
    <?php echo form_error('feriado{repeticion_anual}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_checkbox_tag($feriado, 'getRepeticionAnual', array (
  'control_name' => 'feriado[repeticion_anual]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('feriado[inamovible]', __('Inamovible:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('feriado{inamovible}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('feriado{inamovible}')): ?>
    <?php echo form_error('feriado{inamovible}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_checkbox_tag($feriado, 'getInamovible', array (
  'control_name' => 'feriado[inamovible]',
)) ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('feriado[fk_ciclolectivo_id]', __('Ciclo Lectivo:'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('feriado{fk_ciclolectivo_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('feriado{fk_ciclolectivo_id}')): ?>
    <?php echo form_error('feriado{fk_ciclolectivo_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo object_select_tag($feriado, 'getFkCiclolectivoId', array (
  'related_class' => 'Ciclolectivo',
  'control_name' => 'feriado[fk_ciclolectivo_id]',
)) ?>
    </div>
</div>

</fieldset>

<?php echo include_partial('edit_actions', array('feriado' => $feriado)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($feriado->getId()): ?>
<?php echo button_to(__('delete'), 'feriado/delete?id='.$feriado->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

</div>

<div id="sf_admin_footer">
<?php include_partial('feriado/edit_footer', array('feriado' => $feriado)) ?>
</div>
