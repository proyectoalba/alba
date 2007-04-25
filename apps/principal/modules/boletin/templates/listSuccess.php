<?php use_helper("I18N")?>

<script>
     function linkTo(flag) {
        
        var objd = document.getElementById('division_id');
        var objp = document.getElementById('periodo_id');
        var url  = "<?php echo url_for('boletin/', false);?>/list/division_id/"+objd.options[objd.selectedIndex].value;
        if(flag == 1) {
            url = url + "/periodo_id/"+objp.options[objp.selectedIndex].value;
        }
        
        <? if($division_id) {?>
        var obja = document.getElementById('actividad_id');
        url = url + "/actividad_id/"+obja.options[obja.selectedIndex].value;
        <? } ?>
        location.href = url;
     }
</script>

<div id="sf_admin_container">
<h1>Notas del Bolet&iacute;n</h1>

<?php echo form_tag('boletin/grabarNotas', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php echo label_for('division', __('Divisi&oacute;n:')) ?>
        <?php echo select_tag('division_id', options_for_select($optionsDivision, $division_id), "onChange='linkTo(0)'") ?>
    </div>

<? if($division_id) { ?>
    <div class="form-row">
        <?php echo label_for('actividad', __('Actividad:')) ?>
        <?php echo select_tag('actividad_id', options_for_select($optionsActividad, $actividad_id),"onChange='linkTo(1)'") ?>
    </div>


    <div class="form-row">
        <?php echo label_for('perido', __('Periodo:')) ?>
        <?php echo select_tag('periodo_id', options_for_select($optionsPeriodo, $periodo_id), "onChange='linkTo(1)'") ?>
    </div>

<? } ?>



<? if (count($aAlumno) > 0) { ?>
<h1>Alumnos</h1>

Posibles Notas para calificar: 
<? foreach ($aPosiblesNotas as $posiblesnotas) { ?>
<?=$posiblesnotas->getNombre()."&nbsp;";?>
<? } ?>

<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_alumno"> Alumno</th>

    <? foreach ($aPeriodo as $periodo) {?>
    <th id="sf_admin_list_th_sf_actions"><?=$periodo->getDescripcion()?></th>
    <? } ?>


  </tr>
  </thead>

  <tbody>
<? foreach($aAlumno as $alumno){ ?>
  <tr class="sf_admin_row_0">
    <td><?echo $alumno->getApellido()." ".$alumno->getNombre(); ?></td>
    <? foreach ($aPeriodo as $periodo) {?>    
    <td>
    <? echo input_tag("nota[".$alumno->getId()."][".$periodo->getId()."][".""."]", $aNotaAlumno[$alumno->getId()][$periodo->getId()],array('size' => $sizeNota, 'maxlength' => $sizeNota));?>   
    </td>
    <? } ?>
  </tr>
  <? } ?>
  </tbody>
</table>

<? } 
if($division_id AND $actividad_id AND count($aAlumno)>0) { ?>

 <ul class="sf_admin_actions">
  <li><?php echo submit_tag(__('Grabar'), array (
  'name' => 'grabar',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>
<? } ?>
</fieldset>
</form>
</div>