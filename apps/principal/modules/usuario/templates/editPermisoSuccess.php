    <script>	
    function linkTo() {
        var obj = document.getElementById('rolId');
        location.href = "<?php echo url_for('usuario/editPermiso', false);?>/id/<?php echo $sf_params->get('id');?>/rolId/"+obj.options[obj.selectedIndex].value;
    }
	</script>		

<h1>Permisos por Usuario (<?=$usuario->getUsuario()?>) </h1>
<br>
<?php echo form_tag('usuario/savePermiso', 'onSubmit="selectItem()"')?>
Rol:  <?php echo select_tag('rolId', options_for_select($optionsRol, $sf_params->get('rolId')), 'onChange=linkTo()'); ?><br><br>
<?php 
    echo select_tag('permisos', options_for_select($optionsPermisos), 'multiple=multiple id="fromBox"');
    echo select_tag('usuarioPermisos[]', options_for_select($optionsUsuarioPermisos), 'multiple=multiple id="toBox"');
    echo input_hidden_tag('id', $sf_params->get('id'));
?>
<ul class="sf_admin_actions">
<li><? echo submit_tag('submit', 'class=sf_admin_action_save value=Grabar"');?></li>
<li><? echo button_to('Listado de usuarios','usuario/list',array('class'=>'sf_admin_action_list'))?></li>
</ul>
</form>
<script type="text/javascript">
createMovableOptions("fromBox","toBox",500,300,'Permisos Disponibles','Permisos Seleccionados');
</script>

