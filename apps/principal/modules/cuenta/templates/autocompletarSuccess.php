<ul>
<?php foreach ($aCuenta as $key => $value): ?>
  <li id="<?php echo $key ?>"><?php echo $value->getNombre() ?></li>
<?php endforeach; ?>
</ul>