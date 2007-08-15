<h1>Alumnos de la Divisi&oacute;n <?php echo $division->getAnio()->getDescripcion()." ".$division->getDescripcion()?> </h1>

<?php if(count($aAlumno)>0) { ?>

<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_apellido">Apellido</th>
    <th id="sf_admin_list_th_nombre">Nombre</th>
    <th id="sf_admin_list_th_nro_documentot">Nro. Documento</th>
    <th id="sf_admin_list_th_Sexo">Sexo</th>
    <th id="sf_admin_list_th_provincia">Direcci&oacute;n</th>
    <th id="sf_admin_list_th_ciudad">Ciudad</th>
    <th id="sf_admin_list_th_provincia">Provincia</th>
    <th id="sf_admin_list_th_Telefono">Tel&eacute;fono</th>
  </tr>
  </thead>

  <tbody>
<?php
  foreach($aAlumno as $alumno) {
?>
  <tr class="sf_admin_row_0">
    <td><?php echo $alumno->getApellido();?></td>
    <td><?php echo $alumno->getNombre();?></td>
    <td><?php echo ($alumno->getTipoDocumento())?$alumno->getTipoDocumento()->getNombre():"";?> <?php echo $alumno->getNroDocumento();?></td>
    <td><?php echo $alumno->getSexo();?></td>
    <td><?php echo $alumno->getDireccion();?></td>
    <td><?php echo $alumno->getCiudad();?></td>
    <td><?php echo ($alumno->getProvincia())?$alumno->getProvincia()->getNombreLargo():"";?></td>
    <td><?php echo $alumno->getTelefono();?></td>

  </tr>
  <?php }?>
  </tbody>
</table>

<?php } else {  ?>
No hay Alumnos en esa divisi&oacute;n
<?php } ?>