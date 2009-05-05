<script>
    function linkTo() {
      var obj = document.getElementById('id');
      location.href = "<?php echo url_for('rol/editPermiso', false);?>/id/"+obj.options[obj.selectedIndex].value;
    }
</script>
<div id="sf_admin_container">
  <?php include_partial('global/flashes')?>
  <div id="sf_admin_content">
    <h1>Permisos por Roles</h1>
    <br>
    <?php echo form_tag('rol/savePermiso', 'onSubmit="selectItem()"')?>
    Rol: <?php echo select_tag('id', options_for_select($optionsRol, $sf_params->get('id')), 'onChange=linkTo()'); ?><br> <br>
    <?php
        echo select_tag('permisos', options_for_select($optionsPermisos), 'multiple=multiple id="fromBox"');
        echo select_tag('rolPermisos[]', options_for_select($optionsRolPermisos), 'multiple=multiple id="toBox"');
    //    echo select_tag('rolPermisos[]', objects_for_select($optionsRolPermisos,'getFkPermisoId','getPermiso()->getNombre',''), 'multiple=multiple id="toBox"');
    ?>
    <ul class="sf_admin_actions">
        <li><?php echo submit_tag('submit', 'class=sf_admin_action_save value=Grabar');?></li>
        <li><?php echo button_to('Listado de Roles','rol/list',array('class'=>'sf_admin_action_list'))?></li>
    </ul>
    </form>
  </div>
</div>
<script type="text/javascript">
createMovableOptions("fromBox","toBox",500,300,'Permisos Disponibles','Permisos Seleccionados');
</script>
