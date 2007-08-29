<ul>
<?php foreach ($aAlumno as $key => $value): ?>
  <li id="<?php echo $key ?>"><?php echo $value->getApellido() ?></li>
<?php endforeach; ?>
</ul>