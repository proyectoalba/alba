<?php use_helper("I18N")?>
<?php if ($sf_user->hasFlash('notice')):?>
    <div class="save-ok">
        <h2><?php echo $sf_user->getFlash('notice')?></h2>
    </div>
<?php endif;?>
<div id="sf_admin_container">
<h1>Locaciones x Establecimiento "<?php echo $establecimiento->getNombre()?>"</h1>

<?php echo form_tag('establecimiento/saveLocacion', 'onSubmit="selectItem()"')?>
<?php 
    echo select_tag('locacion', options_for_select($optionsLocaciones), 'multiple=multiple id="fromBox"');
    echo select_tag('establecimientoLocacion[]', options_for_select($optionsEstablecimientoLocaciones), 'multiple=multiple id="toBox"');
    echo input_hidden_tag('id', $sf_params->get('id'));
?>

<table cellspacing="0" class="sf_admin_list">
<ul class="sf_admin_actions">
      <li><?php echo submit_tag(__('save'), array (
  'name' => 'commit',
  'value' => 'Grabar',
  'class' => 'sf_admin_action_save',
)) ?></li>
    <li><?php echo button_to(__('list'), 'establecimiento/list', array (
  'class' => 'sf_admin_action_list',
)) ?></li>
</ul>
</table>
</form>
</div>
<script type="text/javascript">
createMovableOptions("fromBox","toBox",500,300,'Locaciones Disponibles','Locaciones Seleccionadas');
</script>

