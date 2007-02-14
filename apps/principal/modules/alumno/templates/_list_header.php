<h1>Listado de Alumnos 
<?
if (isset($filters['division']) && $filters['division'] != '' && $filters['division'] != 0) {
    $division = DivisionPeer::retrieveByPk($filters['division']);
    ?> de <? echo $division->getAnio()->getDescripcion()." ".$division->getDescripcion();?>
<? } ?>
</h1>
