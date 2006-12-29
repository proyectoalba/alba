<?
use_helper('Misc');
echo select_tag("horarioescolar[dia]", options_for_select(diasDeLaSemana(1), $horarioescolar->getDia()));
?>