<?php
    use_helper("I18N");
?>
<div id="content">
<h1>Composici&oacute;n de la Cuenta: <?php echo $cuenta->getNombre()?></h1>
<div id="sf_admin_container">
<div id="sf_admin_content">
<table align="center" class="sf_admin_list">
    <tr>
        <td>Nombre:</td>
        <td style="font-size: 15px;font-weight: bold"><?php echo $cuenta->getNombre();?></td>
        <td>Direcci&oacute;n:</td>
        <td style="font-size: 15px;font-weight: bold"><?php echo $cuenta->getDireccion();?></td>
    </tr>
    <tr>    
        <td>Raz&oacute;n Social:</td>
        <td style="font-size: 15px;font-weight: bold"><?php echo $cuenta->getRazonSocial();?></td>
        <td>Ciudad:</td>
        <td style="font-size: 15px;font-weight: bold"><?php echo $cuenta->getCiudad();?></td>
    </tr>
    <tr>    
        <td>CUIT:</td>
        <td style="font-size: 15px;font-weight: bold"><?php echo $cuenta->getCuit();?></td>
        <td>CP:</td>
        <td style="font-size: 15px;font-weight: bold"><?php echo $cuenta->getCodigoPostal();?></td>        
    </tr>
    <tr>    
        <td>Tipo IVA:</td>
        <td style="font-size: 15px;font-weight: bold"><?php echo $cuenta->getTipoIva();?></td>
        <td>Tel&eacute;fono:</td>
        <td style="font-size: 15px;font-weight: bold"><?php echo $cuenta->getTelefono();?></td>
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
      Apellidos</th>
    <th id="sf_admin_list_th_nombre">
      Nombres</th>
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
<?php
  foreach($aAlumno as $alumno){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo $alumno->getApellidos();?></td>
    <td><?php echo $alumno->getNombre();?></td>
    <td><?php echo $alumno->getNroDocumento();?></td>
    <td><?php echo $alumno->getSexo();?></td>
    <td><?php echo $alumno->getTelefono();?></td>
    <td>
      <ul class="sf_admin_td_actions">
        <li>
            <?php echo link_to(image_tag('../sf/sf_admin/images/edit_icon'), 'alumno/edit?id='. $alumno->getID()) ?>            
        </li>  
        <li>
            <?php echo link_to(image_tag('../sf/sf_admin/images/delete_icon'), 'alumno/delete?id='. $alumno->getID()) ?>            
        </li>
        <li>
            <?php echo link_to(image_tag('jeringa.gif',array("title"=>"Vacunas")), 'alumno/Vacunas?id='. $alumno->getID()) ?>
        </li>
        <li>
            <?php echo link_to(image_tag('small/legajosalud.png',array("title"=>"Salud")), 'alumno/Legajosalud?id='. $alumno->getID()) ?>
        </li>
         <li>
            <?php echo link_to(image_tag('small/asistencia.png',array("title"=>"Asistencias")), 'alumno/Asistencia?id='. $alumno->getID()) ?>
        </li>
         <li>
            <?php echo link_to(image_tag('small/legajo.png',array("title"=>"Legajos")), 'alumno/Legajo?id='. $alumno->getID()) ?>
        </li>
        <li>
                <?php echo link_to(image_tag('small/boletin.png',array("title"=>"Boletin")), 'boletin/mostrar?alumno_id='. $alumno->getID(),'target=_blank') ?>
        </li>        
      </ul>
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
      Apellidos</th>
    <th id="sf_admin_list_th_nombre">
      Nombres</th>
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
<?php
  foreach($aResponsable as $responsable){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo $responsable->getApellidos();?></td>
    <td><?php echo $responsable->getNombre();?></td>
    <td><?php echo $responsable->getNroDocumento();?></td>
    <td><?php echo $responsable->getDireccion();?></td>
    <td><?php echo $responsable->getCiudad();?></td>
    <td><?php echo $responsable->getRolResponsable();?></td>
    <td><?php echo $responsable->getAutorizacionRetiro() == 1 ? "Si" : "No";?></td>
    <td><?php echo $responsable->getTelefono();?></td>
    <td>
      <ul class="sf_admin_td_actions">
        <li>
            <?php echo link_to(image_tag('../sf/sf_admin/images/edit_icon'), 'responsable/edit?id='. $responsable->getID()) ?>
        </li>  
        <li>
            <?php echo link_to(image_tag('../sf/sf_admin/images/delete_icon'), 'responsable/delete?id='. $responsable->getID()) ?>
        </li>
      </ul>
    </td>
  </tr>
  <?php }?>
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
