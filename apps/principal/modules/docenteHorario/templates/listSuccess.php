<?php use_helper('DateForm') ?>
<?php use_helper('I18N') ?>

    <script>     
     function linkTo() {
        var obj = document.getElementById('idDocente');
        location.href = "<?php echo url_for('docenteHorario/list', false);?>/idDocente/"+obj.options[obj.selectedIndex].value;
     }
	</script>		
<?php 
use_helper('Misc');
echo form_tag('docenteHorario/grabarDocenteHorario', 'onSubmit="selectItem()"'); 
?>
<div id="sf_admin_container">
<br> 
<h1>Docente  <?php echo select_tag('idDocente', options_for_select($optionsDocente, $sf_params->get('idDocente')), 'onChange=linkTo()'); ?></h1>
<div id="sf_admin_header"></div>
<br>
<div id="sf_admin_container">

<?php if(count($aHorario) > 0 ) {?>
<h2>Horarios Tentativos</h2>
<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_dia">Evento</th>
  </tr>
  </thead>
  <tbody>

<?php $i = 1; foreach ($aHorario as $docente_horario): $odd = fmod(++$i, 2) ?>
  <tr class="sf_admin_row_0">
    <td><?php echo ($docente_horario->getEvento())?$docente_horario->getEvento()->getInfoEnTexto():""; ?></td>


<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'docenteHorario/edit?idDocente='.$docente_horario->getFkDocenteId()."&idEvento=".$docente_horario->getFkEventoId()) ?></li>
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'docenteHorario/deleteHorario?idDocente='.$docente_horario->getFkDocenteId()."&idEvento=".$docente_horario->getFkEventoId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
)) ?></li>
</ul>
</td>




  </tr>
<?php endforeach; ?>
  </tbody>
    <tfoot>
        <tr>
            <th colspan="9">
        </th>
        </tr>
    </tfoot>  
</table>
<?php } else { ?>
No hay horarios cargados
<?php }?>
<div>
          <ul class="sf_admin_actions">
            <li>
<?php 

$id  = ($sf_params->get('idDocente'))?$sf_params->get('idDocente'):1;
echo button_to(__('create'), 'docenteHorario/edit?idDocente='.$id, array ( 'class' => 'sf_admin_action_create',)) 


?>
            <li>
            <li>
             <?php echo button_to('Listado de Docentes','docente/list', array ('class' => 'sf_admin_action_list'))?>
            </li>
        </ul>
      </div>
</form>
