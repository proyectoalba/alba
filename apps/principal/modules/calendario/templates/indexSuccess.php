<style type="text/css">

img.horarioMaterias {
  float:left;
  width:100px;
  height:100px;
  margin-right:10px;
  cursor:move;
}

div.horarioMaterias {
  clear:both;
  border:1px solid #B3D4EF;
  background-color:#B3D4EF;
  padding:8px;
  width:500px;
}

div#wastebin {
  width:135px;
  padding:5px;
  border:1px solid #eee;
}


div.horarioMaterias img {
  float:left;
  width:32px;
  height:32px;
  margin-right:10px;
  cursor:move;
}

div.horarioMaterias div {
  font-size:12px/14px;
  font-weight:normal;
  color:##444;
  clear:left;
}

div.horarioMaterias-active {
  background-color:#ccc;
}

div.wastebin-active {
  width:135px;
  padding:5px;
  background-color:#ccc;
}

#horarioMaterias {
  clear:left;
  height:132px;
  margin:10px 0;
}

#horarios_list {
  height:120px;
}

</style>
<script>
     function linkTo(flag) {
        var obje = document.getElementById('establecimiento_id');
        var objc = document.getElementById('ciclolectivo_id');
        var url  = "<?php echo url_for('calendario/', false);?>/index/establecimiento_id/"+obje.options[obje.selectedIndex].value;

        if(flag == 0) {
            url = url + "/ciclolectivo_id/"+objc.options[objc.selectedIndex].value;
        }

        location.href = url;
     }

<?php if(count($optionsDivision)>0) { ?>
    function submitForm(){
        document.sf_admin_edit_form.submit();
    }
<?php } ?>

</script>


<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>


<div>

<table width="100%">
    <tr valign="top">
        <td width="30%">
            <div id="sf_admin_container">
                <h1><?php echo __('Generar horario por división',array()) ?></h1>
                <?php echo form_tag('calendario/index', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>

                <?php //echo object_input_hidden_tag($calendario, 'getId') ?>

                    <fieldset id="sf_fieldset_none" class="">

                        <!--
                         <div class="form-row">
                          <?php // echo label_for('establecimiento_id', __('Establecimiento:'), 'class="required" ') ?>
                          <?php // echo select_tag('establecimiento_id', options_for_select($optionsEstablecimiento,$establecimiento_id), 'onChange=linkTo(1)') ?>
                         </div>

                         <div class="form-row">
                          <?php // echo label_for('ciclolectivo_id', __('Ciclo Lectivo:'), 'class="required" ') ?>
                          <?php // echo select_tag('ciclolectivo_id', options_for_select($optionsCiclolectivo,$ciclolectivo_id), 'onChange=linkTo(0)') ?>
                         </div>
                        -->
                        <input type="hidden" name="establecimiento_id" value="<?php echo $establecimiento_id?>">
                        <input type="hidden" name="ciclolectivo_id" value="<?php echo $ciclolectivo_id?>">

                         <div class="form-row">
                          <?php echo label_for('turno_id', __('Turnos:'), 'class="required" ') ?>
                          <?php echo select_tag('turno_id', options_for_select($optionsTurnos,$turno_id),'onChange="javascript:submitForm()"') ?>
                         </div>

                        <!--
                        <div class="form-row">
                          <?php echo label_for('time_interval', __('Intervalo de tiempo:'), 'class="required" ') ?>
                          <?php echo select_tag('time_interval', options_for_select(array('15' => '15','30' => '30','45' => '45','60' => '60'),$time_interval)) ?>
                            Minutos
                        </div>
                        -->
                        <input type="hidden" name="time_interval" value="15">
                        <?php if(count($optionsDivision)>0) { ?>
                         <div class="form-row">
                          <?php echo label_for('division_id', __('Division:'), 'class="required" ') ?>
                          <?php echo select_tag('division_id', options_for_select($optionsDivision, $division_id),'onChange="javascript:submitForm()"') ?>
                         </div>

                         <div class="form-row">
                          <?php echo label_for('actividad_id', __('Actividad:'), 'class="required" ') ?>
                          <?php echo select_tag('actividad_id', options_for_select($optionsActividad, $actividad_id),'') ?>
                         </div>

                        <?php } ?>
                    </fieldset>
                    <ul class="sf_admin_actions">
                      <li><?php echo submit_tag(__('Mostrar'), array (
                      'name' => 'Mostrar',
                      'class' => 'sf_admin_action_save',
                    )) ?></li>
                    </ul>
                </form>
            </div>
            <div id="wastebin" style="float:right">
                <br><br><?php echo image_tag('trash.png', 'id=wastebin') ?>
            </div>
            <div style="height:20px">
              <p id="indicator" style="display:none">
                <?php echo image_tag('indicator.gif') ?> Procesando...
              </p>
            </div>

            <h1>Asignaturas</h1>
            <?php use_helper('Javascript') ?>
            <div id="horarios_list">
                <?php 
                if(count($horasMaterias)>0) {
                    foreach($horasMaterias as $idx => $oMateria) { ?>
                <?php
                    echo image_tag('horasMaterias'.$idx, array(
                    'id'    => 'horarioMaterias_'.$idx,
                    'alt'   => $oMateria->nombre,
                    'class' => 'horarioMaterias-items',
                //     'onMouseOver' => "this.T_SHADOWWIDTH=5;this.T_STICKY=1;this.T_OFFSETX=-20;return escape('".htmlentities(str_replace("\n","<br />",$oMateria->horarios_disponibles), ENT_QUOTES)."');"
                    ));
                    echo "<br>(".$oMateria->cantidad. " Horas)";
                ?>   
                <?php echo draggable_element('horarioMaterias_'.$idx, array('revert' => true)) ?>
                <br><br>
                <?php }
                    }
                ?>
            </div>
        </td>
        <td>
            <?php
            use_helper("CalendarWeek");
            echo loadCalendar($aDay, $aHour, $aEvent, $aDayNames, $time_interval, false, 110, 20);
            ?>
        </td>
    </tr>
</table>

<script type="text/javascript">
//<![CDATA[
Droppables.add('wastebin', {accept:'horarioMaterias-items', hoverclass:'wastebin-active', onDrop:function(element,dropppableElement){Element.hide(element); 
var nombre = element.id.substr(0,element.id.indexOf("_"));
new Ajax.Updater( nombre , 'calendario/remove/name/'+nombre, {asynchronous:true, evalScripts:true, onComplete:function(request, json){Element.hide('indicator')}, onLoading:function(request, json){Element.show('indicator')}, parameters:'id=' + encodeURIComponent(element.id)})}})
//]]>
</script>
<?php
    foreach($aEvent as $event) {
        echo  drop_receiving_element( "event".$event->id, array(
                                'update'     => 'eventname'.$event->id,
                                'url'        => 'calendario/add?name=eventname'.$event->id,
                                'accept'     => 'horarioMaterias-items',
                                'hoverclass' => 'horarioMaterias-active',
                                'loading'    => "Element.show('indicator')",
                                'complete'   => "Element.hide('indicator')",
                                'script'     => 'true'
        ));      
    }
 echo javascript_include_tag('varios/wz_tooltip.js');
?>