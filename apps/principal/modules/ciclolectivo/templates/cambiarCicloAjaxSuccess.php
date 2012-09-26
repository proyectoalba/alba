<?php use_helper("Object", "Javascript"); ?>
  <?php echo label_for('pasaje[fk_division_destino_id]', __('Division destino:'), 'class="required" ') ?>
  <?php echo select_tag('pasaje[fk_division_destino_id]', options_for_select($optionsDivisiones)); ?>
  <?php
  echo observe_field('pasaje_fk_division_destino_id', array(
      'update' => 'alumnos',
      'url' => 'ciclolectivo/listarAlumnos',
      'with' => "'division_id=' + $('pasaje_fk_division_id').value +'&division_no_id=' + value",
      'script' => "true",
      'before'=> "$('indicator-wrapper').style.display='block'",
      'complete'=> "$('indicator-wrapper').style.display='none'",
  ));
  ?>
