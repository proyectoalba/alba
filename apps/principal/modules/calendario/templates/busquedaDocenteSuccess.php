<?php use_helper("I18N"); ?>
<div id="sf_admin_container">
<h1>Horarios seg&uacute;n Docentes</h1>
<?php echo form_tag('calendario/busquedaDocente', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>
<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php echo label_for('Buscar', __('Buscar Docentes:')) ?>
        <?php echo input_tag('txt', '') ?>   
    </div>
</fieldset>

 <ul class="sf_admin_actions">
  <li><?php echo submit_tag(__('Buscar'), array (
  'name' => 'Mostrar',
  'class' => 'sf_admin_action_save',
)) ?></li>
</ul>

</form>


<?php if (count($aDocente) > 0) {
    if ($txt) { ?>
    Ustde busco -<?php echo $txt?>-
    <?php } ?>
<h1>Docentes</h1>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_alumno"> Docente</th>
    <th id="sf_admin_list_th_sf_actions">Ver Horario</th>
  </tr>
  </thead>

  <tbody>
<?php
    $i = 0;
    foreach($aDocente as $docente){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo $docente->getApellido()." ".$docente->getNombre(); ?></td>
    <td>
    <ul class="sf_admin_td_actions">
    <li><?php echo link_to(image_tag('small/horario.png', array('alt' => __('verHorario'), 'title' => __('verHorario'))), 'calendario/horarioSegunDocente?id='.$docente->getId()); ?></li>
    </ul>
    </td>
  </tr>
  <?php } ?>
  </tbody>
</table>
</div>
<?php  } else {
    if ($txt) { ?>
        Su busqueda por -<?php echo $txt?>- no ha encontrado docentes
    <?php } 
} 
?>
