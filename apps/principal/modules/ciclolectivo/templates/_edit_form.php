<?php echo form_tag('ciclolectivo/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($ciclolectivo, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('ciclolectivo[descripcion]', __($labels['ciclolectivo{descripcion}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ciclolectivo{descripcion}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciclolectivo{descripcion}')): ?>
    <?php echo form_error('ciclolectivo{descripcion}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($ciclolectivo, 'getDescripcion', array (
  'size' => 64,
  'control_name' => 'ciclolectivo[descripcion]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ciclolectivo[fecha_inicio]', __($labels['ciclolectivo{fecha_inicio}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ciclolectivo{fecha_inicio}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciclolectivo{fecha_inicio}')): ?>
    <?php echo form_error('ciclolectivo{fecha_inicio}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ciclolectivo, 'getFechaInicio', array (
  'rich' => true,
  'withtime' => false,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ciclolectivo[fecha_inicio]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ciclolectivo[fecha_fin]', __($labels['ciclolectivo{fecha_fin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ciclolectivo{fecha_fin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciclolectivo{fecha_fin}')): ?>
    <?php echo form_error('ciclolectivo{fecha_fin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($ciclolectivo, 'getFechaFin', array (
  'rich' => true,
  'withtime' => false,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'ciclolectivo[fecha_fin]',
  'date_format' => 'dd/MM/yy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('ciclolectivo[actual]', __($labels['ciclolectivo{actual}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('ciclolectivo{actual}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciclolectivo{actual}')): ?>
    <?php echo form_error('ciclolectivo{actual}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($ciclolectivo, 'getActual', array (
  'control_name' => 'ciclolectivo[actual]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<?php if($sf_request->getParameter('action') == 'create' || $ciclolectivo->getId() == 0):?>
 <?php if ($sf_user->getAttribute('fk_ciclolectivo_id') != 0): ?>
    <div class="form-row">
        <?php echo label_for('importarciclo', 'Importar divisiones', 'class="required" ') ?>
        <?php include_partial('importarciclo')?>
    </div>
    <?php endif;?>
<?php endif;?>
</fieldset>

<?php include_partial('edit_actions', array('ciclolectivo' => $ciclolectivo)) ?>
</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($ciclolectivo->getId()): ?>
<?php echo button_to(__('delete'), 'ciclolectivo/delete?id='.$ciclolectivo->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
