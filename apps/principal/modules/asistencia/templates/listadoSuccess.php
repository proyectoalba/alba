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
* @version    SVN: $Id: indexSuccess.php 4965 2007-08-15 17:43:53Z josx $
* @filesource
* @license GPL
*/
?>                   
<?php use_helper('DateForm');
      use_helper("I18N");
?>
<div id="sf_admin_container">
<h1>Asistencias</h1>
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
        <table>
            <tr>
                <td>
                    <?php echo label_for('division_id', __('A&ntilde;o/Divisi&oacute;n:'), 'class="required"'); ?>
                    <?php echo $optionsDivision[$division_id]?>
                </td>
                <td>
                    <?php echo label_for('fecha', __('Fecha Inicio:'), 'class="required"'); 
                          echo "$d/$m/$y";?>       
                </td>
                <td>
                    <?php echo label_for('vista', __('Vista:'), 'class="required"'); 
                     echo $aVistas[$vista_id];?>
                </td>
            </tr>
        <table>      
      </div>      
     </fieldset>
    <h1>Mes: <?php echo  $aMeses[$m]; ?> </h1>
    <fieldset id="sf_fieldset_none" class="">
<?php if( count($aAlumnos)>0) {?>
    <table  cellspacing="1" class="sf_admin_list">     
    <thead>
    <tr>
        <th id="sf_admin_list_th_alumno"> Alumnos / D&iacute;as </th>
        <?php
            for($i=0, $max = count($aIntervalo); $i < $max ;$i++) { ?>
                <th id="sf_admin_list_th_alumno" <?php echo (date("w",strtotime($aIntervalo[$i])) == 6 || date("w",strtotime($aIntervalo[$i])) == 0)?"style='color:#FF0000'":""?> ><?php echo date("d",strtotime($aIntervalo[$i]))?></th>
            <?php } ?>
                <th id="sf_admin_list_th_alumno">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
           <?php foreach ($aTipoasistencias as $idx => $Tipoasistencia){ ?>
                <th id="sf_admin_list_th_alumno" title="<?php echo $Tipoasistencia[1]?>"><?php echo $idx ?></th>
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
                    //  No lo muestra si es sabado o domingo    
                    elseif (date("w",strtotime($aIntervalo[$i])) == 6 || date("w",strtotime($aIntervalo[$i])) == 0) { 
                         echo input_tag("asistencia[$idx][$fecha]", "", array('size' => "2", 'maxlength' => "2",'disabled' => true ));    
                    } else {
                        if ( array_key_exists($idx, $aDatos) AND array_key_exists($fecha, $aDatos[$idx])) {
                            $sizeAsis = count($aDatos[$idx][$fecha]);
                            echo  $aDatos["$idx"]["$fecha"];
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

    <table cellspacing="1">
        <tr>
        <?php foreach ($aTipoasistencias as $idx => $Tipoasistencia){
            $dias = count($aIntervalo)*count($aAlumnos);
            $porcentaje =isset($totales[$idx])?$totales[$idx]*100/$dias:0;
            $porcentaje = number_format($porcentaje,2);    
            echo "<td style='padding-left:20px;font-size:1px'><b>$idx</b> - $Tipoasistencia[1] ($porcentaje %)</td>";
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
            <li>No tiene permisos de escritura sobre el directorio tmp para ver los gr&aacute;ficos de estad&iacute;sticas.</li>
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
