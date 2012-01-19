    <th id="sf_admin_list_th_nombre">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/informes/sort') == 'nombre'): ?>
      <?php echo link_to(__('Nombre'), 'informes/list?sort=nombre&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/informes/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/informes/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nombre'), 'informes/list?sort=nombre&type=asc') ?>
      <?php endif; ?>
    </th>

    <th id="sf_admin_list_th_descripcion">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/informes/sort') == 'descripcion'): ?>
      <?php echo link_to(__('Descripci&oacute;n'), 'informes/list?sort=descripcion&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/informes/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/informes/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Descripci&oacute;n'), 'informes/list?sort=descripcion&type=asc') ?>
      <?php endif; ?>
    </th>


    <th id="sf_admin_list_th_fk_adjunto_id">
      <?php echo __('Plantilla'); ?>
    </th>


    <th id="sf_admin_list_th_tipoinforme">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/informes/sort') == 'fk_tipoinforme_id'): ?>
      <?php echo link_to(__('Tipo de Informe'), 'informes/list?sort=tipoinforme&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/informes/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/informes/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Tipo de Informe'), 'informes/list?sort=tipoinforme&type=asc') ?>
      <?php endif; ?>
    </th>


    <th id="sf_admin_list_th_listado">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/informes/sort') == 'listado'): ?>
      <?php echo link_to(__('¿Est&aacute; listado?'), 'informes/list?sort=listado&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/informes/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/informes/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('¿Es un listado?'), 'informes/list?sort=listado&type=asc') ?>
      <?php endif; ?>
    </th>


    <th id="sf_admin_list_th_variable">
      <?php echo __('Variables')?>
    </th>
