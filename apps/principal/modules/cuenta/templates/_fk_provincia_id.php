<div id="item_provincia">
<?php  echo object_select_tag($cuenta, 'getFkProvinciaId', array (
                             'related_class' => 'Provincia',
                             'peer_method' => 'getEnOrden',
                             'control_name' => 'cuenta[fk_provincia_id]',
                             'include_custom' => '--Seleccione una Provincia--',)) ?>
</div>