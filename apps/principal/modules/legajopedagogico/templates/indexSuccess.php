<?php use_helper("I18N","Javascript")?>
<div id="sf_admin_container">
<h1>Buscar Alumnos</h1>
<?php echo form_tag('legajopedagogico/index', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<?php //echo object_input_hidden_tag($calendario, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php echo label_for('Buscar', __('Por apellido:')) ?>
 <?php
echo input_auto_complete_tag('txt_apellido', '',
'legajopedagogico/autocompletarApe',
array('autocomplete' => 'off'),
array('use_style' => true)
)
?>
    </div>

    <div class="form-row">
        <?php echo label_for('Buscar', __('Por nombre:')) ?>
 <?php
echo input_auto_complete_tag('txt_nombre', '',
'legajopedagogico/autocompletarNom',
array('autocomplete' => 'off'),
array('use_style' => true)
)
?>
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


<?php if (count($aAlumno) > 0) {
        if ($txt_apellido OR $txt_nombre) { ?>
    Usted busc&oacute; -<?php echo (($txt_apellido)?$txt_apellido:"")." ".(($txt_nombre)?$txt_nombre:"") ?>-
    <?php } ?>
<h1>Alumnos</h1>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_alumno"> Alumno</th>
    <th id="sf_admin_list_th_sf_actions">Acciones</th>
  </tr>
  </thead>

  <tbody>
<?php
    $i = 0;
    foreach($aAlumno as $alumno){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo $alumno->getApellido()." ".$alumno->getNombre(); ?></td>
    <td>
    <ul class="sf_admin_td_actions">
     <li><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/edit_icon.png', array('alt' => 'editar', 'title' => 'Editar')) , 'alumno/edit?id='.$alumno->getId()); ?></li>
    &nbsp;
    <li><?php echo link_to(image_tag('small/legajo.png', array('alt' => __('verLegajo'), 'title' => 'Ver el legajo')), 'legajopedagogico/verLegajo?aid='.$alumno->getId()); ?></li>  
    &nbsp;
    <li><?php echo link_to(image_tag('small/asistencia.png', array('alt' => 'Asistencia', 'title' => 'Asistencia')) , 'asistencia/index?vistas=2&alumno_id='.$alumno->getId()); ?></li>
  &nbsp;    
    <li><?php echo link_to(image_tag('jeringa.gif', array('alt' => __('Vacunas'), 'title' => __('Vacunas'))), 'alumno/vacunas?id='.$alumno->getId()); ?></li>
  &nbsp;    
    <li><?php echo link_to(image_tag('small/legajosalud.png', array('alt' => __('Legajo de Salud'), 'title' => __('Legajo de Salud'))), 'alumno/legajosalud?id='.$alumno->getId()); ?></li>
  &nbsp;    
    <li><?php echo link_to(image_tag('small/boletin.png',array("title"=>"Ver Bolet&iacute;n")), 'boletin/mostrar?alumno_id='. $alumno->getId(),'target=_blank') ?></li>        
    <li><?php echo link_to(image_tag('next.png', array('alt' => 'Cuenta', 'title' => 'Cuenta')), 'alumno/irCuenta?id='.$alumno->getFkCuentaId()); ?></li>
    </ul>
    </td>
  </tr>
  <?php } ?>
  </tbody>
</table>

<?php } else {
    if ($txt_apellido OR $txt_nombre) { ?>
        Su b&uacute;squeda por -<?php echo (($txt_apellido)?$txt_apellido:"")." ".(($txt_nombre)?$txt_nombre:"") ?>- no ha encontrado alumnos.
    <?php } 
} 
?>
</div>
