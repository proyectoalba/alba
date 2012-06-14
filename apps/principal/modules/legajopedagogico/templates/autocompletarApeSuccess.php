<ul>
<?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
  <li><?php echo $row['apellido']?></li>
<?php endwhile; ?>
</ul>