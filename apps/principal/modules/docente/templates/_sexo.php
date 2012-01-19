<?php
use_helper('Misc');
echo select_tag('docente[sexo]', options_for_select(Sexos(true), $docente->getSexo()));
?>