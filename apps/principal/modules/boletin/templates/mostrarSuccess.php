<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Boletine</title>
</head>
<style>
.etiquetas
{
  color: #000;
  font-family: "Trebuchet MS", Arial, Verdana, sans-serif;
  font-size: 12px;
  font-weight: bold;
  text-align: center;
}
</style>
<body>

<?php if ($sf_user->hasFlash('notice')) { ?>
    <div class="save-ok">
        <h2><?php echo $sf_user->getFlash('notice')?></h2>
    </div>
<?php } else { ?>

<!--
<div style="text-align: center;"><?php echo image_tag('small/escudo_bsas_chico.jpg')?></div>
<div style="text-align: center;" class="titulo">
<span style="font-weight: bold;" class="titulo">GOBIERNO DE LA CIUDAD DE BUENOS AIRES</span><br style="font-weight: bold;">
<span style="font-weight: bold;" class="titulo">SECRETAR&iacute;A DE EDUCACION</span><br>
<br>
<span class="subtitulo">Educaci&oacute;n General B&aacute;sica<br>Documento de evaluaci&oacute;n</span><br>
</div>

-->

<div align="center">
<?php echo $establecimiento->getNombre()?><br>
<?php echo $establecimiento->getDireccion()?> 
<?php echo $establecimiento->getCiudad()?> 
<?php echo $establecimiento->getCodigoPostal()?> 
<?php echo $establecimiento->getTelefono()?> 
</div>


<br>
<div align="center">
BOLET&Iacute;N  Ciclo Lectivo <br><br>
<b>Alumno: <?php echo $alumno->getNombre()." ".$alumno->getApellido()?></b>
<b>Curso:&nbsp;<?php echo ($division->getAnio())?$division->getAnio()->getDescripcion():""?> <?php echo $division->getDescripcion()?> </b>
<!-- TURNO:&nbsp;<b><?php echo ($division->getTurno())?$division->getTurno()->getDescripcion():""?></b><br> -->
<br><br>
<table style="text-align: left; width: 766px; height: 143px; border-collapse: collapse; border: solid;" border="1" cellpadding="2" cellspacing="2">
  <tbody>
<!--
    <tr>
      <td colspan="1" rowspan="2"><div class="etiquetas"><!--PERIODO--></div></td>
      <td colspan="<?php echo $cantOptionsActividad?>" rowspan="1"><div class="etiquetas">AREAS FORMATIVAS</div></td>
      <td colspan="<?php echo $cantOptionsConcepto?>" rowspan="1"><div class="etiquetas">APRECIACION PERSONAL</div></td>
      <td colspan="<?php echo $cantOptionsAsistencia?>" rowspan="1"><div class="etiquetas">CONTROL DE ASISTENCIAS</div></td>
      <td colspan="2" rowspan="1"><div class="etiquetas">FIRMAS</div></td>
    </tr>
-->
    <tr>
<td></td>
      <?php foreach($optionsActividad as $actividad) { ?> 
      <td><div class="etiquetas"><?php echo $actividad?></div></td>
      <?php } ?>

      <?php foreach($optionsConcepto as $concepto) { ?> 
      <td><div class="etiquetas"><?php echo $concepto?></div></td>
      <?php } ?>

<?php 
        if(count($aAsistencia)>0) { 
            foreach( current($aAsistencia) as $grupo => $valor) { ?> 
      <td><div class="etiquetas"><?php echo $grupo?></div></td>
      <?php
            }
        } ?>
<!--
      <td><div class="etiquetas">Maestro</div></td>
      <td><div class="etiquetas">Director</div></td>
-->
    </tr>



<?php foreach($optionsPeriodo as $periodo_id => $periodo) { ?>
    <tr>
      <td><div class="etiquetas"><?php echo $periodo?></div></td>
    <?php foreach($optionsActividad as $actividad_id => $actividad) { ?> 
      <td><div style="text-align: center;"><?php echo (array_key_exists($periodo_id, $notaAlumno) AND array_key_exists($actividad_id, $notaAlumno[$periodo_id]))?$notaAlumno[$periodo_id][$actividad_id]:"";?>
    </div></td>
    <?php } ?>      
    <?php foreach($optionsConcepto as $concepto_id => $concepto) { ?> 
      <td><div style="text-align: center;"><?php echo (array_key_exists($periodo_id, $conceptoAlumno) AND array_key_exists($concepto_id, $conceptoAlumno[$periodo_id]))?$conceptoAlumno[$periodo_id][$concepto_id]:"";?></div></td>
    <?php } ?>      

<?php if(count($aAsistencia)>0) { 
       foreach( $aAsistencia[$periodo_id] as $grupo => $valor) { ?> 
      <td><div style="text-align: center;"><?php echo $valor?></div></td>
      <?php
    }
        } ?>

      <td><div></div></td>
      <td><div></div></td>
    </tr>
<?php } ?>
  </tbody>
</table>

<br>
<br>


<table width="100%">
<tr>
<td>Observaciones:</td>
<td></td>
<td>Pendientes:</td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
</tr>



<tr>
<td><hr width="100px"></td>
<td><hr width="100px"></td>
<td><hr width="100px"></td>
</tr>


<tr>
<td align="center"><?php echo $establecimiento->getRector()?>, Rector</td>
<td align="center">Alumno</td>
<td align="center">Padre, Madre o Tutor</td>
</tr>
</table>

</div>
<br>
<?php } ?>
</body>
</html>
