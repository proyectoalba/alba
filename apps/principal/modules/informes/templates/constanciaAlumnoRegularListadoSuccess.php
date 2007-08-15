
<div style="text-align: center;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody>
    <tr>
      <td><?php echo image_tag('small/escudo_bsas_chico.jpg')?></td>
      <td>
      <div style="text-align: left;"></div>
      <div style="text-align: center;"><span class="titulo">GOBIERNO DE LA CIUDAD DE BUENOS AIRES</span><br>
      <span class="titulo">SECRETAR&Iacute;A DE EDUCACI&Oacute;N</span><br>
      <br>
      </div>
      <div style="text-align: center;" class="subtitulo"><?php echo strtoupper($establecimiento->getNombre())?> <br> 
        <?php if($locacion) { ?><?php echo $locacion->getDireccion()?> - T&eacute;lefono: <?php echo $locacion->getTelefono()?> (<?php echo $locacion->getCodigoPostal()?>) <?php echo $locacion->getCiudad()?><br><?php } ?>
      <br>
      </div>
      <div style="text-align: center;"><span class="titulo">CONSTANCIA DE ALUMNO REGULAR<br>
      </div>
      <span style="font-weight: bold;"></span></td>
    </tr>
      <tr>
      <td colspan="2" rowspan="1">
        <div style="text-align: left;" class="texto">
        <br><br>Por medio de la presente se deja constancia que <?php echo $alumno->getApellido()?>, <?php echo $alumno->getNombre()?> es un alumno regular de:<br>
        A&ntilde;o: <span style="font-weight: bold;"><?php echo $division->getAnio()->getDescripcion()?></span>, Divisi&oacute;n: <span style="font-weight: bold;"><?php echo $division->getDescripcion()?></span> , Turno: <span style="font-weight: bold;"><?php echo $turnos->getDescripcion();?></span>, en este establecimiento<br> Se emite este certificado para presentar ante quien corresponda.
      <br>
      <br>
        <span style="font-weight: bold;">Lugar y Fecha:</span> Ciudad Aut&oacute;noma de Buenos Aires, <?php echo date("d/m/Y");?>      
        </div>
    </td>
    
   </tr>
    <tr>
      <td colspan="2" rowspan="1"><br>
      <br><br><br>
        <div style="text-align: right" class="texto" >Firma del Responsable del Establecimiento</div>
      </td>
    </tr>
</tbody>
</table>
</div>