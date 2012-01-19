<?php use_helper('Object') ?>
<?php include_partial('porDivision',array(
        'actividades'=>$actividades,
        'id_actividad'=>$sf_request->getParameter('rel_division_actividad_docente[fk_division_id]'),
        'nombre'=>'rel_division_actividad_docente[fk_division_id]'
));
?>
