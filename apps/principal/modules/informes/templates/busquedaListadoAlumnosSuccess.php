<?php use_helper('I18N','Form', 'Object') ?>
<div id ="sf_admin_container">
<h1>Informe: Alumnos por Divis&oacute;n </h1>

<?php if ($sf_request->hasErrors()) {?>
<div class="form-errors">
<h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
<ul>
<?php foreach ($sf_request->getErrorNames() as $name) { ?>
  <li><?php echo $sf_request->getError($name) ?></li>
<?php } ?>
</ul>
</div>
<?php } ?> 

<?php echo form_tag('informes/busquedaListadoAlumnos', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php echo label_for('division', __('Division:')) ?>
        <?php echo select_tag('division_id', options_for_select($optionsDivision, $division_id)) ?>
    </div>
</fieldset>

<?php echo object_input_hidden_tag($informe, 'getId') ?>

<ul class="sf_admin_actions">
  <li><?php echo submit_tag(__('Buscar'), array (
  'name' => 'Mostrar',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>
</form>
</div>