<?php use_helper('Javascript') ?>  
<?php echo input_tag('txt_cuenta') ?>
<?php echo submit_to_remote('ajax_submit', 'Buscar cuenta', array('update'   => 'item_list', 'url'      => 'alumno/buscar',)) ?>
<div id="item_list"></div>
