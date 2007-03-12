<?php use_helper('DateForm') ?>

<?php echo select_time_tag("horarioescolar[hora_inicio]", $horarioescolar->getHoraInicio(), array('include_second' => false, '12hour_time' => true));?>