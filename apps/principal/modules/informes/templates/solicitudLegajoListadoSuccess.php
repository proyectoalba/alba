<?
    use_helper('Misc');
    $meses = Meses();
?>
<div style="text-align: center;"><?=image_tag('small/escudo_bsas_chico.jpg')?></div>
<div style="text-align: center;" class="titulo">REP&Uacute;BLICA ARGENTINA<br><br>
<span style="font-weight: bold;" class="titulo">GOBIERNO DE LA CIUDAD DE BUENOS AIRES</span><br style="font-weight: bold;">
<span style="font-weight: bold;" class="titulo">SECRETAR&iacute;A DE EDUCACION</span><br>
<br>
<span class="subtitulo">SOLICITUD DE LEGAJO</span><br>
</div>
<br>
<br>

<div class="texto">
La Direcci&oacute;n de la Escuela <?=strtoupper($establecimiento->getNombre())?> D.E. <?=$establecimiento->getDistritoescolar()->getNombre()?> solicita <br>
a la Escuela <?=$escuela?> el Legajo Escolar del alumno <?=$alumno->getApellido()?>, <?=$alumno->getNombre()?>  inscripto en  <?=$division->getAnio()->getDescripcion()?> <?=$division->getDescripcion()?>
<br>
Tenga el presente el carácter de recibo.<br><br>
Buenos Aires, a los <?=date("d")?> d&iacute;as del mes de <?=$meses[date("n")]?> del a&ntilde;o  <?=date("Y")?> <br>
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
