<?php use_helper('I18N', 'Date', 'Object') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

  <h1>
    <?php echo __('Listado de Informes', array()) ?>
  </h1>


  <div id="sf_admin_header">
    <?php include_partial('informes/list_messages', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_content">
    <?php if (!$pager->getNbResults()): ?>
      <?php echo __('no result') ?>
    <?php else: ?>
      <?php include_partial('informes/list', array('pager' => $pager)) ?>
    <?php endif; ?>
    <?php include_partial('list_actions') ?>
  </div>

</div>
