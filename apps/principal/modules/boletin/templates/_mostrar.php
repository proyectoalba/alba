<?php use_helper("AlbaTools")?>
<?php if ($sf_user->hasFlash('notice')):?>
    <div class="save-ok">
        <h2><?php echo $sf_user->getFlash('notice')?></h2>
    </div>
<?php else:?>
<br/>
<div align="center" id="boletin">
  <div class="header">
  <?php echo $establecimiento->getNombre()?><br>
  <?php echo $establecimiento->getDireccion()?>
  <?php echo $establecimiento->getCiudad()?>
  <?php echo $establecimiento->getCodigoPostal()?>
  <?php echo $establecimiento->getTelefono()?>
  <br/>BOLET&Iacute;N  Ciclo Lectivo
  <br/><br/><b>Alumno: <?php echo $alumno->getNombre()." ".$alumno->getApellido()?></b>
  <b>Curso:&nbsp;<?php echo ($division->getAnio())?$division->getAnio()->getDescripcion():""?> <?php echo $division->getDescripcion()?> </b>
  </div>
  <br/><br/>
  <table class="notas" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td>&nbsp;</td>
        <?php foreach($optionsActividad as $actividad):?>
          <td><div><?php echo text2img($actividad);?></div></td>
        <?php endforeach;?>

        <?php foreach($optionsConcepto as $concepto):?>
        <td><div><?php echo text2img($concepto);?></div></td>
        <?php endforeach;?>

        <?php if(count($aAsistencia)>0): ?>
          <?php foreach(current($aAsistencia) as $grupo => $valor):?>
          <td><div><?php echo text2img($grupo);?></div></td>
          <?php endforeach;?>
        <?php endif;?>
      </tr>

      <?php foreach($optionsPeriodo as $periodo_id => $periodo):?>
        <tr>
          <td><div class="etiquetas"><?php echo $periodo?></div></td>
          <?php foreach($optionsActividad as $actividad_id => $actividad):?>
            <td>
              <div style="text-align: center;"><?php echo (array_key_exists($periodo_id, $notaAlumno) AND array_key_exists($actividad_id, $notaAlumno[$periodo_id]))?$notaAlumno[$periodo_id][$actividad_id]:"";?></div>
            </td>
          <?php endforeach;?>
          <?php foreach($optionsConcepto as $concepto_id => $concepto): ?>
            <td>
              <div style="text-align: center;"><?php echo (array_key_exists($periodo_id, $conceptoAlumno) AND array_key_exists($concepto_id, $conceptoAlumno[$periodo_id]))?$conceptoAlumno[$periodo_id][$concepto_id]:"";?></div>
            </td>
          <?php endforeach;?>

          <?php if(count($aAsistencia)>0): ?>
            <?php foreach( $aAsistencia[$periodo_id] as $grupo => $valor): ?>
              <td><div style="text-align: center;"><?php echo $valor?></div></td>
            <?php endforeach;?>
          <?php endif;?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>

<br/>
<br/>

<table width="100%">
  <tr>
    <td>Observaciones:</td>
    <td>&nbsp;</td>
    <td>Pendientes:</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td><hr width="100px"/></td>
    <td><hr width="100px"/></td>
    <td><hr width="100px"/></td>
  </tr>

  <tr>
    <td align="center"><?php echo $establecimiento->getRector()?>, Rector</td>
    <td align="center">Alumno</td>
    <td align="center">Padre, Madre o Tutor</td>
  </tr>
</table>

</div>
<br/>
<?php endif; ?>
