<div id="content">
<h1>Composici&oacute;n de la Cuenta: <?php echo $cuenta->getNombre()?></h1>
<div id="sf_admin_container">
<div id="sf_admin_content">
<table align="center" class="sf_admin_list">
    <tr>
        <td>Nombre:</td>
        <td style="font-size: 15px;font-weight: bold"><?echo $cuenta->getNombre();?></td>
        <td>Direcci&oacute;n:</td>
        <td style="font-size: 15px;font-weight: bold"><?echo $cuenta->getDireccion();?></td>
    </tr>
    <tr>    
        <td>Raz&oacute;n Social:</td>
        <td style="font-size: 15px;font-weight: bold"><?echo $cuenta->getRazonSocial();?></td>
        <td>Ciudad:</td>
        <td style="font-size: 15px;font-weight: bold"><?echo $cuenta->getCiudad();?></td>
    </tr>
    <tr>    
        <td>CUIT:</td>
        <td style="font-size: 15px;font-weight: bold"><?echo $cuenta->getCuit();?></td>
        <td>CP:</td>
        <td style="font-size: 15px;font-weight: bold"><?echo $cuenta->getCodigoPostal();?></td>        
    </tr>
    <tr>    
        <td>Tipo IVA:</td>
        <td style="font-size: 15px;font-weight: bold"><?echo $cuenta->getTipoIva();?></td>
        <td>Tel&eacute;fono:</td>
        <td style="font-size: 15px;font-weight: bold"><?echo $cuenta->getTelefono();?></td>
    </tr>
</table>    
</div>
<br>
<div id="sf_admin_content">
<h1>Alumnos</h1>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_apellido">
      Apellido</th>
    <th id="sf_admin_list_th_nombre">
      Nombre</th>
    <th id="sf_admin_list_th_nro_documentot">
      Nro. Documento</th>
    <th id="sf_admin_list_th_Sexo">
      Sexo</th>
    <th id="sf_admin_list_th_Telefono">
      Tel&eacute;fono</th>
    <th>Acciones</th>  
  </tr>
  </thead>
  <tbody>
<?
  foreach($aAlumno as $alumno){
?>
  <tr class="sf_admin_row_0">
    <td><?echo $alumno->getApellido();?></td>
    <td><?echo $alumno->getNombre();?></td>
    <td><?echo $alumno->getNroDocumento();?></td>
    <td><?echo $alumno->getSexo();?></td>
    <td><?echo $alumno->getTelefono();?></td>
    <td>
      <ul class="sf_admin_td_actions">
        <li>
            <?php echo link_to(image_tag('../sf/images/sf_admin/edit_icon'), 'alumno/edit?id='. $alumno->getID()) ?>            
        </li>  
        <li>
            <?php echo link_to(image_tag('../sf/images/sf_admin/delete_icon'), 'alumno/delete?id='. $alumno->getID()) ?>            
        </li>
        <li>
            <?php echo link_to(image_tag('jeringa.gif',array("title"=>"Vacunas")), 'alumno/Vacunas?id='. $alumno->getID()) ?>
        </li>
         <li>
            <?php echo link_to(image_tag('small/asistencia.png',array("title"=>"Asistencias")), 'alumno/Asistencia?id='. $alumno->getID()) ?>
        </li>
         <li>
            <?php echo link_to(image_tag('small/legajo.png',array("title"=>"Legajos")), 'alumno/Legajo?id='. $alumno->getID()) ?>
        </li>
        <li>
                <?php echo link_to(image_tag('small/boletin.png',array("title"=>"Boletin")), 'boletin/mostrar?alumno_id='. $alumno->getID()) ?>
        </li>        
      </ul>
    </td>
  </tr>
  <?}?>
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
  <li>
    <?php echo button_to(__('create'), 'alumno/create?fk_cuenta_id=' . $cuenta->getId(), array ('class' => 'sf_admin_action_create', )) ?>
  </li>
</ul>
<br>
<h1>Responsables</h1>  
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_apellido">
      Apellido</th>
    <th id="sf_admin_list_th_nombre">
      Nombre</th>
    <th id="sf_admin_list_th_nro_documentot">
      Nro. Documento</th>
    <th id="sf_admin_list_th_Direccion">
      Direcci&oacute;n</th>
    <th id="sf_admin_list_th_Ciudad">
      Ciudad</th>
    <th id="sf_admin_list_th_Relacion">
      Relaci&oacute;n</th>      
    <th id="sf_admin_list_th_Retiro">
      Aut. Retiro</th>
    <th id="sf_admin_list_th_Telefono">
      Tel&eacute;fono</th>
    <th >Acciones</th>  
  </tr>
  </thead>
  <tbody>
<?
  foreach($aResponsable as $responsable){
?>
  <tr class="sf_admin_row_0">
    <td><?echo $responsable->getApellido();?></td>
    <td><?echo $responsable->getNombre();?></td>
    <td><?echo $responsable->getNroDocumento();?></td>
    <td><?echo $responsable->getDireccion();?></td>
    <td><?echo $responsable->getCiudad();?></td>
    <td><?echo $responsable->getRelacion();?></td>
    <td><?echo $responsable->getAutorizacionRetiro() == 1 ? "Si" : "No";?></td>
    <td><?echo $responsable->getTelefono();?></td>
    <td>
      <ul class="sf_admin_td_actions">
        <li>
            <?php echo link_to(image_tag('../sf/images/sf_admin/edit_icon'), 'responsable/edit?id='. $responsable->getID()) ?>
        </li>  
        <li>
            <?php echo link_to(image_tag('../sf/images/sf_admin/delete_icon'), 'responsable/delete?id='. $responsable->getID()) ?>
        </li>
      </ul>
    </td>
  </tr>
  <?}?>
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
  <li>
    <?php echo button_to(__('create'), 'responsable/create?fk_cuenta_id=' . $cuenta->getId(), array ('class' => 'sf_admin_action_create', )) ?>
  </li>
</ul>
</div>
</div>