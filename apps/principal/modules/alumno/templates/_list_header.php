<h1>Listado de Alumnos 
<?
if (isset($filters['division']) && $filters['division'] != '' && $filters['division'] != 0) {
    $division = DivisionPeer::retrieveByPk($filters['division']);
    ?> de <? echo $division->getAnio()->getDescripcion()." ".$division->getDescripcion();?>
<? }?>
</h1>
<?php if ($sf_request->getError('delete')): ?>
<div class="form-errors">
  <h2>Could not delete the selected Alumno</h2>
  <ul>
    <li><?php echo $sf_request->getError('delete') ?></li>
  </ul>
</div>
<?php endif; ?>
