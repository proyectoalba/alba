<?php $i = 0; ?>
<?php foreach($checks as $alumno_id => $division_id): ?>
  <?php $h = ++$i%2; ?>
  <?php include_component('boletin','mostrar', array( 'alumno_id' => $alumno_id, 'division_id' => $division_id)); ?>
  <hr style="border: 1px dotted #dddddd"/>
  <?php if($h == 0): ?>
    <p style="page-break-after: always;"/>
  <?php endif;?>
<?php endforeach;?>
