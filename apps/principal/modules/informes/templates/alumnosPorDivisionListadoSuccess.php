<h1>Alumnos de  la Divis&oacute;n <?php echo $division->getAnio()->getDescripcion()." ".$division->getDescripcion()?> </h1>

<? if(count($aAlumno)>0) { ?>

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
<?
  foreach($aAlumno as $alumno) {
?>
  <tr class="sf_admin_row_0">
    <td><?=$alumno->getApellido();?></td>
    <td><?=$alumno->getNombre();?></td>
    <td><?=($alumno->getTipoDocumento())?$alumno->getTipoDocumento()->getNombre():"";?> <?echo $alumno->getNroDocumento();?></td>
    <td><?=$alumno->getSexo();?></td>
    <td><?=$alumno->getDireccion();?></td>
    <td><?=$alumno->getCiudad();?></td>
    <td><?=($alumno->getProvincia())?$alumno->getProvincia()->getNombreLargo():"";?></td>
    <td><?=$alumno->getTelefono();?></td>

  </tr>
  <?}?>
  </tbody>
</table>

<? } else {  ?>
No hay Alumnos en esa divisi&oacute;n
<? } ?>