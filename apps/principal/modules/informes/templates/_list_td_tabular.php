    <td><?php echo link_to($informe->getNombre() ? $informe->getNombre() : __('-'), 'informes/edit?id='.$informe->getId()) ?></td>
    <td><?php echo $informe->getDescripcion() ?></td>
    <td>
<?php if($informe->getAdjunto()) { ?>
<a href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot()."/".sfConfig::get('sf_upload_dir_name').'/'.sfConfig::get('sf_informe_dir_name').'/'. $informe->getAdjunto()->getRuta()?>"><?php echo $informe->getAdjunto()->getNombreArchivo()?></a>
<?php }  ?>
    <td><?php echo ($informe->getTipoinforme())?$informe->getTipoinforme()->getNombre():"" ?></td>
    <td><?php echo $informe->getListado() ? image_tag(sfConfig::get('sf_admin_web_dir').'/images/tick.png') : '&nbsp;' ?></td>
    <td><?php echo $informe->getVariables() ?></td>

  