<?php
/**
*    This file is part of Alba.
*
*    Alba is free software; you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation; either version 2 of the License, or
*    (at your option) any later version.
*
*    Alba is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with Alba; if not, write to the Free Software
*    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
                
                
/**
*  asistencias template.
*
* @package    alba
* @author     José Luis Di Biase <josx@interorganic.com.ar>
* @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
* @author     Fernando Toledo <ftoledo@pressenter.com.ar>
* @version    SVN: $Id$
* @filesource
* @license GPL
*/
?>                   
<?php use_helper('DateForm');
      use_helper("I18N");
?>
<script>
    function linkTo() {
        var objd = document.getElementById('carrera_id');
        var url  = "<?php echo url_for('asistencia/', false);?>/index/carrera_id/"+objd.options[objd.selectedIndex].value;
        location.href = url;
    }
</script>


<div id="sf_admin_container">
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

    <?php echo form_tag('asistencia/index', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>
    <fieldset id="sf_fieldset_none" class="">

    <div class="form-row">
        <table cellspacing="1">
            <tr>
                <td>
                    <?php echo label_for('carrera_id', __('Carrera:'), 'class="required" '); ?>
                    <?php echo label_for('division_id', __('A&ntilde;o/Divisi&oacute;n:'), 'class="required" '); ?>
                </td>
                <td>
                    <?php echo select_tag('carrera_id', options_for_select($optionsCarrera, $carrera_id, 'include_custom=--Todas--'),array('onChange' => 'javascript:linkTo()')); ?>
                    <?php echo select_tag('division_id', options_for_select($optionsDivision, $division_id)); ?>
                </td>
                <td style='padding-left:50px'>
                    <?php echo label_for('fecha', __('Fecha Inicio:'), 'class="required" '); ?>       
                </td>
                <td>
                    <?php //----- Nuevo -----//
                          //@TODO Obtener el año de inicio y de fin del cliclo lectivo 
                          echo select_day_tag('dia', $d, 'include_custom=Elija un d&iacute;a') ?>
                    <?php echo select_month_tag('mes', $m, 'include_custom=Elija un mes use_short_month=true') ?>
                    <?php echo select_year_tag('ano', $y, 'include_custom=Elija un a&ntilde;o year_end='.$anio_hasta.' year_start='.$anio_desde) ?>
                </td>
                <td style='padding-left:50px'>
                    <?php echo label_for('vista', __('Vista:'), 'class="required"'); ?>
                </td>
                <td>  
                    <?php echo select_tag('vistas', options_for_select($aVistas, $vista_id)); ?>
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
        <?php if($alumno_id >= 0) {?>
            <?php echo input_hidden_tag('alumno_id', $alumno_id) ?>
        <?php }?>    
     </form>
<br>
<br>
<?php echo form_tag('asistencia/grabar', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true');
      echo input_hidden_tag('division_id', $division_id); 
      echo input_hidden_tag('dia', $d); 
      echo input_hidden_tag('mes', $m); 
      echo input_hidden_tag('ano', $y);       
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
            for($i=0, $max = count($aIntervalo); $i < $max ;$i++) { ?>
                <th id="sf_admin_list_th_sf_actions" <?php echo (date("w",strtotime($aIntervalo[$i])) == 6 || date("w",strtotime($aIntervalo[$i])) == 0)?"style='color:#FF0000'":""?> ><?php echo date("d",strtotime($aIntervalo[$i]))?></th>
            <?php } ?>
                <th id="sf_admin_list_th_sf_actions">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
           <?php foreach ($aTipoasistencias as $idx => $Tipoasistencia){ ?>
                <th id="sf_admin_list_th_sf_actions" title="<?php echo $Tipoasistencia[1]?>"><?php echo $idx ?></th>
            <?php } ?>
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
                    if ( array_key_exists($fecha, $aFeriado) )  {
                        echo input_tag("asistencia[$idx][$fecha]", "", array('size' => '2', 'maxlength' => '2', 'disabled' => true ));
                        $aFeriadoEfectivo[$fecha] = $aFeriado[$fecha];
                    }    
                    elseif (date("w",strtotime($aIntervalo[$i])) == 6 || date("w",strtotime($aIntervalo[$i])) == 0) { //  No lo muestra si es sá
                         echo input_tag("asistencia[$idx][$fecha]", "", array('size' => "2", 'maxlength' => "2",'disabled' => true ));    
                    } else {
                        if ( array_key_exists($idx, $aDatos) AND array_key_exists($fecha, $aDatos[$idx])) {
                            $sizeAsis = count($aDatos[$idx][$fecha]);
                            echo input_tag("asistencia[$idx][$fecha]", $aDatos["$idx"]["$fecha"], array('size' => $sizeAsis, 'maxlength' => $sizeAsis));
                            @$totales[$aDatos["$idx"]["$fecha"]]++;
                            @$totalesAlumnos[$aDatos["$idx"]["$fecha"]]++;
                         } else {
                            echo input_tag("asistencia[$idx][$fecha]", "", array('size' => "2", 'maxlength' => "2"));    
                         }
                     }
                 ?>
                 </td>
            <?php } ?>
<td></td>
    <?php
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
            echo form_tag('asistencia/listado', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true');
            echo input_hidden_tag('division_id', $division_id); 
            echo input_hidden_tag('dia', "$d"); 
            echo input_hidden_tag('mes', "$m"); 
            echo input_hidden_tag('ano', "$y"); 
            echo input_hidden_tag('vistas', $vista_id);
            echo input_hidden_tag('vista', "layout_sinmenu"); 
            if($alumno_id >= 0)
                 echo input_hidden_tag('alumno_id', $alumno_id);
            echo submit_tag(__('Vista Previa'), array ('name' => 'Imprimir','class' => 'sf_admin_action_print'));
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
<?php // Comienza Feriados
    if(count($aFeriadoEfectivo)>0) {
?>
    </table>
        <br>Feriados en Intervalo<br>

    <table cellspacing="1">
        <tr>
<?php
        foreach($aFeriadoEfectivo as $fecha => $nombre) {
            $fecha = date("d-m-Y",strtotime($fecha));
            echo "<td style='padding-left:20px'><b>$nombre</b>:  $fecha</td>";
        }
    } 
    // Finaliza Feriados
?>
        </tr>
<?php } else { ?>
<h2>NO HAY ALUMNOS</h2>
<?php } ?>
        </table>
    </div>
      <div class="float-right">
          <ul class="sf_admin_actions">
            <li><?php echo button_to('Listado de alumnos','alumno/list',array('class' => 'sf_admin_action_list'))?></li>
<?php if($alumno_id >= 0) {?>
            <li><?php echo button_to('Ir a Cuenta','cuenta/verCompleta?id=' .$cuenta_id,array('class'=>'sf_admin_action_ir_a'))?></li>
<?php } ?>
        </ul>
      </div>
    </fieldset>
<?php if($bool_gd) { ?>  
    <?php if($bool_tmp) { ?>  
        <?php if($nombre_completo_archivo) { ?>  
        <div align="center">
            <img src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot().'/tmp/'.$nombre_completo_archivo?>">  
        </div>
        <?php } else { ?>
        <?php } ?>
    <?php } else { ?>
        <div class="form-errors">
        <ul>
            <li>No tiene permisos de escritura sobre el directorio web/tmp para ver los gr&aacute;ficos de estad&iacute;sticas.</li>
        </ul>
        </div>    
    <?php } ?>

<?php } else { ?>
        <div class="form-errors">
        <ul>
            <li>No tiene Instalado la biblioteca GD para ver los gr&aacute;ficos de estad&iacute;sticas. Consulte en: <a href="http://www.php.net/manual/es/ref.image.php">http://www.php.net/manual/es/ref.image.php</a></li>
        </ul>
        </div>
<?php } ?>
</div>
