<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
<h1><?php echo __('Editar Horarios Tentativos de %1%', array ('%1%' => $docente->getNombre()." ".$docente->getApellido() ) ) ?></h1>

<div id="sf_admin_content">

<?php if ($sf_request->hasErrors()): ?>
<div class="form-errors">
<h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
<dl>
<?php foreach ($sf_request->getErrorNames() as $name): ?>
  <dt><?php echo __($labels[$name]) ?></dt>
  <dd><?php echo $sf_request->getError($name) ?></dd>
<?php endforeach; ?>
</dl>
</div>
<?php elseif ($sf_user->hasFlash('notice')): ?>
<div class="save-ok">
<h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
</div>
<?php endif; ?>

<?php echo form_tag('docenteHorario/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo input_hidden_tag('docente_horario[fk_docente_id]', $docente->getId()) ?>

<?php include_partial('evento/carga_evento', array('evento' => $evento )) ?>



<ul class="sf_admin_actions">
  <li><?php echo button_to(__('list'), 'docenteHorario/list?idDocente='.$docente->getId(), array (
  'class' => 'sf_admin_action_list',
)) ?></li>
  <li><?php echo submit_tag(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
  <li><?php echo submit_tag(__('save and add'), array (
  'name' => 'save_and_add',
  'class' => 'sf_admin_action_save_and_add',
)) ?></li>
</ul>

</div>
</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($docenteHorario->getFkDocenteId()&&$docenteHorario->getFkEventoId()): ?>
<?php echo button_to(__('delete'), 'docenteHorario/delete?docente_id='.$docenteHorario->getFkDocenteId()."&evento_id=".$docenteHorario->getFkEventoId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

</div>