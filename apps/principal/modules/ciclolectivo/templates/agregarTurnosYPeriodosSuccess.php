<?php use_helper('DateForm','I18N','Validation') ?>


<script>
 function linkTo() {
    var obj = document.getElementById('id');
    location.href = "<?php echo url_for('ciclolectivo/agregarTurnosYPeriodos', false);?>/id/"+obj.options[obj.selectedIndex].value;
 }
</script>


<div id="sf_admin_container">
<?php include_partial('global/flashes')?>

<?php if(count($optionsCiclolectivo) > 0) { ?>

<?php echo form_tag('ciclolectivo/grabarTurnosYPeriodos', 'onSubmit="selectItem()"'); ?>

<div id="content">
<br>
<h1>Ciclo Lectivo  <?php echo select_tag('id', options_for_select($optionsCiclolectivo, $sf_params->get('id')), 'onChange=linkTo()'); ?></h1>
<div id="sf_admin_header"></div>
<div id="sf_admin_content">


<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_descripcion"> Descripci&oacute;n</th>
    <th id="sf_admin_list_th_fecha_inicio"> Fecha Inicio</th>
    <th id="sf_admin_list_th_fecha_fin"> Fecha Fin</th>
    <th id="sf_admin_list_th_establecimiento"> Establecimiento</th>
  </tr>
  </thead>
  <tbody>
  <tr class="sf_admin_row_0">
    <td>
    <div class="content<?php if ($sf_request->hasError('ciclolectivo{descripcion}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('ciclolectivo{descripcion}')): ?>
        <?php echo form_error('ciclolectivo{descripcion}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php echo input_tag('ciclolectivo[descripcion]',$ciclolectivo->getDescripcion());?>
    </div>
    </td>
    <td>

<div class="content<?php if ($sf_request->hasError('ciclolectivo{fecha_inicio}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciclolectivo{fecha_inicio}')): ?>
    <?php echo form_error('ciclolectivo{fecha_inicio}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_date_tag('ciclolectivo[fecha_inicio]', $ciclolectivo->getFechaInicio() , array('rich'=>true, 'calendar_button_img'=>sfConfig::get('sf_admin_web_dir').'/images/date.png', 'control_name'=>'ciclolectivo[fecha_inicio]')) ?>
</div>


    </td>
     <td>

<div class="content<?php if ($sf_request->hasError('ciclolectivo{fecha_fin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('ciclolectivo{fecha_fin}')): ?>
    <?php echo form_error('ciclolectivo{fecha_fin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


<?php echo input_date_tag('ciclolectivo[fecha_fin]', $ciclolectivo->getFechaFin() , 'rich=true calendar_button_img=/sf/sf_admin/images/date.png control_name=ciclolectivo[fecha_fin]'); ?>
</div>
</td>
    <td><?php echo ($ciclolectivo->getEstablecimiento())?$ciclolectivo->getEstablecimiento()->getNombre():"";?></td>
    <?php echo input_hidden_tag('ciclolectivo[id]', $ciclolectivo->getId()) ?>
  </tr>
  </tbody>
<tfoot>
  <tr>
    <th colspan="9">
      <div class="float-right">
      </div>
    </th>
  </tr>
</tfoot>

</table>
<br>



<h1>Turnos</h1>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_descripcion"> Descripci&oacute;n</th>
    <th id="sf_admin_list_th_hora_inicio">Hora Inicio</th>
    <th id="sf_admin_list_th_hora_fin">Hora Fin</th>
    <th id="sf_admin_list_th_action">Acciones</th>
  </tr>
  </thead>
  <tbody>
<?php
    $i = 0;
foreach($aTurnos as $turno){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo input_tag("turnos[$i][descripcion]",$turno->getDescripcion());?></td>
    <td><?php echo select_time_tag("turnos[$i][hora_inicio]", $turno->getHoraInicio(), array('include_second' => false, '12hour_time' => true));?></td>
    <td><?php echo select_time_tag("turnos[$i][hora_fin]", $turno->getHoraFin(), array('include_second' => false, '12hour_time' => true));?></td>
    <?php echo input_hidden_tag("turnos[$i][id]", $turno->getId()); ?>
    <td>
    <ul class="sf_admin_td_actions">
    <li><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'ciclolectivo/deleteTurno?idTurno='.$turno->getId().'&id='.$sf_params->get('id')); ?>
    </ul>
    </td>
  </tr>
  <?php $i++; }?>

    <tr class="sf_admin_row_0">
    <td><?php echo input_tag("turnos[$i][descripcion]",'');?></td>
    <td><?php echo select_time_tag("turnos[$i][hora_inicio]",array() , array('include_second' => false, '12hour_time' => true));?></td>
    <td><?php echo select_time_tag("turnos[$i][hora_fin]", array(), array('include_second' => false, '12hour_time' => true));?></td>
    <td></td>
  </tr>


  </tbody>
<tfoot>
  <tr>
    <th colspan="9">
      <div class="float-right">
<!--      <ul class="sf_admin_actions"><li><?php echo button_to(__('create'), 'ciclolectivo/createTurno', array ('class' => 'sf_admin_action_crear')) ?></li> </ul>
-->
      </div>
    </th>
  </tr>
</tfoot>
</table>


<br>


<h1>Per&iacute;odos</h1>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_descripcion"> Descripci&oacute;n</th>
    <th id="sf_admin_list_th_fecha_inicio">Fecha Inicio</th>
    <th id="sf_admin_list_th_fecha_fin">Fecha Fin</th>
    <th id="sf_admin_list_th_fecha_fin">Calcular</th>
    <th id="sf_admin_list_th_fecha_fin">Formula</th>
    <th id="sf_admin_list_th_nro_action">Acciones</th>
  </tr>
  </thead>
  <tbody>
<?php
  $i = 0;
  foreach($aPeriodo as $periodo){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo input_tag("periodo[$i][descripcion]",$periodo->getDescripcion());?></td>
    <td><?php echo input_date_tag("periodo[$i][fecha_inicio]",$periodo->getFechaInicio(), "rich=true calendar_button_img=/sf/sf_admin/images/date.png");?></td>
    <td><?php echo input_date_tag("periodo[$i][fecha_fin]",$periodo->getFechaFin(), "rich=true calendar_button_img=/sf/sf_admin/images/date.png");?></td>
    <td><?php echo checkbox_tag("periodo[$i][calcular]",'1',$periodo->getCalcular());?></td>
    <td><?php echo input_tag("periodo[$i][formula]",$periodo->getFormula());?></td>
    <?php echo input_hidden_tag("periodo[$i][id]", $periodo->getId()); ?>
    <td>
    <ul class="sf_admin_td_actions">
    <li><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'ciclolectivo/deletePeriodo?idPeriodo='.$periodo->getId().'&id='.$sf_params->get('id')); ?>
    </ul>
    </td>

  </tr>
 <?php $i++; }?>

  <tr class="sf_admin_row_0">
    <td><?php echo input_tag("periodo[$i][descripcion]",'');?></td>
    <td><?php echo input_date_tag("periodo[$i][fecha_inicio]",'',"rich=true calendar_button_img=/sf/sf_admin/images/date.png");?></td>
    <td><?php echo input_date_tag("periodo[$i][fecha_fin]",'',"rich=true calendar_button_img=/sf/sf_admin/images/date.png");?></td>
    <td><?php echo checkbox_tag("periodo[$i][calcular]",'1',false);?></td>
    <td><?php echo input_tag("periodo[$i][formula]",'');?></td>
    <td></td>
  </tr>

  </tbody>
    <tfoot>
        <tr>
            <th colspan="9">
        </th>
        </tr>
    </tfoot>
</table>

        <div>
          <ul class="sf_admin_actions">
            <li>
            <?php  echo submit_tag('submit', 'class=sf_admin_action_save value=Grabar'); ?>
            </li>
            <li><?php echo button_to("Listado de Ciclo Lectivos","ciclolectivo/list",'class=sf_admin_action_list')?></li>
        </ul>
      </div>

</form>

<?php } ?>

</div>
