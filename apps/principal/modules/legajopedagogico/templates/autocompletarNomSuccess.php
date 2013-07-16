<ul>
<?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
  <li><?php echo $row['nombre']?></li>
<?php endwhile; ?>
</ul>
