<?php use_helper('I18N'); ?>
<?php use_helper('DateForm') ?>
<div id ="sf_admin_container">
<h1>Informe: Certificado de Estudios para <?php echo $alumno->getApellido().", ".$alumno->getNombre();?></h1>
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
<?php echo form_tag('informes/certificadoEstudiosListado', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>
<legend>Para generar el certificado de Estudios debe completar los siguiente datos</legend>
<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php 
            echo label_for('anio', __('A&ntilde;o de Finalizaci&oacute;n:'));
            echo select_year_tag('anio', '', 'include_custom=Elija un a&ntilde;o year_end='.$anio_hasta.' year_start=2005');
        ?>
    </div>
    <div class="form-row">
        <?php echo label_for('estudios', __('A&ntilde;o de estudios:')) ?>
        <?php echo select_tag('grado', options_for_select($aAnio),0);?>
    </div>
</fieldset>
<?php echo input_hidden_tag('alumno_id', $alumno->getId()) ?>
 <ul class="sf_admin_actions">
  <li><?php echo submit_tag(__('Mostrar'), array (
  'name' => 'Mostrar',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>
</form>
</div>