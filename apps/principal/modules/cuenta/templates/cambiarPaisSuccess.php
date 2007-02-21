<?php
    use_helper("Object");
?>
<div id="item_provincia">
<?php 
    echo select_tag('cuenta[fk_provincia_id]',objects_for_select($provincias,'getId','getNombreLargo'),array(
    'control_name' => 'cuenta[fk_provincia_id]'));
?>
</div>