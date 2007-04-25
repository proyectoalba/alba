<?php use_helper('DateForm') ?>

<?php echo select_time_tag("rel_division_actividad_docente[[hora_fin]", $rel_division_actividad_docente->getHoraFin(), array('include_second' => false, '12hour_time' => true));?>