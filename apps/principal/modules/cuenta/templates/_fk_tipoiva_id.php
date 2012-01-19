<div id="item_tipovia">
<?php 
    echo object_select_tag($cuenta, 'getFkTipoivaId', array (
    'related_class' => 'Tipoiva',
    'control_name' => 'cuenta[fk_tipoiva_id]', 'peer_method' => 'getEnOrden'
    )) 
?>
</div>