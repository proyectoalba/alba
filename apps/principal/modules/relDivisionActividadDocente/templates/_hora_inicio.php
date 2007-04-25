<?php use_helper('DateForm') ?>

<?php echo select_time_tag("rel_division_actividad_docente[hora_inicio]", $rel_division_actividad_docente->getHoraInicio(), array('include_second' => false, '12hour_time' => true));?>