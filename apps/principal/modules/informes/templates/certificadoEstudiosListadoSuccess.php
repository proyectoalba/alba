<?php
    use_helper('Misc');
    $meses = Meses();
?>
<div style="text-align: center;"><?=image_tag('small/escudo_bsas_chico.jpg')?></div>
<div style="text-align: center;" class="titulo">REP&Uacute;BLICA ARGENTINA<br><br>
<span style="font-weight: bold;" class="titulo">GOBIERNO DE LA CIUDAD DE BUENOS AIRES</span><br style="font-weight: bold;">
<span style="font-weight: bold;" class="titulo">SECRETAR&iacute;A DE EDUCACION</span><br>
<br>
<span class="subtitulo">CERTIFICADO DE ESTUDIOS</span><br>
</div>
<br>
<br>
<div class="texto">
Certifico que <?=$alumno->getApellido()?>, <?=$alumno->getNombre()?>  quien acredita identidad con <?=$alumno->getTipoDocumento()->getDescripcion()?> <br> N&deg; <?=$alumno->getNroDocumento()?> nacido  <?=($alumno->getLugarNacimiento())?" en ".$alumno->getLugarNacimiento():"";?> el <?=date("d",strtotime($alumno->getFechaNacimiento()))?> de <?=$meses[date("n",strtotime($alumno->getFechaNacimiento()))]?> de  <?=date("Y",strtotime($alumno->getFechaNacimiento()))?> aprob&oacute;  <?=$grado?>, como alumno <br> 
regular en escuela <?=strtoupper($establecimiento->getNombre())?> D.E. <?=$establecimiento->getDistritoescolar()->getNombre()?> en el a&ntilde;o <?=$anio?><br>
<br>
Se extiende el presente <span style="font-weight: bold;">CERTIFICADO DE ESTUDIOS</span>, <br>
en Buenos Aires, a los <?=date("d")?> d&iacute;as del mes de <?=$meses[date("n")]?> del a&ntilde;o  <?=date("Y")?> <br>
</div>

<br>
<br>
<br>
<table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="text-align: center;">..................................................<br>
Firma del Maestro de Grado</td>
      <td></td>
      <td style="text-align: center;">..................................................<br>
Firma del Director de la Escuela</td>
    </tr>
    <tr>
      <td></td>
      <td style="text-align: center;">..................................................<br>
Firma del Supervisor</td>
      <td></td>
    </tr>
  </tbody>
</table>
