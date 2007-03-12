<div id="sf_admin_container">

<?php echo form_tag('legajopedagogico/index', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<?php //echo object_input_hidden_tag($calendario, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php echo label_for('Buscar', __('Buscar Alumnos:')) ?>
        <?php echo input_tag('txt', '') ?>   
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

</form>


<? if (count($aAlumno) > 0) {
    if ($txt) { ?>
    Usted busco -<?=$txt?>-
    <? } ?>
<h1>Alumnos</h1>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_alumno"> Alumno</th>
    <th id="sf_admin_list_th_sf_actions">Acciones</th>
  </tr>
  </thead>

  <tbody>
<?
    $i = 0;
    foreach($aAlumno as $alumno){
?>
  <tr class="sf_admin_row_0">
    <td><?echo $alumno->alumno_apellido." ".$alumno->alumno_nombre; ?></td>
    <td>
    <ul class="sf_admin_td_actions">
     <li><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/edit_icon.png', array('alt' => 'editar', 'title' => 'Editar')) , 'alumno?action=edit&id='.$alumno->alumno_id); ?></li>
    &nbsp;
    <li><?php echo link_to(image_tag('small/legajo.png', array('alt' => __('verLegajo'), 'title' => 'Ver el legajo')), 'legajopedagogico?action=verLegajo&aid='.$alumno->alumno_id); ?></li>  
    &nbsp;
    <li><?php echo link_to(image_tag('small/asistencia.png', array('alt' => 'Asistencia', 'title' => 'Asistencia')) , 'asistencia?action=index&vistas=2&alumno_id='.$alumno->alumno_id); ?></li>
  &nbsp;    
    <li><?php echo link_to(image_tag('jeringa.gif', array('alt' => __('Vacunas'), 'title' => __('Vacunas'))), 'alumno?action=vacunas&id='.$alumno->alumno_id); ?></li>
  &nbsp;    
    <li><?php echo link_to(image_tag('next.png', array('alt' => 'Cuenta', 'title' => 'Cuenta')), 'alumno?action=irCuenta&id='.$alumno->alumno_id); ?></li>
    </ul>
    </td>
  </tr>
  <? } ?>
  </tbody>
</table>

<? } else {
    if ($txt) { ?>
        Su b&uacute;squeda por -<?=$txt?>- no ha encontrado alumnos.
    <? } 
} 
?>
</div>