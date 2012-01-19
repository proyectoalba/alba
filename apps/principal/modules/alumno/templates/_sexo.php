<?php
use_helper('Misc');
echo select_tag('sexo', options_for_select(Sexos(true), $alumno->getSexo()));
?>