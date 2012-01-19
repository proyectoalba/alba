<?php use_helper('I18N', 'Date') ?>
<script>
     function filterCat() {
        var objc = document.getElementById('legajo_categoria_id');
        var url  = "<?php echo url_for('legajopedagogico/', false);?>/verLegajo/aid/<?php echo $alumno->getId()?>/cid/"+objc.value;
        location.href = url;
     }

    function create() {
        var objc = document.getElementById('legajo_categoria_id');
        var url  = "<?php echo url_for('legajopedagogico/', false);?>/create/aid/<?php echo $alumno->getId()?>/cid/"+objc.value;
        location.href = url;
    }
</script>
<div id="sf_admin_container">
<h1>Legajo Pedagógico de <?php echo $alumno->getApellido()." ".$alumno->getNombre()?> </h1>
<div class="sf_admin_filters">
<?php echo form_tag('legajopedagogico/verLegajo', 'id=sf_admin_edit_form name=sf_admin_edit_form multipart=true') ?>
  <fieldset>
    <h2>filtros</h2>
    <div class="form-row">
        <?php echo label_for('Categor&iacute;a', __('Categor&iacute;a:')) ?>
    <div class="content">
        <?php echo select_tag('legajo_categoria_id', options_for_select($optionsCategoriaLegajo, $legajo_categoria_id)) ?>
    </div>
    </div>
  </fieldset>
  <ul class="sf_admin_actions">
    <li><input class="sf_admin_action_reset_filter" value="borrar" type="reset" /></li>
    <li><input type="button" name="filter" value="filtrar" class="sf_admin_action_filter" onclick="filterCat()" /></li>
  </ul>
</form>
</div>

<table cellspacing="0" class="sf_admin_list">
  <thead>
  <tr>
    <th id="sf_admin_list_th_fecha"> Fecha</th>
    <th id="sf_admin_list_th_titulo"> T&iacute;tulo</th>
    <th id="sf_admin_list_th_resumen">Resumen</th>
    <th id="sf_admin_list_th_categoria">Categor&iacute;a</th>
    <th id="sf_admin_list_th_sf_actions">Acciones</th>
  </tr>
  </thead>

  <tbody>
<?php
    $i = 0;
    foreach($aEntradaLegajo as $entradaLegajo){
?>
  <tr class="sf_admin_row_0">
    <td><?php echo format_date($entradaLegajo->getFecha(), "dd/MM/yy")?></td>
    <td><?php echo $entradaLegajo->getTitulo()?></td>
    <td onMouseOver="this.T_BGCOLOR='#d3e3f6';this.T_SHADOWWIDTH=5;this.T_STICKY=1;this.T_OFFSETX=-20;return escape('<?php echo htmlentities(str_replace("\r\n","<br>",$entradaLegajo->getTexto()), ENT_QUOTES)?>');"><?php echo $entradaLegajo->getResumen()?></td>
    <td><?php echo (method_exists($entradaLegajo->getLegajocategoria(),"getDescripcion"))?$entradaLegajo->getLegajocategoria()->getDescripcion():"";?></td>

    <td>
    <ul class="sf_admin_td_actions">
    <li><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/edit_icon.png', array('alt' => __('verLegajo'), 'title' => __('verLegajo'))), 'legajopedagogico/edit?aid='.$alumno->getId().'&id='.$entradaLegajo->getId().'&cid='.$entradaLegajo->getFkLegajocategoriaId()); ?>

    <li><?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/delete_icon.png', array('alt' => __('borrar'), 'title' => __('borrar'))), 'legajopedagogico/delete?aid='.$alumno->getId().'&id='.$entradaLegajo->getId().'&cid='.$entradaLegajo->getFkLegajocategoriaId()); ?>

    </ul>
    </td>
  </tr>
  <?php } ?>
  </tbody>


<tfoot>
  <tr>
    <th colspan="9">
    </th>
  </tr>
</tfoot>  
</table>
      <div class="float-right">
          <ul class="sf_admin_actions">
            <li>
            <input type="button" name="create" value="Nuevo" class="sf_admin_action_create" onclick="create()" />
            </li>
            <li>
                <?php echo button_to('Listado Alumnos','alumno/list',"class=sf_admin_action_list")?>
            </li>
            <li>
                <?php echo button_to('Ir a Cuenta','cuenta/verCompleta?id='.$alumno->getFkCuentaId(),"class=sf_admin_action_ir_a") ?>
            </li>
        </ul>
      </div>

</div>

</div>
<?php echo javascript_include_tag('varios/wz_tooltip.js'); ?>
