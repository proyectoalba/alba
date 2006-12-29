<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Boletine</title>
</head>
<body>

<?php if ($sf_flash->has('notice')) { ?>
    <div class="save-ok">
        <h2><?php echo $sf_flash->get('notice')?></h2>
    </div>
<?php } else { ?>



BOLETIN DE CALIFICACIONES PERTENECIENTES A <b><?=$alumno->getNombre()." ".$alumno->getApellido()?></b><br>
GRADO <b><?=$division->getAnio()->getDescripcion()?></b><br>
SECCION <b><?=$division->getDescripcion()?></b><br>
TURNO <b><?=$division->getTurnos()->getDescripcion()?></b><br>
<br>

<table style="text-align: left; width: 766px; height: 143px;" border="1" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td colspan="1" rowspan="2"><div class="verticaltext">PERIODO</div></td>
      <td colspan="<?=$cantOptionsActividad?>" rowspan="1">AREAS FORMATIVAS</td>
      <td colspan="<?=$cantOptionsConcepto?>" rowspan="1">APRECIACION PERSONAL</td>
      <td colspan="2" rowspan="1">CONTROL DE ASISTENCIAS</td>
      <td colspan="2" rowspan="1">FIRMAS</td>
    </tr>
    <tr>

      <? foreach($optionsActividad as $actividad) { ?> 
      <td><?=$actividad?></td>
      <? } ?>

      <? foreach($optionsConcepto as $concepto) { ?> 
      <td><?=$concepto?></td>
      <? } ?>

      <? if(count($aAsistencia)>0) { 
            foreach( current($aAsistencia) as $grupo => $valor) { ?> 
      <td><?=$grupo?></td>
      <?
            }
        } ?>

      <td>Maestro</td>
      <td>Director</td>
    </tr>

<? foreach($optionsPeriodo as $periodo_id => $periodo) { ?>
    <tr>
      <td><?=$periodo?></td>
    <? foreach($optionsActividad as $actividad_id => $actividad) { ?> 
      <td><?=(array_key_exists($periodo_id, $notaAlumno) AND array_key_exists($actividad_id, $notaAlumno[$periodo_id]))?$notaAlumno[$periodo_id][$actividad_id]:"";?>
    </td>
    <? } ?>      
    <? foreach($optionsConcepto as $concepto_id => $concepto) { ?> 
      <td><?=(array_key_exists($periodo_id, $conceptoAlumno) AND array_key_exists($concepto_id, $conceptoAlumno[$periodo_id]))?$conceptoAlumno[$periodo_id][$concepto_id]:"";?>
    <? } ?>      

<? if(count($aAsistencia)>0) { 
       foreach( $aAsistencia[$periodo_id] as $grupo => $valor) { ?> 
      <td><?=$valor?>
</td>
      <?
    }
        } ?>

      <td></td>
      <td></td>
    </tr>
<? } ?>
  </tbody>
</table>

<br>
<?php } ?>
<ul class="sf_admin_actions">
<li><? echo button_to('Ir a la cuenta','cuenta?action=verCompleta&id='.$alumno->getFkCuentaId(),array('class'=>'sf_admin_action_list'))?></li>
</ul>

</body>
</html>