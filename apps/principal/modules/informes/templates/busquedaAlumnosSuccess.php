<?php use_helper('I18N','Form','Object'); ?>
<div id="sf_admin_container">
<h1>Informe: <?php echo $informe->getNombre(); ?></h1>
<?php echo form_tag('informes/busquedaAlumnos', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php echo label_for('Buscar', __('Buscar Alumnos:')) ?>
        <?php echo input_tag('txt', $txt) ?>   
    </div>

    <div class="form-row">
        <?php echo label_for('division', __('Division:')) ?>
        <?php echo select_tag('division_id', options_for_select($optionsDivision, $division_id)) ?>
    </div>
</fieldset>
 <ul class="sf_admin_actions">
  <li><?php echo submit_tag(__('Buscar'), array (
  'name' => 'Mostrar',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>
<?php echo object_input_hidden_tag($informe, 'getId') ?>
</form>
<?php if (count($aAlumno) > 0) {
    if ($txt) { ?>
    Usted busc&oacute; -<?php echo $txt?>-
    <?php } ?>
<h1>Alumnos</h1>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_alumno"> Alumno</th>
    <th id="sf_admin_list_th_sf_actions">Ver Informe</th>
  </tr>
  </thead>

  <tbody>
<?php
    $i = 0;
    foreach($aAlumno as $alumno){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo $alumno->alumno_apellido." ".$alumno->alumno_nombre; ?> ( <?php echo $alumno->anio_descripcion?> - <?php echo $alumno->division_nombre?> ) </td>
    <td>
    <ul class="sf_admin_td_actions">
     <li>
        <?php echo link_to(image_tag('/images/small/report_go.png', array('alt' => 'editar', 'title' => 'Editar')) , 'informes/mostrar?alumno_id='.$alumno->alumno_id.'&id='.$informe->getId()); ?>
    </li>
    </ul>
    </td>
  </tr>
  <?php } ?>
  </tbody>
</table>

<?php } else {
    if ($txt) { ?>
        Su b&uacute;squeda por -<?php echo $txt?>- no ha encontrado alumnos.
    <?php } 
} 
?>
</div>
