<?php
    use_helper('Misc');
    $meses = Meses();
?>
<div style="text-align: center;"><?php echo image_tag('small/escudo_bsas_chico.jpg')?></div>
<div style="text-align: center;" class="titulo">REP&Uacute;BLICA ARGENTINA<br><br>
<span style="font-weight: bold;" class="titulo">GOBIERNO DE LA CIUDAD DE BUENOS AIRES</span><br style="font-weight: bold;">
<span style="font-weight: bold;" class="titulo">SECRETAR&iacute;A DE EDUCACION</span><br>
<br>
<span class="subtitulo">SOLICITUD DE LEGAJO</span><br>
</div>
<br>
<br>
<div class="texto">
La Direcci&oacute;n de la Escuela <?php echo strtoupper($establecimiento->getNombre())?> D.E. <?php echo $establecimiento->getDistritoescolar()->getNombre()?> solicita <br>
a la Escuela <?php echo $escuela?> el Legajo Escolar del alumno <?php echo $alumno->getApellido()?>, <?php echo $alumno->getNombre()?>  inscripto en  <?php echo $division->getAnio()->getDescripcion()?> <?php echo $division->getDescripcion()?>
<br>
Tenga el presente el carácter de recibo.<br><br>
Buenos Aires, a los <?php echo date("d")?> d&iacute;as del mes de <?php echo $meses[date("n")]?> del a&ntilde;o  <?php echo date("Y")?> <br>
</div>
<br>
<br>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="text-align: center;"></td>
      <td></td>
      <td style="text-align: center;"></td>
    </tr>
    <tr>
      <td></td>
      <td style="text-align: center;">..................................................<br>
Firma autorizada</td>
      <td></td>
    </tr>
  </tbody>
</table>
