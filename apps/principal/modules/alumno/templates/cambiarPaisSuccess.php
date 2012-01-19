<?php
    use_helper("Object");
?>
<div id="item_provincia">
<?php 
    echo select_tag('alumno[fk_provincia_id]', objects_for_select($provincias, 'getId','getNombreLargo',$provincia_id), array('control_name' => 'alumno[fk_provincia_id]'));
?>
</div>