<?php use_helper("I18N"); ?>
<div id ="sf_admin_container">
<?php if (count($aDivision) > 0) { ?>
<h1>Horario según Divisiones</h1>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_alumno"> Division</th>
    <th id="sf_admin_list_th_sf_actions">Ver Horario</th>
  </tr>
  </thead>

  <tbody>
<?php
    $i = 0;
    foreach($aDivision as $division){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo $division->getAnio()->getDescripcion()." ".$division->getDescripcion()?></td>
    <td>
    <ul class="sf_admin_td_actions">
    <li><?php echo link_to(image_tag('small/horario.png', array('alt' => __('verHorario'), 'title' => __('verHorario'))), 'calendario/horarioSegunDivision?id='.$division->getId()); ?></li>
    </ul>
    </td>
  </tr>
  <?php } ?>
  </tbody>
</table>

<?php } ?>
</div>
