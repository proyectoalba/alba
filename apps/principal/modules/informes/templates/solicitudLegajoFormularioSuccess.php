<div id="sf_admin_container">
<h1>Informe: Solicitud de Legajo para <?php echo $alumno->getApellido().", ".$alumno->getNombre();?></h1>

<?php if ($sf_request->hasErrors()) {?>
<div class="form-errors">
<h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
<ul>
<?php foreach ($sf_request->getErrorNames() as $name) { ?>
  <li><?php echo $sf_request->getError($name) ?></li>
<?php } ?>
</ul>
</div>
<? } ?> 

<?php echo form_tag('informes/solicitudLegajoListado', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>
<legend>Para generar la solicitud de legajo debe completar los siguiente datos</legend>
<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php 
            echo label_for('escuela', __('Escuela de origen:'));
            echo input_tag('escuela');
        ?>
    </div>
</fieldset>

<?php echo input_hidden_tag('alumno_id', $alumno->getId()) ?>
<?php echo input_hidden_tag('division_id', $division_id) ?>

 <ul class="sf_admin_actions">
  <li><?php echo submit_tag(__('Mostrar'), array (
  'name' => 'Mostrar',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>

</form>
</div>
