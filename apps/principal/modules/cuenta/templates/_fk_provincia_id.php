<div id="item_provincia">
<?php 
    echo object_select_tag($cuenta, 'getFkProvinciaId', array (
    'related_class' => 'Provincia',
    'control_name' => 'cuenta[fk_provincia_id]',
    )) 
?>
</div>