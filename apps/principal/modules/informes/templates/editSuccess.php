<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Editar informe', 
array()) ?></h1>


<div id="sf_admin_content">
<?php include_partial('informes/edit_messages', array('informe' => $informe, 'labels' => $labels)) ?>
<?php include_partial('informes/edit_form', array('informe' => $informe, 'labels' => $labels)) ?>
</div>


</div>
