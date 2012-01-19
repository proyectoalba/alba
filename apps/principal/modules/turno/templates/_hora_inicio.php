<?php use_helper('DateForm') ?>

<?php echo select_time_tag("turno[hora_inicio]", $turno->getHoraInicio(), array('include_second' => false, '12hour_time' => true));?>