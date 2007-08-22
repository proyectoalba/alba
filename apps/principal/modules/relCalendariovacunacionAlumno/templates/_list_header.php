<h1>Vacuna por alumno
<?php
if (isset($filters['fk_alumno_id']) && $filters['fk_alumno_id'] != '' && $filters['fk_alumno_id'] != 0) {
    $alumno = AlumnoPeer::retrieveByPk($filters['fk_alumno_id']);
    echo $alumno->getApellido().", ".$alumno->getNombre();
} ?>
</h1>

