<?php use_helper('I18N','Form','Object'); ?>
<div id="sf_admin_container">
<h1>Informe: <?php echo $informe->getNombre(); ?></h1>
<?php echo form_tag('informes/busquedaDocentes', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

<fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <?php echo label_for('Buscar', __('Buscar Docentes:')) ?>
        <?php echo input_tag('txt', $txt) ?>   
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
<?php if (count($aDocente) > 0) {
    if ($txt) { ?>
    Usted busc&oacute; -<?php echo $txt?>-
    <?php } ?>
<h1>Docentes</h1>
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
    foreach($aDocente as $docente){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo $docente->getApellido()." ".$docente->getNombre(); ?> </td>
    <td>
    <ul class="sf_admin_td_actions">
     <li>
        <?php echo link_to(image_tag('/images/small/report_go.png', array('alt' => 'editar', 'title' => 'Editar')) , 'informes/mostrar?docente_id='.$docente->getId().'&id='.$informe->getId()); ?>
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
