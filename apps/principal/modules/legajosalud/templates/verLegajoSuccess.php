<?php use_helper('I18N', 'Date') ?>
<div id="sf_admin_container">
<h1>Legajo de Salud de <?php echo $alumno->getApellido()." ".$alumno->getNombre()?> </h1>

<div class="sf_admin_filters">
</div>

<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_fecha"> Fecha</th>
    <th id="sf_admin_list_th_titulo"> Enfermedad</th>
    <th id="sf_admin_list_th_categoria">Observaci&oacute;n</th>
    <th id="sf_admin_list_th_sf_actions">Acciones</th>
  </tr>
  </thead>

  <tbody>
<?php
    $i = 0;
    foreach($aEntradaLegajo as $entradaLegajo){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo format_date($entradaLegajo->getFecha(), "dd/MM/yy")?></td>
    <td><?php echo $entradaLegajo->getTitulo()?></td>
    <td><?php echo sprintf("%0.100s",stream_get_contents($entradaLegajo->getDescripcion())) ?></td>
    <td>
    <ul class="sf_admin_td_actions">
    <li><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/edit_icon.png', array('alt' => __('verLegajo'), 'title' => __('verLegajo'))), 'legajosalud/edit?aid='.$alumno->getId().'&id='.$entradaLegajo->getId()); ?>
    <li><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/delete_icon.png', array('alt' => __('borrar'), 'title' => __('borrar'))), 'legajosalud/delete?aid='.$alumno->getId().'&id='.$entradaLegajo->getId()); ?>
    </ul>
    </td>
  </tr>
  <?php } ?>
  </tbody>


<tfoot>
  <tr>
    <th colspan="9">
    </th>
  </tr>
</tfoot>  
</table>
      <div class="float-right">
          <ul class="sf_admin_actions">
            <li>
                <?php echo button_to('Nuevo', 'legajosalud/create?aid='.$alumno->getId(),'class=sf_admin_action_create'); ?>
            </li>
            <li>
                <?php echo button_to('Listado Alumnos','alumno/list',"class=sf_admin_action_list")?>
            </li>
            <li>
                <?php echo button_to('Ir a Cuenta','cuenta/verCompleta?id='.$alumno->getFkCuentaId(),"class=sf_admin_action_ir_a") ?>
            </li>
        </ul>
      </div>

</div>

</div>
<?php echo javascript_include_tag('varios/wz_tooltip.js'); ?>
