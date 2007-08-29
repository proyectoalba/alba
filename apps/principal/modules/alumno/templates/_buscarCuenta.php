<?php use_helper('Javascript') ?>  

 <?php
echo input_auto_complete_tag('txt_cuenta', '',
'cuenta/autocompletar',
array('autocomplete' => 'off'),
array('use_style' => true)
)
?>

<?php echo submit_to_remote('ajax_submit', 'Buscar cuenta', array('update'   => 'item_list', 'url'      => 'alumno/buscar',)) ?>
<div id="item_list"></div>
