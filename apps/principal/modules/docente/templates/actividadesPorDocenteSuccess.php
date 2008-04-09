<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<div id="sf_admin_container">
<?php echo object_input_hidden_tag($docente, 'getId') ?>

<h2><?php echo __('Actividades/Materias por Docente') ?></h2>
<div class="form-row">
Apellidos y Nombres:  
<?php echo object_input_tag($docente, 'getApellidos', array (
  'size' => 32,
  'control_name' => 'docente[apellido]',
  'readonly' => 'true' ));
  
  echo object_input_tag($docente, 'getNombre', array (
  'size' => 32,
  'control_name' => 'docente[nombre]',
  'readonly' => 'true'));
?>
</div>
<div id="sf_admin_content">
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_materia">Actividades/Materias</th>
  </tr>
  </thead>
  <tbody>
<?php
  foreach($actividades as $actividad){
?>
  <tr class="sf_admin_row_0">
    <td>

   <?php echo $actividad->getRelAnioActividad()->getActividad()->getNombre()." de  ".$actividad->getRelAnioActividad()->getAnio()->getDescripcion()." ".(($actividad->getRelAnioActividad()->getOrientacion())?" de ".$actividad->getRelAnioActividad()->getOrientacion()->getNombre():"");?>
    </td>
  </tr>
  <?php } ?>
  </tbody>
<tfoot>
  <tr>
    <th colspan="9">
      <div class="float-right">
      </div>
    </th>
  </tr>
</tfoot>  
</table>
<ul class="sf_admin_actions">
  <li><?php echo button_to(__('list'), 'docente/list?id='.$docente->getId(), array (
    'class' => 'sf_admin_action_list',
    )) ?></li>
</ul>
</div>
