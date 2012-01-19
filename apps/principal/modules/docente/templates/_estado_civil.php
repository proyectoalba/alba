<?php
use_helper('Misc');
echo select_tag('docente[estado_civil]', options_for_select(EstadoCivil(true), $docente->getEstadoCivil()));
?>
