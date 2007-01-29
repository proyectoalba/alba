<?php use_helper('Date') ?>
<?php use_helper('ZZDate') ?>

<h1>Asistencias</h1>
    <?php if ($sf_request->hasErrors()): ?>
      <div class="form-errors">
      <h2><?php echo __('There are some errors that prevent the form to validate') ?></h2>
       <ul>
       <?php foreach($sf_request->getErrors() as $error): ?>
       <li><?php echo $error ?></li>
       <?php endforeach ?>
       </ul>
      </div>
    <?php endif ?>
    <?php echo form_tag('asistencia/mostrar', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true ') ?>   
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <table cellspacing="1">
            <tr>
                <td>
                    <?php echo label_for('division_id', __('Divisi&oacute;n:'), 'class="required" '); ?>
                </td>
                <td>
                    <?php echo select_tag('division_id', options_for_select($optionsDivision, $division_id)); ?>
                </td>
                <td>
                    <?php echo label_for('fecha', __('Fecha Inicio:'), 'class="required" '); ?>                   
                </td>
                <td>
                    <?php echo zz_input_date_tag('fechainicio',$fechainicio, array (
                      'rich' => true,'withtime' => true,
                      'calendar_button_img' => '/sf/images/sf_admin/date.png',
                      'control_name' => 'fechainicio'));?>
                </td>
                <td>
                    <? echo label_for('vista', __('Vista:'), 'class="required" '); ?>
                </td>
                <td>  
                    <?php echo select_tag('vistas', options_for_select($aVistas,$vista_id)); ?>
                </td>
            </tr>
        <table>      
        <ul class="sf_admin_actions">
            <li>
            <?php echo submit_tag(__('Mostrar'), array ('name' => 'Mostrar','class' => 'sf_admin_action_save')) ?>
            </li>
        </ul>
      </div>      
     </fieldset>
        <? if($alumno_id >= 0) {?>
            <?php echo input_hidden_tag('alumno_id', $alumno_id) ?>
        <? }?>    
     </form>
<?php echo form_tag('asistencia/grabar', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true');
      echo input_hidden_tag('division_id', $division_id); 
      echo input_hidden_tag('fechainicio', $fechainicio); 
      echo input_hidden_tag('vista_id', $vista_id); 
      if($alumno_id >= 0)
             echo input_hidden_tag('alumno_id', $alumno_id);
?>
    <h1>Mes: <?php echo  $aMeses[$m]; ?> </h1>
    <fieldset id="sf_fieldset_none" class="">
<?php if( count($aAlumnos)>0) {?>
    <table  cellspacing="1" class="sf_admin_list">     
    <thead>
    <tr>
        <th id="sf_admin_list_th_alumno"> Alumnos / D&iacute;as </th>
        <?php
            //$aIntervalo = diasxintervalo($d,$m,$y,$vista_id);
            for($i=0, $max = count($aIntervalo); $i < $max ;$i++) { ?>
                <th id="sf_admin_list_th_sf_actions"><?php echo date("d",strtotime($aIntervalo[$i])) ?></th>
            <?}?>
            <?php foreach ($aTipoasistencias as $idx => $Tipoasistencia){ ?>
                <th id="sf_admin_list_th_sf_actions"><?php echo $idx ?></th>
            <?}?>
     </tr>
     </thead>
     <tbody>
     <?php  
     $totales = array();
     $totalesAlumnos = array();
     $aFeriadoEfectivo = array();
     foreach($aAlumnos as $idx => $alumno){ ?>
      <tr class="sf_admin_row_0">
         <td>
            <?php echo $alumno?>   
         </td>
         <?php
            $totalesAlumnos ="";
            for($i=0, $max = count($aIntervalo); $i < $max ;$i++) { ?>
                <td>
                <?php 
                    $fecha = date("Y-m-d 00:00:00",strtotime($aIntervalo[$i]));
                    if ( array_key_exists($fecha, $aFeriado))  {
                        echo input_tag("asistencia['$idx']['$fecha']", "", array('size' => '2', 'maxlength' => '2', 'disabled' => true ));
                        $aFeriadoEfectivo[$fecha] = $aFeriado[$fecha];
                    } else {
                        if ( array_key_exists($idx, $aDatos) AND array_key_exists($fecha, $aDatos[$idx])){
                            $sizeAsis = count($aDatos[$idx][$fecha]);
                            echo input_tag("asistencia['$idx']['$fecha']", $aDatos["$idx"]["$fecha"], array('size' => $sizeAsis, 'maxlength' => $sizeAsis));
                            @$totales[$aDatos["$idx"]["$fecha"]]++;
                            @$totalesAlumnos[$aDatos["$idx"]["$fecha"]]++;
                         } else {
                            echo input_tag("asistencia['$idx']['$fecha']", "", array('size' => "2", 'maxlength' => "2"));    
                         }
                     }
                 ?>
                 </td>
            <?php }
               foreach ($aTipoasistencias as $idx => $Tipoasistencia){  ?>
                  <td><?php echo isset($totalesAlumnos[$idx])?$totalesAlumnos[$idx]:0; ?></td>
               <?php }?>
      </tr>   
     <?php  } ?>
     </tbody>
    </table>
     <?php if ( count($aAlumnos) >0 ) {?>      
      <div class="form-row">
        <ul class="sf_admin_actions"><li>   
        <?php echo submit_tag(__('Grabar'), array ('name' => 'Grabar','class' => 'sf_admin_action_save')) ?>
        </form>
        <?php 
            echo form_tag('asistencia/mostrar', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true');
            echo input_hidden_tag('division_id', $division_id); 
            list($y, $m, $d) = split("[/. -]",$fechainicio);
            echo input_hidden_tag('fechainicio', "$d/$m/$y"); 
            echo input_hidden_tag('vistas', $vista_id);
            echo input_hidden_tag('vista', "noMuestraMenu"); 
            if($alumno_id >= 0)
                 echo input_hidden_tag('alumno_id', $alumno_id);
            echo submit_tag(__('Imprimir'), array ('name' => 'Imprimir','class' => 'sf_admin_action_saveprint'));
         ?>
        </form>
        </li></ul>
     </div>
    <?php }?> 
        <table cellspacing="1">
            <tr>
    <?php foreach ($aTipoasistencias as $idx => $Tipoasistencia){
            $dias = count($aIntervalo)*count($aAlumnos);
            $porcentaje =isset($totales[$idx])?$totales[$idx]*100/$dias:0;
            $porcentaje = number_format($porcentaje,2);    
            echo "<td style='padding-left:20px'><b>$idx</b> - $Tipoasistencia[1] ($porcentaje %)</td>";
          }
    ?>
            </tr>
<?php
    if(count($aFeriadoEfectivo)>0) {
?>
    </table>
        <br>Feriado<br>
    <table cellspacing="1">
        <tr>
<?php
        foreach($aFeriadoEfectivo as $fecha => $nombre) {
            $fecha = date("d-m-Y",strtotime($fecha));
            echo "<td style='padding-left:20px'><b>$nombre</b>  - $fecha</td>";
        }
    }
?>
        </tr>
<? } else { ?>
<h2>NO HAY ALUMNOS</h2>
<? } ?>
        </table>
    </div>
      <div class="float-right">
          <ul class="sf_admin_actions">
            <li><input style="background: #ffc url(small/alumnos.png) no-repeat 3px 2px" value="Listado Alumnos" type="button" onclick="document.location.href='<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/alumno/list';" /></li>
<? if($alumno_id >= 0) {?>
            <li><input style="background: #ffc url(small/alumnos.png) no-repeat 3px 2px" value="Ir a Cuenta" type="button" onclick="document.location.href='<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()?>/cuenta/verCompleta/id/<?=$cuenta_id?>';" /></li>
<? } ?>
        </ul>
      </div>
    </fieldset>
  
<div align="center">
<img src="<?=sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/".sfConfig::get('sf_upload_dir_name').'/grafico_asistencias.png'?>">  
</div>