<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'informes/edit?id='.$informe->getId()) ?></li>
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('delete'))), 'informes/delete?id='.$informe->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
)) ?></li>
    <li><?php echo link_to(image_tag('/images/small/report_go.png', array('alt' => __('ir al reporte'), 'title' => __('ir al reporte'))), 'informes/busqueda?id='.$informe->getId()) ?></li>
</ul>
</td>
