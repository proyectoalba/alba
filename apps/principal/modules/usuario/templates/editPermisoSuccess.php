<div id="sf_admin_container">
    <script>
    function linkTo() {
        var obj = document.getElementById('rolId');
        location.href = "<?php echo url_for('usuario/editPermiso', false);?>/id/<?php echo $sf_params->get('id');?>/rolId/"+obj.options[obj.selectedIndex].value;
    }
	</script>
<div id="sf_admin_content">
  <h1>Permisos del Usuario (<?php echo $usuario->getUsuario()?>)</h1>
  <br/>
  <h2>Roles:</h2>
  <?php echo form_tag('usuario/saveRol')?>
    <?php echo input_hidden_tag('usuario_id', $usuario->getId())?>
    <p>
      <?php if(count($usuarioroles)> 0):?>
        <table class="sf_admin_list" cellspacing="0" style="width:40%">
          <thead>
            <tr>
              <th>Roles asignados:</th>
              <th width="1%">Acciones</th>
            </tr>
          </thead>
          <tfoot>
            <th colspan="2">&nbsp;</th>
          </tfoot>
        <?php $row = 0?>
        <?php foreach ($usuarioroles as $rol):?>
          <tr class="sf_admin_row_<?php echo $row?>">
            <td><?php echo $rol->getRol()?></td>
            <td><?php echo link_to(image_tag('../sf/sf_admin/images/delete_icon.png',array('alt'=>'Eliminar rol', 'title'=>'Eliminar rol')),'usuario/deleteRol?usuario_id='.$usuario->getId().'&rol_id=' . $rol->getRol()->getId(),'confirm=Eliminar el rol del usuario?')?></td>
          </tr>
          <?php $row = ! $row;?>
        <?php endforeach;?>

        </table>
      <?php else:?>
      <div class="error">No se ha asignado ningun Rol al usuario.</div>
      <?php endif;?>
    </p>
    <br/>
    <p>
      Agregar el rol <?php echo select_tag('rol_id', options_for_select($optionsRol)) ?>
      <?php echo submit_tag('Aceptar')?>
    </p>
  </form>
  <br/>
  <br/>
  <h2>Permisos</h2>
    <p>
      <?php echo form_tag('usuario/savePermiso', 'onSubmit="selectItem()"')?>
      <?php
          echo select_tag('permisos', options_for_select($optionsPermisos), 'multiple=multiple id="fromBox"');
          echo select_tag('usuarioPermisos[]', options_for_select($optionsUsuarioPermisos), 'multiple=multiple id="toBox"');
          echo input_hidden_tag('id', $sf_params->get('id'));
      ?>
      <ul class="sf_admin_actions">
      <li><?php echo submit_tag('submit', 'class=sf_admin_action_save value=Grabar');?></li>
      <li><?php echo button_to('Listado de usuarios','usuario/list',array('class'=>'sf_admin_action_list'))?></li>
      </ul>
      </form>
    </p>
    <script type="text/javascript">
    createMovableOptions("fromBox","toBox",500,300,'Permisos Disponibles','Permisos Seleccionados');
    </script>
  </div>
</div>
